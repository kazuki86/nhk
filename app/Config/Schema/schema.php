<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $ical_provide = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary', 'comment' => 'ID'),
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'key' => 'unique', 'collate' => 'armscii8_bin', 'comment' => '配信先特定キー', 'charset' => 'armscii8'),
		'conditions' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'armscii8_bin', 'comment' => '条件(json文字列)', 'charset' => 'armscii8'),
		'last_access' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_at' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'inserted_at' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'key' => array('column' => 'key', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'armscii8', 'collate' => 'armscii8_bin', 'engine' => 'MyISAM')
	);

}
