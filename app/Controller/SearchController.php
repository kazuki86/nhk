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

    $url = 'http://' . $_SERVER['HTTP_HOST'] . '/ical/fetch/' . $icalProvideData['key'];

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
    $service_list = array(
      //'tv' => 'テレビ全て',
      'g1' => 'ＮＨＫ総合１',
      'g2' => 'ＮＨＫ総合２',
      'e1' => 'ＮＨＫＥテレ１',
      'e2' => 'ＮＨＫＥテレ２',
      'e3' => 'ＮＨＫＥテレ３',
      'e4' => 'ＮＨＫワンセグ２',
      's1' => 'ＮＨＫＢＳ１',
      's2' => 'ＮＨＫＢＳ１(１０２ｃｈ)',
      's3' => 'ＮＨＫＢＳプレミアム',
      's4' => 'ＮＨＫＢＳプレミアム(１０４ｃｈ)',
    );
    return $service_list;
  }

  private function getGenrePrimaryList() {
    $genre_primary_list = array(
      '00' => 'ニュース／報道',
      '01' => 'スポーツ',
      '02' => '情報／ワイドショー',
      '03' => 'ドラマ',
      '04' => '音楽',
      '05' => 'バラエティ',
      '06' => '映画',
      '07' => 'アニメ／特撮',
      '08' => 'ドキュメンタリー／教養',
      '09' => '劇場／公演',
      '10' => '趣味／教育',
      '11' => '福祉',
      '15' => 'その他',
    );

    return $genre_primary_list;
  }

  private function getTimeList() {
    $time_list = array(
      '05:00' => '05:00',
      '07:00' => '07:00',
      '09:00' => '09:00',
      '11:00' => '11:00',
      '13:00' => '13:00',
      '15:00' => '15:00',
      '17:00' => '17:00',
      '19:00' => '19:00',
      '21:00' => '21:00',
      '23:00' => '23:00',
      '25:00' => '25:00',
      '27:00' => '27:00',
    );
    return $time_list;

  }

}

