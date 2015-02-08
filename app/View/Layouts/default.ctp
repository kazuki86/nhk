<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDascription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
$site_title = Configure::read('site_title');

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');

    // jQuery CDN
    echo $this->Html->script('//code.jquery.com/jquery-1.10.2.min.js');

    // Twitter Bootstrap 3.0 CDN
    echo $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css');
    echo $this->Html->script('//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js');
    echo $this->Html->script('/js/jquery.tile.min.js');

		//echo $this->Html->css('cake.generic');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
    <meta name="viewport" content="width=device-width, initial-scale=1" >
</head>
<body>
  <div class="navbar navbar-default navbar-static-top" role="navigation">
    <h1><?php echo $this->Html->link($site_title, '/'); ?></h1>
    <p class="navbar-text"><?php echo $site_title; ?>は気になるNHK番組をあなたのカレンダーに通知するリマインドサービスです.</p>
<!--
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/nhk_program_list/search/">番組検索</a></li>
        </ul>
      </div>
-->
  </div>
	<div id="container" class="container">
    <?php if (isset($page_title)) : ?>
    <h2><?php echo $page_title; ?></h2>
    <?php endif; ?>
    <div class='row'>
      <div id="content" class='col-md-9 col-sm-9 col-lg-9 col-xs-12'>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
      </div>
      <div id="sidebar" class='col-md-3 col-sm-3 col-lg-3 hidden-xs'>
        <?php if (isset($tweet_height) && $tweet_height > 0) : ?>
          <a class="twitter-timeline" href="https://twitter.com/hashtag/nhk"
          data-widget-id="562643771599233024" height='<?php echo $tweet_height; ?>px'>#nhk のツイート</a>
          <script>!function(d,s,id){var
          js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        <?php endif; ?>
      </div>
		</div>
		<div id="footer">
      <hr>
			<p class='text-right'>
        Copyright &copy; 2015 Kazuki.M All right received.
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
