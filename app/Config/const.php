<?php


//$config['site_title'] = "NHK Cheker";
$config['site_title'] = "NHKリマインド";
$config['nhk_credit'] = "「情報提供:ＮＨＫ」";

$config['ical_unique_id'] = 'nhk-remind_kazuki.m';
$config['ical_name'] = 'NHK番組リマインド';


if (Configure::read('debug')) {
  $config['webmasterkey'] = '';
  $config['ga_tracking_id'] = '';
} else {
  $config['webmasterkey'] = 'afOKYncT0Bi4ipc6FjrnATlOjVNUaaR0LjCZ5i-AvtI';
  $config['ga_tracking_id'] = 'UA-59633213-1';
} 


$config['service_list'] = array(
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


$config['genre_primary_list'] = array(
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

$config['time_list'] = array(
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


$config['genre_primary_article'] = array(
  '00' => array(
    'name' => 'ニュース／報道',
    'description' => 'ニュースはぜひ毎日チェック！',
  ),
  '01' => array(
    'name' => 'スポーツ',
    'description' => '野球やサッカー、フィギュアスケートなど気になるスポーツ情報',
  ),
  '02' =>  array(
    'name' => '情報／ワイドショー',
    'description' => '暮らしに役立つ情報のチェックはここ',
  ),
  '03' =>  array(
    'name' => 'ドラマ',
    'description' => '大河ドラマや朝ドラのチェックをお忘れなく',
  ),
  '04' =>  array(
    'name' => '音楽',
    'description' => '最新のヒット曲からクラシックまで',
  ),
  '05' =>  array(
    'name' => 'バラエティ',
    'description' => 'NHKのバラエティ番組、いつも見てる人もまだ見たことない人も',
  ),
  '06' =>  array(
    'name' => '映画',
    'description' => '気になる映画は録画予約をお忘れなく',
  ),
  '07' =>  array(
    'name' => 'アニメ／特撮',
    'description' => '豊富な子供向けアニメのチェック',
  ),
  '08' =>  array(
    'name' => 'ドキュメンタリー／教養',
    'description' => '社会人にもおすすめなドキュメンタリー番組はこちらからチェック',
  ),
  '09' =>  array(
    'name' => '劇場／公演',
    'description' => '歌舞伎や古典芸能など、NHKならではの番組がいっぱい',
  ),
  '10' =>  array(
    'name' => '趣味／教育',
    'description' => '将棋・囲碁や園芸にランニング。NHK番組で趣味を初めてみましょう',
  ),
  '11' =>  array(
    'name' => '福祉',
    'description' => 'よりよい社会を目指す番組がたくさん。観たあと感想をツイートしてみては？',
  ),
  '15' =>  array(
    'name' => 'その他',
    'description' => 'その他の番組',
  ),
);

$config['service_article'] = array(
  'g1' => array(
    'name' => 'ＮＨＫ総合１',
    'logo' => 'http://www.nhk.or.jp/common/img/media/gtv-100x50.png',
    'description' => 'ニュースや大河ドラマなどのチェックはこちらから',
  ),
  'g2' => array(
    'name' => 'ＮＨＫ総合２',
    'logo' => 'http://www.nhk.or.jp/common/img/media/gtv-100x50.png',
    'description' => 'ニュースや大河ドラマなどのチェックはこちらから',
  ),
  'e1' => array( 
    'name' => 'ＮＨＫＥテレ１',
    'logo' => 'http://www.nhk.or.jp/common/img/media/etv-100x50.png',
    'description' => '料理や語学番組などのチェックはこちらから',
  ),
  'e2' => array(
    'name' => 'ＮＨＫＥテレ２',
    'logo' => 'http://www.nhk.or.jp/common/img/media/etv-100x50.png',
    'description' => '料理や語学番組などのチェックはこちらから',
  ),
  'e3' => array(
    'name' => 'ＮＨＫＥテレ３',
    'logo' => 'http://www.nhk.or.jp/common/img/media/etv-100x50.png',
    'description' => '料理や語学番組などのチェックはこちらから',
  ),
  'e4' => array(
    'name' => 'ＮＨＫワンセグ２',
    'logo' => 'http://www.nhk.or.jp/common/img/media/1seg2-100x50.png',
    'description' => 'ワンセグ番組のチェックはこちらから',
  ),
  's1' => array(
    'name' => 'ＮＨＫＢＳ１',
    'logo' => 'http://www.nhk.or.jp/common/img/media/bs1-100x50.png',
    'description' => 'ドキュメンタリー番組や音楽などが豊富',
  ),
  's2' => array( 
    'name' => 'ＮＨＫＢＳ１(１０２ｃｈ)',
    'logo' => 'http://www.nhk.or.jp/common/img/media/bs1-100x50.png',
    'description' => 'ドキュメンタリー番組や音楽などが豊富',
  ),
  's3' => array(
    'name' => 'ＮＨＫＢＳプレミアム',
    'logo' => 'http://www.nhk.or.jp/common/img/media/bsp-100x50.png',
    'description' => 'ドキュメンタリー番組や音楽などが豊富',
  ),
  's4' => array(
    'name' => 'ＮＨＫＢＳプレミアム(１０４ｃｈ)',
    'logo' => 'http://www.nhk.or.jp/common/img/media/bsp-100x50.png',
    'description' => 'ドキュメンタリー番組や音楽などが豊富',
  ),
);
