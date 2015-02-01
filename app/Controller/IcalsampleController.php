<?php
App::uses('AppController', 'Controller');
// see http://qiita.com/katsukii/items/8d2126177446d23ab37d
App::import('Vendor', 'iCalcreatorClass', array('file' => 'iCalcreator'.DS.'iCalcreator.class.php'));

class IcalsampleController extends AppController {

  public function index() {
    $this->autoRender = false;

    $timezone  = "Asiz/Tokyo";
    $config    = array( "unique_id" => "kazuki86", "TZID" => $timezone );
    $uuid      = "3E26604A-50F4-4449-8B3E-E4F4932D05B5";
    $vcalendar = new vcalendar( $config );
    $vcalendar->setProperty( "method",        "PUBLISH" );
    $vcalendar->setProperty( "x-wr-calname",  "CakePHP x iCal sample by kazuki86" );
    $vcalendar->setProperty( "X-WR-CALDESC",  "Calendar object created by cakephp and iCalcreator" );
    $vcalendar->setProperty( "X-WR-RELCALID", $uuid );
    $vcalendar->setProperty( "X-WR-TIMEZONE", $timezone );

    $xprops = array( "X-LIC-LOCATION" => $timezone );                // required of some calendar software
    iCalUtilityFunctions::createTimezone( $v, $timezone, $xprops );  // create timezone component(-s) opt. 1




    $vevent = & $vcalendar->newComponent( "vevent" );
    $vevent->setProperty( "dtstart", array( "year"  => 2015 , "month" => 2 , "day"   => 1 , "hour"  =>18 , "min"   => 0 , "sec"   => 0 )); 
    $vevent->setProperty( "dtend",   array( "year"  => 2015 , "month" => 2 , "day"   => 1 , "hour"  =>22 , "min"   =>30 , "sec"   => 0 ));
    $vevent->setProperty( "LOCATION", "Central Placa" );       // property name - case independent
    $vevent->setProperty( "summary", "PHPer MTG" );
    $vevent->setProperty( "description", "This is a description" );
    $vevent->setproperty( "comment", "this is a comment" );
    $vevent->setproperty( "attendee", "attendee1@icaldomain.net" );

    $vevent = & $vcalendar->newComponent( "vevent" );                  // create next event calendar component
    $vevent->setProperty( "dtstart", "20150202", array("VALUE" => "DATE"));// alt. date format,//  now for an all-day event
    $vevent->setProperty( "organizer" , "boss@icaldomain.com" );
    $vevent->setProperty( "summary", "ALL-DAY event" );
    $vevent->setProperty( "description", "This is a description for an all-day event" );
    $vevent->setProperty( "resources", "COMPUTER PROJECTOR" );
    $vevent->setProperty( "rrule", array( "FREQ" => "WEEKLY", "count" => 4));// weekly, four occasions
    $vevent->parse( "LOCATION:1CP Conference Room 4350" );     // supporting parse of

    echo $vcalendar->createCalendar();
    //echo 'hello';

  }


}
