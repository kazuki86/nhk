<?php
App::uses('AppController', 'Controller');
App::uses('Util', 'Lib');

class ProgramController extends AppController {

  public $uses = array('NhkProgramList');


  public function index() {

  }

  public function genre($genre = null) {

    if (is_null($genre)) {
      $this->render('genre_list');
    } elseif ( array_key_exists($genre, $this->getGenrePrimaryList())) {
      $conditions = array('genre_primary' => $genre);
      $search_result = $this->NhkProgramList->search($conditions);
      $this->set('genre_code', $genre);
      $this->set('search_result', $search_result);
    } else {
      throw new RuntimeException('存在しないジャンルコードが指定されました');
    }

  }

  public function service($service = null) {

    if (is_null($service)) {
      $this->render('service_list');
    } elseif ( array_key_exists($service, $this->getServiceList())) {
      $conditions = array('service' => $service);
      $search_result = $this->NhkProgramList->search($conditions);
      $this->set('service_code', $service);
      $this->set('search_result', $search_result);
    } else {
      throw new RuntimeException('存在しない放送波コードが指定されました');
    }

  }

  private function getServiceList() {
    return Configure::read('service_list');
  }

  private function getGenrePrimaryList() {
    return Configure::read('genre_primary_list');
  }


}

