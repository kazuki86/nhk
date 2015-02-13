<?php 
$site_title = Configure::read('site_title');
$service_list = Configure::read('service_list');
$service = $service_list[$service_code];
$this->set('tweet_height', '1500'); 
$this->set('page_title',$service); 
$this->set('title_for_layout', $service.'|'.$site_title);
$this->Html->meta('keywords', 'NHK,検索', array('inline' => false));
$this->Html->meta('description', '', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));

?>

<?php if (count($search_result)==0): ?>

<?php else: ?>
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

