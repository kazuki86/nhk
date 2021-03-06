<?php

class NhkProgramDataSource extends DataSource {

  const PROGRAM_LIST = 'program_list';
  const PROGRAM_GENRE = 'program_genre';
  const PROGRAM_INFO = 'program_info';
  const NOW_ON_AIR = 'now_on_air';

  protected $table_aliases = array(
      self::PROGRAM_LIST => 'list',
      self::PROGRAM_GENRE => 'genre',
      self::PROGRAM_INFO => 'info',
      self::NOW_ON_AIR => 'now',
    );

  protected $defaultService = 'tv'; //テレビすべて
  protected $defaultArea = 130; //東京

  public $description = 'NHK Program API datasource';

  public $config = array(
    'apiUrl' => 'http://api.nhk.or.jp',
    'apiVersion' => 'v1',
    'apiKey' => '',
    'cacheKeys' => array(
        'default' =>'',
      ),
    );

  public function __construct($config) {
    parent::__construct($config);
  }


  public function listSources($data = NULL) {
    return array(
      self::PROGRAM_LIST,
      self::PROGRAM_GENRE,
      self::PROGRAM_INFO,
      self::NOW_ON_AIR,
    );
  }

  public function read(Model $model, $queryData = array(), $recursive = null) {

    $defaultConditions = array(
      'date' => date('Y-m-d'),
      'area' => $this->defaultArea,
    );
    if (!is_null($queryData['conditions']) && is_array($queryData['conditions'])) {
      $conditions = array_merge($defaultConditions, $queryData['conditions']);
    } else {
      $conditions = $defaultConditions;
    }
    $url = $this->getUrl($this->config, $model->useTable, $this->defaultService, $conditions);

    return $this->getData($url, $model);
  }

  protected function getData($url, $model) {
    $json = FALSE;
    $cacheKey = $this->getCacheKey($model->useTable);
    if('' !== $cacheKey) {
      $key = $this->getUniqueKey($url);
      $json = Cache::read($key, $cacheKey);
      if ($json === FALSE) {
        $json = file_get_contents($url);
        Cache::write($key, $json,  $cacheKey);
      }
    } else {
      $json = file_get_contents($url);
    }

    $data = json_decode($json, true);

    return $data;

  }

  protected function getUrl($config, $tableName, $service, $conditions) {
    $url  = $config['apiUrl'] ;
    $url .= '/' ;
    $url .= $config['apiVersion'] ;
    $url .= '/pg/' ;
    $url .= $this->table_aliases[$tableName];
    $url .= '/' ;
    $url .= $conditions['area'];
    $url .= '/' ;
    $url .= $service;

    switch($tableName) {
    case self::PROGRAM_LIST:
      $url .= '/' ;
      $url .= $conditions['date'];
      break;
    case self::PROGRAM_GENRE:
      $url .= $conditions['genre'];
      $url .= '/' ;
      $url .= $conditions['date'];
      break;
    case self::PROGRAM_INFO:
      $url .= '/' ;
      $url .= $conditions['id'];
      break;
    case self::NOW_ON_AIR:
      break;
    }

    $url .= '.json?key=';
    $url .= $config['apiKey'];

    return $url;

  }

  protected function getCacheKey($tableName) {

    if (isset($this->config['cacheKeys'][$tableName])) {
      return $this->config['cacheKeys'][$tableName];
    } else {
      return $this->config['cacheKeys']['default'];
    }
  }

  protected function getUniqueKey($str) {
    return md5($str);
  }

//  protected $_schema = array();

//  public function describe($model) {
//    return $this->_schema;
//  }
//
//  public function calculate(Model $model, $func, $params = array()) {
//    return 'COUNT';
//  }
//  public function create(Model $model, $fields = null, $values = null) {}
//  public function update(Model $model, $fields = null, $values = null, $conditions = null) {}
//  public function delete(Model $model, $id = null) {}



}
