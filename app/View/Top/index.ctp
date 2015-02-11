<?php 
$site_title = Configure::read('site_title');
$webmasterkey = Configure::read('webmasterkey');
$this->set('tweet_height', '600'); 
$this->set('page_title',$site_title.'<small>東京版</small>'); 
$this->set('title_for_layout', 'トップ|'.$site_title);
$this->Html->meta('description', $site_title.'はNHKの番組をカレンダーに通知するサービスです。お使いのカレンダーで黄なる番組をいつでも確認できるようになります。', array('inline' => false));
$this->Html->meta('keywords', 'NHK,カレンダー,リマインド,API,検索', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));
$this->Html->meta(array('name' => 'google-site-verification', 'content' => $webmasterkey),null,array('inline' => false));


?>

<h3>使い方 <small>簡単3ステップ！</small></h3>
<div class='panel panel-default'>
<div class='panel-body'>
  <div class='row'>
    <div class='col-md-4 col-sm-4 col-lg-4 col-xs-12'>
      <div class="panel panel-default">
        <div class="panel-heading">step:1</div>
        <div class="panel-body">
          <?php echo $this->Html->link('番組検索ページ', array('controller'=>'search','action'=>'index')); ?>
          で気になる番組の条件を決める。
        </div>
      </div>
    </div>
    <div class='col-md-4 col-sm-4 col-lg-4 col-xs-12'>
      <div class="panel panel-default">
        <div class="panel-heading">step:2</div>
        <div class="panel-body">
          番組の条件をもとにカレンダーURLを発行する。
        </div>
      </div>
    </div>
    <div class='col-md-4 col-sm-4 col-lg-4 col-xs-12'>
      <div class="panel panel-default">
        <div class="panel-heading">step:3</div>
        <div class="panel-body">
          カレンダーURLをお使いのカレンダーアプリに設定する。
        </div>
      </div>
    </div>
  </div>

  <h4>検索を試す <small>まずは気になるキーワードを入れてみましょう！</small></h4>
  <?php echo $this->Form->create('NhkProgramList', array(
    'url' => array('controller' => 'search'),
    'inputDefaults' => array(
      'div' => 'form-group',
      'label' => false,
      'wrapInput' => 'input-group',
      'class' => 'form-control'
    ),
    'class' => 'well'  
  )); ?>
  <?php echo $this->Form->input('keyword', array(
    'placeholder' => 'キーワード  例）英語',
    'afterInput' => '<span class="input-group-btn">'
                    .$this->Form->submit('検索',array(
                      'div' => false,
                      'class' => 'btn btn-primary'
                    ))
                    . '</span>',
  )); ?>
  <?php echo $this->Form->end(); ?>
</div>
</div>

<h3>本サイトについて <small><?php echo $site_title; ?>とは？</small></h3>
<div class='panel panel-default'>
<p class='panel-body'>
本サイトはNHK APIを使用して気になる番組をカレンダー通知するためのサービスです。
メールアドレスなどの登録は一切不要で、気軽にお試しいただけます。
現在のところ東京の放送限定のサービスとなっておりますのでご了承ください。
</p>
</div>
