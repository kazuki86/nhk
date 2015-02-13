<?php 
$site_title = Configure::read('site_title');
$service_list = Configure::read('service_list');
$this->set('tweet_height', '300'); 
$this->set('page_title','放送局一覧'); 
$this->set('title_for_layout', '放送局一覧|'.$site_title);
$this->Html->meta('keywords', 'NHK,検索', array('inline' => false));
$this->Html->meta('description', '', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));

?>

<div class='panel panel-default'>
<p class='panel-body'>
NHKの放送局の一覧画面です。リンクをクリックすると、選択した放送局の今日と明日の番組一覧がご覧いただけます。
</p>
</div>

<ul>
<?php foreach($service_list as $service_code => $service_name) : ?>
<li><?php echo $this->Html->link($service_name, array('controller'=>'program', 'action' => 'service', $service_code)); ?></li>
<?php endforeach; ?>
</ul>

