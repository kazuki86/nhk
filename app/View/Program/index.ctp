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

<ul>
<li><?php echo $this->Html->link('放送局一覧', array('controller'=>'program', 'action' => 'service')); ?></li>
<li><?php echo $this->Html->link('ジャンル一覧', array('controller'=>'program', 'action' => 'genre')); ?></li>
</ul>


