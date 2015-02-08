<?php $this->set('tweet_height', '300'); ?>
<?php echo $this->Form->create('nhk_program_list', array(
  'url' => array('controller' => 'nhk_program_list', 'action' => 'search'),
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
