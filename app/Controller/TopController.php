<?php
App::uses('AppController', 'Controller');

class TopController extends AppController {

  public $components = array('Security');

  public function index() {

    /*
    $API_KEY_NHK = $this->getNhkApiKey();
    $today = date('Y-m-d');

    //sample query for NHK API
    $list_json = file_get_contents("http://api.nhk.or.jp/v1/pg/list/130/tv/{$today}.json?key={$API_KEY_NHK}");
    $list = json_decode($list_json, true);

		$this->set('list', $list['list']);
     */
  }

  private function getNhkApiKey() {
    $key = $_SERVER['NHK_API_KEY'];
    if (empty($key)) {
      throw new RuntimeException('The Apache Env: NHK_API_KEY is missing.');
    }
    return  $key;
  }
}

