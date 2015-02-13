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
    } else {
      $conditions = array('genre_primary' => $genre);
      $search_result = $this->NhkProgramList->search($conditions);
      $this->set('genre_code', $genre);
      $this->set('search_result', $search_result);
    }

  }

  public function service($service = null) {

    if (is_null($service)) {
      $this->render('service_list');
    } else {
      $conditions = array('service' => $service);
      $search_result = $this->NhkProgramList->search($conditions);
      $this->set('service_code', $service);
      $this->set('search_result', $search_result);
    }

  }


}

