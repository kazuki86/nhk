<?php 
$site_title = Configure::read('site_title');
$this->set('tweet_height', '300'); 
$this->set('title_for_layout', 'トップ|'.$site_title);
$this->Html->meta('description', $site_title.'はNHKの番組をカレンダーに通知するサービスです。お使いのカレンダーで黄なる番組をいつでも確認できるようになります。', array('inline' => false));
$this->Html->meta('keywords', 'NHK,カレンダー,リマインド,API,検索', array('inline' => false));
$this->Html->meta(array('name' => 'robots', 'content' => 'index,follow'),null,array('inline' => false));


?>

<?php echo $this->Form->create('NhkProgramList', array(
  'url' => array('controller' => 'search'),
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
