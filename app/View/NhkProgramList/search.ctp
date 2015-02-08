<h2>番組検索</h2>
<div>
<?php $empty_str = '選択してください'; ?>
<?php echo $this->Form->create('nhk_program_list', array(
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
  'placeholder' => '例）英語　チャロ',
)); ?>
<?php echo $this->Form->input('genre_primary', array(
  'label' => array('text' => 'ジャンル'),
  'empty' => $empty_str,
  'options' => $genre_primary_list,
)); ?>
<?php //echo $this->Form->label('service','局'); ?>
<?php //echo $this->Form->select('service',$service_list); ?>
<?php echo $this->Form->input('service', array(
  'label' => array('text' => '放送局'),
  'empty' => $empty_str,
  'options' => $service_list,
)); ?>
<?php //echo $this->Form->label('time_from','時間帯'); ?>
<?php //echo $this->Form->select('time_from', $time_list); ?>
<?php //echo $this->Form->select('time_to', $time_list); ?>
<?php echo $this->Form->input('time_from', array(
  'label' => array('text' => '時間帯'),
  'empty' => $empty_str,
  'options' => $time_list,
)); ?>
<?php echo $this->Form->input('time_to', array(
  'label' => array('text' => ''),
  'empty' => $empty_str,
  'options' => $time_list,
)); ?>
<div class='form-group'>
<?php echo $this->Form->submit('検索',array(
  'div' => 'col col-md-9 col-md-offset-3',
  'class' => 'btn btn-primary'  
)); ?>
</div>
<?php echo $this->Form->end(); ?>

</div>
<?php if (count($search_result)==0): ?>
<?php else: ?>

<?php echo $this->Form->create('nhk_program_list', array(
  'url' =>'icalurl',
  'inputDefaults' => array(
    'div' => 'form-group',
    'class' => 'form-control'
  ),
  'class' => 'well form-horizontal'  
)); ?>
<?php echo $this->Form->hidden('keyword'); ?>
<?php echo $this->Form->hidden('genre_primary',$genre_primary_list); ?>
<?php echo $this->Form->hidden('service',$service_list); ?>
<?php echo $this->Form->hidden('time_from', $time_list); ?>
<?php echo $this->Form->hidden('time_to', $time_list); ?>
<div class='form-group'>
<?php echo $this->Form->submit('この条件でカレンダー通知を受ける',array(
  'div' => 'col col-md-9 col-md-offset-3',
  'class' => 'btn btn-default'  
)); ?>
</div>
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
