<?php
App::uses('AppController', 'Controller');

class SitemapController extends AppController {

  public $layout = 'xml/default';  
  public $components = array('RequestHandler');
  public function index() {
    //Configure::write ('debug', 0);  
    $this->RequestHandler->respondAs('xml'); 
    $this->set('program_url_list', $this->getProgramPageUrlList());
  }

  private function getProgramPageUrlList() {
    $url_array = array();

    $url_array[] = Router::url(array('controller'=>'program', 'action'=>'index'),true);

    $service_list = Configure::read('service_list');
    foreach($service_list as $code => $name) {
      $url_array[] = Router::url(array('controller'=>'program', 'action'=>'service',$code ),true);
    }

    $genre_primary_list = Configure::read('genre_primary_list');
    foreach($genre_primary_list as $code => $name) {
      $url_array[] = Router::url(array('controller'=>'program', 'action'=>'genre',$code ),true);
    }

    return $url_array;
  }

}
