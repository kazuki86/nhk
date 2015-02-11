<?php
App::uses('AppController', 'Controller');

class SitemapController extends AppController {

  public $layout = 'xml/default';  
  public $components = array('RequestHandler');
  public function index() {
    //Configure::write ('debug', 0);  
    $this->RequestHandler->respondAs('xml'); 
  }

}
