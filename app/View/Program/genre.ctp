<?php 
$site_title = Configure::read('site_title');
$genre_primary_list = Configure::read('genre_primary_article');
$genre = $genre_primary_list[$genre_code]['name'];
$description = $genre_primary_list[$genre_code]['description'];
$this->set('tweet_height', '1500'); 
$this->set('page_title',$genre); 
$this->set('title_for_layout', 'ジャンル:'.$genre.'|'.$site_title);
$this->Html->meta('keywords', 'NHK,検索', array('inline' => false));
$this->Html->meta('description', '', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));

?>

<h4>
<?php echo $description; ?>
</h4>
<?php if (count($search_result)==0): ?>

<?php else: ?>
<?php echo $this->Form->create('NhkProgramList', array(
  'url' => array('controller' => 'search', 'action'=>'index'),
  'inputDefaults' => array(
    'div' => 'form-group',
    'label' => false,
    'wrapInput' => 'input-group',
    'class' => 'form-control'
  ),
  'class' => 'well'  
)); ?>
<?php echo $this->Form->input('keyword', array(
  'label' => 'キーワードで絞る',
  'placeholder' => 'キーワード',
  'afterInput' => '<span class="input-group-btn">'
                  .$this->Form->submit('検索',array(
                    'div' => false,
                    'class' => 'btn btn-primary'
                  ))
                  . '</span>',
)); ?>
<?php echo $this->Form->hidden('genre_primary',array('value'=>$genre_code)); ?>
<?php echo $this->Form->end(); ?>

<div class='row'>
<?php foreach ($search_result as $elem) : ?>
  <div class='col-xs-12 col-sm-4 col-md-3 col-lg-3'>
    <div class='thumbnail'>
      <img src='<?php echo $elem['service']['logo_s']['url']; ?>' />
      <div class='caption'>
        <h4><?php echo $elem['title']; ?></h4>
        <p><?php echo date('H:i',strtotime($elem['start_time'])); ?>
          -<?php echo date('H:i',strtotime($elem['end_time'])); ?>
        </p>
        <p><?php echo $elem['subtitle']; ?></p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<div class='text-right'>
<?php echo Configure::read('nhk_credit'); ?>
</div>
<?php endif; ?>

<script>
$(function(){
    $(".thumbnail").tile();
});
</script>
