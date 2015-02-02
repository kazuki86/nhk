<h1>NHK Program List</h1>

<div>
<h2>search conditions</h2>
<?php echo $this->Form->create('nhk_program_list'); ?>
<?php echo $this->Form->input('keyword', array('label'=>'キーワード')); ?>
<?php echo $this->Form->label('genre_primary','ジャンル'); ?>
<?php echo $this->Form->select('genre_primary',$genre_primary_list); ?>
<?php echo $this->Form->label('service','局'); ?>
<?php echo $this->Form->select('service',$service_list); ?>
<?php echo $this->Form->label('time_from','時間帯'); ?>
<?php echo $this->Form->select('time_from', $time_list); ?>
～
<?php echo $this->Form->select('time_to', $time_list); ?>
<?php echo $this->Form->submit('検索'); ?>
<?php echo $this->Form->end(); ?>

</div>
<?php if (count($search_result)==0): ?>
  <div>there are no data</div>
<?php else: ?>

<?php echo $this->Form->create('nhk_program_list',array('url' =>'icalurl')); ?>
<?php echo $this->Form->hidden('keyword'); ?>
<?php echo $this->Form->hidden('genre_primary',$genre_primary_list); ?>
<?php echo $this->Form->hidden('service',$service_list); ?>
<?php echo $this->Form->hidden('time_from', $time_list); ?>
<?php echo $this->Form->hidden('time_to', $time_list); ?>
<?php echo $this->Form->submit('この条件でカレンダー通知を受ける'); ?>
<?php echo $this->Form->end(); ?>
  <table>
    <tr>
      <th>image</th>
      <th>program name </th>
    </tr>
<?php foreach ($search_result as $elem) : ?>
    <tr>
    <td>
    <img src='<?php echo $elem['service']['logo_s']['url']; ?>' />
    </td>
    <td>
      <?php echo $elem['title']; ?><br>
      <?php echo $elem['subtitle']; ?><br>
      <?php echo $elem['service']['name']; ?><br>
      from:<?php echo $elem['start_time']; ?><br>
      to:<?php echo $elem['end_time']; ?>
    </td>
    </tr>
<?php endforeach; ?>
  </table>
<?php endif; ?>
