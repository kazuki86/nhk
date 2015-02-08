<?php

App::uses('Shell', 'Console');

class DeleteTrushDataShell extends Shell {

  public $uses = array('IcalProvide');

  public function startup() {
    parent::startup();
  }
  
  public function main() {

    $this->out('start DeleteTrushDataShell');

    $delete_day = date('Y-m-d H:i:s', strtotime('-2 day'));
    $conditions = array('IcalProvide.last_access < ' => $delete_day);
    $this->IcalProvide->deleteAll($conditions, false);

    $this->out('end DeleteTrushDataShell');
  }

  public function cleanup() {
    parent::cleanup();
  }
}

