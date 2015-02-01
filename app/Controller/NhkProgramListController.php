<?php
App::uses('AppController', 'Controller');

class NhkProgramListController extends AppController {

  public function index() {
    $today = date('Y-m-d');

    $conditions = array(
      'date' => $today
    );
    $list = $this->NhkProgramList->find('all',array('conditions'=>$conditions));

		$this->set('list', $list['list']);
  }

}

