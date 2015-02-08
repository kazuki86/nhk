<?php
App::uses('Model', 'Model');
class NhkProgramList extends Model {
  public $useDbConfig = 'nhk_program';
  public $useTable = 'program_list';

  private $default_conditions = array(
      'keyword' => '',
      'service' => '',
      'genre_primary' => '',
      'time_from' => '',
      'time_to' => '',
    );

  public function search($conditions){

    $conditions = array_merge($this->default_conditions , $conditions);

    $today = date('Y-m-d');
    $all = $this->find('all',array('conditions'=>array('date' => $today)));

    $all = $all['list'];

    $service_cond = $conditions['service'];
    if (!empty($conditions['service'])) {
      $all = array(
        $service_cond => $all[$service_cond],
      );
    }

    $result = array();
    foreach ($all as $service_name => $service_contents) {
      foreach ($service_contents as $program_info) {
        if($this->match_condition($program_info, $conditions)) {
          $result[] = $program_info;
        }
      }

    }
    
    return $result;
  }

  protected function match_condition($program_info, $conditions) {
    if($conditions['service'] && $conditions['service'] !== $program_info['service']['id']) {
      return false;
    }

    if ($conditions['genre_primary']) {
      $genre_match = false;
      foreach ($program_info['genres'] as $genre) {
        $genre_primary = substr($genre, 0, 2);
        if ($genre_primary === $conditions['genre_primary']) {
          $genre_match = true;
          break;
        }
      }
      if ( !$genre_match) {
        return false;
      }
    }

    if ($conditions['time_from'] || $conditions['time_to']) {
      if (!$conditions['time_from']) {
        $conditions['time_from'] = '04:00';
      }
      if (!$conditions['time_to']) {
        $conditions['time_to'] = '26:00';
      }

      $start_time = $program_info['start_time'];
      $start_time = date("H:i", strtotime($start_time));

      if (strcmp($conditions['time_from'], $start_time) > 0 || strcmp($start_time, $conditions['time_to'] ) >= 0 ){
        return false;
      }

    }
    $keyword = trim($conditions['keyword']);
    if($keyword) {
      $keywords = mb_split('[\s　]+',$keyword);
      $target_list[] = $program_info['title'];
      $target_list[] = $program_info['subtitle'];
      foreach ($keywords as $keyword) {
        $keyword_match_sub = false;
        foreach ($target_list as $target) {
          if (FALSE !== strpos($target, $keyword )){
            $keyword_match_sub = true;
            break;
          }
        }
        if (!$keyword_match_sub) {
          return false;
        }
      }

    }

    return true;
  }
}
