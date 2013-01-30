<?php

/**
 * 
 * @package Calendar
 * @author Guillaume Poirier-Morency <guillaumepoiriermorency@gmail.com>
 * @copyright (c) 2013, Hète.ca Inc.
 */
class Kohana_Calendar {

    /**
     *
     * @var array 
     */
    public static $days_of_week = array(
        "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"
    );

    public static function floor_time($time) {
        $missing = 24 - (int) date("H", $time);
        return $time + $missing * Date::HOUR;
    }

    /**
     * Renders an event.
     * 
     * @param Model_Event $event
     * @return type
     */
    public static function event(Model_Event $event) {
        return View::factory("calendar/event", array("event" => $event));
    }

    /**
     * Renders a calendar for a day.
     * 
     * @param type $date
     * @param array $events
     * @return type
     */
    public static function day($date = NULL, array $events = array()) {

        if ($date === NULL) {
            // Today, simply
            $date = Date::now();
        }

        return View::factory("calendar/day", array("date" => $date, "events" => $events));
    }

    /**
     * Renders a calendar for a week.
     * 
     * @param string $date first day in week
     * @param array $events events 
     * @return View
     */
    public static function week($date = NULL, array $events = array(), $earliest_hour = 0, $latest_hour = 23) {

        if ($date === NULL) {
            // Monday of this week
            $date = Date::now();
        }

        return View::factory("calendar/week", array("date" => $date, "events" => $events, "earliest_hour" => $earliest_hour, "latest_hour" => $latest_hour));
    }

    /**
     * Renders a calendar starting with a month.
     * @param type $date
     * @param array $events
     * @return type
     */
    public static function month($date = NULL, array $events = array()) {

        if ($date === NULL) {
            // First of this month
            $date = Date::formatted_time("now", "Y-m-1");
        }

        return View::factory("calendar/month", array("events" => $events));
    }

    /**
     * Renders a calendar starting with a month.
     * @param type $date
     * @param array $events
     * @return type
     */
    public static function planning($date = NULL, array $events = array()) {
        
    }

}

?>
