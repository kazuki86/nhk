<?php 
$site_title = Configure::read('site_title');
$this->set('tweet_height', '300'); 
$this->set('page_title','番組一覧'); 
$this->set('title_for_layout', '番組一覧|'.$site_title);
$this->Html->meta('keywords', 'NHK,検索', array('inline' => false));
$this->Html->meta('description', '', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));

?>

<div class='panel panel-default'>
<p class='panel-body'>
NHKの番組一覧です。
</p>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <p class="panel-title">
      <?php echo $this->Html->link('放送波一覧', array('controller'=>'program', 'action' => 'service')); ?>
    </p>
  </div>
  <div class="panel-body">
    <small>
      放送波で絞って番組一覧を見たい方はこちら
    </small>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <p class="panel-title">
      <?php echo $this->Html->link('ジャンル一覧', array('controller'=>'program', 'action' => 'genre')); ?>
    </p>
  </div>
  <div class="panel-body">
    <small>
      番組ジャンルで絞って番組一覧を見たい方はこちら
    </small>
  </div>
</div>



