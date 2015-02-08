<h2>Now On Air</h2>


<?php if (empty($now_on_air)): ?>
  <div>there are no data</div>
<?php else: ?>

<?php foreach ($now_on_air as $service_id => $now_list) : ?>
<div class='well well-sm' style='margin-top:20px;'>
  <h3 id = "<?php echo $service_id; ?>"><?php echo $now_list['previous']['service']['name']; ?></h3>
</div>
<div class='row'>
<?php foreach ($now_list as $time => $elem) : ?>
  <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>
    <div class='thumbnail'>
      <?php if ($time === 'present'): ?>
        <img src='<?php echo $elem['service']['logo_s']['url']; ?>' />
        <div class='caption'>
          <h4><?php echo $elem['title']; ?></h4>
          <p><?php echo date('H:i',strtotime($elem['start_time'])); ?>
            -<?php echo date('H:i',strtotime($elem['end_time'])); ?>
          </p>
          <p><?php echo $elem['subtitle']; ?></p>
        </div>
      <?php elseif ($time === 'previous'): ?>
        <img src='<?php echo $elem['service']['logo_s']['url']; ?>'
        style='opacity:0.3;' />
        <div class='caption'>
          <h5><?php echo $elem['title']; ?></h5>
          <p><?php echo date('H:i',strtotime($elem['start_time'])); ?>
            -<?php echo date('H:i',strtotime($elem['end_time'])); ?>
          </p>
        </div>
      <?php else: ?>
        <img src='<?php echo $elem['service']['logo_s']['url']; ?>'
        style='opacity:0.3;' />
        <div class='caption'>
          <h5><?php echo $elem['title']; ?></h5>
          <p><?php echo date('H:i',strtotime($elem['start_time'])); ?>
            -<?php echo date('H:i',strtotime($elem['end_time'])); ?>
          </p>
          <p><?php echo $elem['subtitle']; ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endforeach; ?>
</div>

<?php endforeach; ?>
<?php endif; ?>


<?php if (empty($list)): ?>
<?php else: ?>

<ul>
<?php foreach ($list as $service_id => $glist) : ?>
  <li>
    <a href = "#<?php echo $service_id; ?>">
    <?php echo $glist[0]['service']['name']; ?>
    </a>
  </li>
<?php endforeach; ?>
</ul>
<hr />

<?php foreach ($list as $service_id => $glist) : ?>
  <h2 id = "<?php echo $service_id; ?>"><?php echo $glist[0]['service']['name']; ?></h2>
  <table>
    <tr>
      <th>image</th>
      <th>program name </th>
    </tr>
<?php foreach ($glist as $elem) : ?>
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
<?php endforeach; ?>

<?php endif; ?>
