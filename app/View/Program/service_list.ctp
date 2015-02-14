<?php 
$site_title = Configure::read('site_title');
$service_article = Configure::read('service_article');
$this->set('tweet_height', '300'); 
$this->set('page_title','放送波一覧'); 
$this->set('title_for_layout', '放送波一覧|'.$site_title);
$this->Html->meta('keywords', 'NHK,検索', array('inline' => false));
$this->Html->meta('description', '', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));

?>

<div class='panel panel-default'>
<p class='panel-body'>
NHKの放送波の一覧画面です。リンクをクリックすると、選択した放送波の今日と明日の番組一覧がご覧いただけます。
</p>
</div>

<?php foreach($service_article as $service_code => $service) : ?>
<div class="panel panel-info">
  <div class="panel-heading">
    <p class="panel-title">
    <a href="<?php echo $this->Html->url(array('controller'=>'program', 'action' => 'service', $service_code)); ?>">
    <img src="<?php echo $service['logo']; ?>">
    <?php echo $service['name']; ?>
    </a>
    </p>
  </div>
  <div class="panel-body">
<small>
    <?php echo $service['description']; ?>
</small>
  </div>
</div>
<?php endforeach; ?>

