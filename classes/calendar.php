<?php

/**
 * 
 * @package Calendar
 * @author Guillaume Poirier-Morency <guillaumepoiriermorency@gmail.com>
 * @copyright (c) 2013, Hète.ca Inc.
 */
class Calendar {

    public static $days_of_week = array(
        "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"
    );

    public static function strtogmtime($date) {
        return static::timetogmtime(strtotime($date));
    }

    public static function timetogmtime($time) {
        return $time + 5 * Date::HOUR;
    }

    public static function event(Model_Event $event) {
        return View::factory("calendar/event", array("event" => $event));
    }

    public static function day($date = NULL, array $events = array()) {

        if ($date === NULL) {
            $date = Date::now();
        }

        return View::factory("calendar/day", array("date" => $date, "events" => $events));
    }

    /**
     * 
     * @param string $date first day in week
     * @param array $events events 
     * @return View
     */
    public static function week($date = NULL, array $events = array(), $earliest_hour = 0, $latest_hour = 23) {

        if ($date === NULL) {
            $date = Date::now();
        }

        return View::factory("calendar/week", array("date" => $date, "events" => $events, "earliest_hour" => $earliest_hour, "latest_hour" => $latest_hour));
    }

    public static function month($date = NULL, array $events = array()) {

        if ($date === NULL) {
            $date = Date::now();
        }

        return View::factory("calendar/month", array("events" => $events));
    }

}

?>
