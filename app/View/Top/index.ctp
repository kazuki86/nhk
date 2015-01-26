<?php if (empty($list)): ?>
  <div>there are no data</div>
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
