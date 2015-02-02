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

  public function search() {

    $this->set('service_list', $this->getServiceList()); 
    $this->set('genre_primary_list', $this->getGenrePrimaryList()); 
    $this->set('time_list', $this->getTimeList()); 


    $search_result = array();
    if ($this->request->is('post')) {
      
      $conditions = $this->request->data['NhkProgramList'];
      $search_result = $this->NhkProgramList->search($conditions);
    }
    
    $this->set('search_result', $search_result);

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
    );
    return $time_list;

  }

}

