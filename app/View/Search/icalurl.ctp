<?php $this->set('tweet_height', '1000'); ?>
<?php $this->set('page_title','カレンダー通知URL発行'); ?>

<p>次のURLをお好きなカレンダーアプリに登録してください</p>

<div class='well'>
<input type='text' value='<?php echo $url; ?>' class='form-control' ></input>
</div>

<p>下記のQRコードからも上記URLを読み込めます</p>
<div>
<img src="http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=<?php echo $url; ?>">
</div>

<h3>iPhoneへの設定方法</h3>
<ol>
<li>iPhoneのホーム画面から「設定」をタップします。</li>
<li>「メール/連絡先/カレンダー」をタップします。</li>
<li>「アカウントを追加...」をタップします。</li>
<li>「その他」をタップします。</li>
<li>「照会するカレンダーを追加」をタップします。</li>
<li>「サーバ」に上記のURLを入力して、「次へ」をタップします。</li>
<li>「次へ」をタップします。（ユーザ名・パスワードを入力する必要はありません）</li>
</ol>

<?php echo $this->Html->link('検索画面に戻る', 
                        array('controller'=>'search', 'action'=>'index'),
                        array('class'=>'btn btn-default')
                      );
?>


</ul>
