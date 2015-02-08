<?php 
$site_title = Configure::read('site_title');
$this->set('tweet_height', '1500'); 
$this->set('page_title','番組検索'); 
$this->set('title_for_layout', '検索|'.$site_title);
$this->Html->meta('keywords', 'NHK,検索,カレンダー,リマインド', array('inline' => false));
$this->Html->meta('description', $site_title.'はNHKの番組をカレンダーに通知するサービスです。このサイトで番組検索すると、同じ結果をあなたのお使いのカレンダーでいつでも確認できるようになります。', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));

?>
<div class='panel panel-default'>
<p class='panel-body'>
この検索画面は、お使いのカレンダーアプリで番組情報を受け取るための条件を決める画面です。
このページでは検索条件の例として本日・明日のNHK番組から検索した結果をご覧いただけます。
検索条件が決まったら<code>この条件でカレンダー通知を受ける</code>ボタンをクリックして、URL取得画面に進んでください。
</p>
</div>
<div>
<?php $empty_str = '選択してください'; ?>
<?php echo $this->Form->create('NhkProgramList', array(
  'inputDefaults' => array(
    'div' => 'form-group',
    'label' => array(
      'class' => 'col col-md-3 control-label'
    ),
    'wrapInput' => 'col col-md-9',
    'class' => 'form-control'
  ),
  'class' => 'well form-horizontal'  
)); ?>
<?php echo $this->Form->input('keyword', array(
  'label'=>'キーワード',
  'placeholder' => '例）英語',
)); ?>
<?php echo $this->Form->input('genre_primary', array(
  'label' => array('text' => 'ジャンル'),
  'empty' => $empty_str,
  'options' => $genre_primary_list,
)); ?>
<?php echo $this->Form->input('service', array(
  'label' => array('text' => '放送局'),
  'empty' => $empty_str,
  'options' => $service_list,
)); ?>
<?php echo $this->Form->input('time_from', array(
  'label' => array('text' => '時間帯'),
  'empty' => $empty_str,
  'options' => $time_list,
  'beforeInput' => '<div class="input-group">',
  'afterInput' =>'<span class="input-group-addon">から</span></div>',
)); ?>
<?php echo $this->Form->input('time_to', array(
  'label' => array('text' => ''),
  'empty' => $empty_str,
  'options' => $time_list,
  'beforeInput' => '<div class="input-group">',
  'afterInput' =>'<span class="input-group-addon">まで</span></div>',
)); ?>
<div class='form-group'>
<?php echo $this->Form->submit('　検索　',array(
  'div' => 'col col-md-4 col-md-offset-3',
  'class' => 'btn btn-default'  
)); ?>
<?php if (count($search_result)>0): ?>
  <div class='col col-md-5'>
  <a href='javascript:void(0);' class='btn btn-primary' 
    onclick='document.icalurl.submit();'>この条件でカレンダー通知を受ける</a>
  </div>
<?php endif; ?>
</div>
<?php echo $this->Form->end(); ?>

</div>
<?php if (count($search_result)==0): ?>
<?php else: ?>

<?php 
echo $this->Form->create('NhkProgramList', array( 'url' =>'icalurl', 'name' =>'icalurl',)); 
echo $this->Form->hidden('keyword');
echo $this->Form->hidden('genre_primary',$genre_primary_list);
echo $this->Form->hidden('service',$service_list);
echo $this->Form->hidden('time_from', $time_list);
echo $this->Form->hidden('time_to', $time_list); 
echo $this->Form->end();
?>
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
