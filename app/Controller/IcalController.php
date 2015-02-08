<?php
App::uses('AppController', 'Controller');
// see http://qiita.com/katsukii/items/8d2126177446d23ab37d
App::import('Vendor', 'iCalcreatorClass', array('file' => 'iCalcreator'.DS.'iCalcreator.class.php'));

class IcalController extends AppController {

  public $uses = array('NhkProgramList', 'IcalProvide');

  public function fetch($key) {
    $this->autoRender = false;

    $timezone  = "Asiz/Tokyo";
    $config    = array( "unique_id" => Configure::read('ical_unique_id'), "TZID" => $timezone );
    $uuid      = "3E26604A-50F4-4449-8B3E-E4F4932D05B5";
    $vcalendar = new vcalendar( $config );
    $vcalendar->setProperty( "method",        "PUBLISH" );
    $vcalendar->setProperty( "x-wr-calname",  Configure::read('ical_name'));
    $vcalendar->setProperty( "X-WR-CALDESC",  Configure::read('ical_name'));
    $vcalendar->setProperty( "X-WR-RELCALID", $uuid );
    $vcalendar->setProperty( "X-WR-TIMEZONE", $timezone );

    $xprops = array( "X-LIC-LOCATION" => $timezone );                // required of some calendar software
    iCalUtilityFunctions::createTimezone( $v, $timezone, $xprops );  // create timezone component(-s) opt. 1


    $icalProvide = $this->IcalProvide->findByKey($key);
    if (!is_null($icalProvide) && count($icalProvide)>0) {
      $conditions = json_decode($icalProvide['IcalProvide']['conditions'],true);
      $list = $this->NhkProgramList->search($conditions);

      //var_dump($list);
      foreach($list as $program_info) {
        
        $vevent = & $vcalendar->newComponent( "vevent" );
        $vevent->setProperty( "dtstart", $this->getTimeArray($program_info['start_time'])); 
        $vevent->setProperty( "dtend", $this->getTimeArray($program_info['end_time'])); 
        $vevent->setProperty( "summary", $program_info['title'] );
        $vevent->setProperty( "description", $this->makeDescription($program_info));
        //$vevent->setproperty( "comment", "this is a comment" );
        //$vevent->setproperty( "attendee", "attendee1@icaldomain.net" );

      }
      
    }
    echo $vcalendar->createCalendar();

  }

  protected function makeDescription($program_info) {
    $description = $program_info['subtitle']
                  .PHP_EOL
                  .PHP_EOL
                  .Router::url('/', true)
                  .PHP_EOL
                  .Configure::read('nhk_credit');

    return $description;

  }

  protected function getTimeArray($time_str) {
      $year  = date('Y',strtotime($time_str));
      $month = date('m',strtotime($time_str));
      $day   = date('d',strtotime($time_str));
      $hour  = date('H',strtotime($time_str));
      $min   = date('i',strtotime($time_str));
      $sec   = date('s',strtotime($time_str));

      return compact('year','month','day','hour','min','sec');
  }

}

