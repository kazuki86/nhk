<?php 
$site_title = Configure::read('site_title');
$genre_primary_list = Configure::read('genre_primary_article');
$this->set('tweet_height', '300'); 
$this->set('page_title','ジャンル一覧'); 
$this->set('title_for_layout', 'ジャンル一覧|'.$site_title);
$this->Html->meta('keywords', 'NHK,検索', array('inline' => false));
$this->Html->meta('description', '', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));

?>

<div class='panel panel-default'>
<p class='panel-body'>
NHKの番組のジャンル一覧画面です。リンクをクリックすると、選択したジャンルの今日と明日の番組一覧がご覧いただけます。
</p>
</div>

<?php foreach($genre_primary_list as $genre_code => $genre) : ?>
<div class="panel panel-info">
  <div class="panel-heading">
    <p class="panel-title">
      <?php echo $this->Html->link($genre['name'], array('controller'=>'program', 'action' => 'genre', $genre_code)); ?>
    </p>
  </div>
  <div class="panel-body">
<small>
    <?php echo $genre['description']; ?>
</small>
  </div>
</div>
<?php endforeach; ?>
