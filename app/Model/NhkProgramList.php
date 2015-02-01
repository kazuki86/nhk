<?php
App::uses('Model', 'Model');
class NhkProgramList extends Model {
  public $useDbConfig = 'nhk_program';
  public $useTable = 'program_list';
}
