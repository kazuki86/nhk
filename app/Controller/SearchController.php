<?php
App::uses('AppController', 'Controller');
App::uses('Util', 'Lib');

class SearchController extends AppController {

  public $uses = array('NhkProgramList', 'IcalProvide', 'NowOnAir');
  public $components = array('Security');

  public function beforeFilter() {
    // これを付けないと、topからsearchメソッドが呼ばれたときにCSRFチェックされてしまう
    // 結局はsearchメソッドに対するトークンチェックは行われなくが、
    // icalurlから戻るときはチェックされてるし、いいかな。
    $this->Security->unlockedActions = array('index');
    $this->Security->requireAuth('icalurl');
    $this->Security->requirePost('icalurl');
    parent::beforeFilter();
  }
  
  private function nowonair() {
    $now_on_air = $this->NowOnAir->find('all');
		$this->set('now_on_air', $now_on_air['nowonair_list']);
  }

  public function index() {
    $this->set('service_list', $this->getServiceList()); 
    $this->set('genre_primary_list', $this->getGenrePrimaryList()); 
    $this->set('time_list', $this->getTimeList()); 

    $search_result = array();
    if ($this->request->is('post')) {
      //post の時はブラウザにキャッシュさせない。
      //（このページに対してブラウザの戻るを実行しても期限切れ
      $this->response->disableCache();
      $conditions = $this->getNhkProgramListData($this->request->data);
      if (!is_null($conditions)) {
        $search_result = $this->NhkProgramList->search($conditions);
      }
    }
    
    $this->set('search_result', $search_result);

  }

  public function icalurl() {
    //キャッシュさせない。
    $this->response->disableCache();

    $icalProvideData['key'] = Util::getRandomStr();
    $icalProvideData['conditions'] = json_encode($this->getNhkProgramListData($this->request->data));
    $icalProvideData['inserted_at'] = date('Y-m-d H:i:s',time());
    $icalProvideData['updated_at'] = date('Y-m-d H:i:s',time());
    $this->IcalProvide->save($icalProvideData);

    $url = Router::url('/ical/fetch/' . $icalProvideData['key'], true);

    $this->set('data', $icalProvideData);
    $this->set('url', $url);
  }

  private function getNhkProgramListData($data) {
    $result = null;
    if( isset($data['NhkProgramList'])) {
      $result = $data['NhkProgramList'];
    } elseif( isset($data['nhk_program_list'])) {
      $result = $data['nhk_program_list'];
    }
    return $result;
  }

  private function getServiceList() {
    return Configure::read('service_list');
  }

  private function getGenrePrimaryList() {
    return Configure::read('genre_primary_list');
  }

  private function getTimeList() {
    return Configure::read('time_list');
  }

}

