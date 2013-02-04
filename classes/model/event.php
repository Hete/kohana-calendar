<?php

/**
 * Represents an event in the calendar.
 * 
 * @todo ORM implementation and validations
 * 
 * @package Calendar
 * @category Model
 * @author Guillaume Poirier-Morency
 * @copyright (c) 2013, Hète.ca Inc.
 */
class Model_Event extends Model {

    public $start, $end, $title, $type, $description, $attributes;

    /**
     * 
     * @param string $title is the title of the event.
     * @param string $description is the description of the event.
     * @param string $start is when the event starts.
     * @param string $end is when the event finishes.
     * @param string $type is the event type. It is defined by Bootstrap right 
     * here http://twitter.github.com/bootstrap/components.html#alerts
     * @param array $attributes are custom attributes for the div.
     */
    public function __construct($title, $description, $start, $end, $type = "info", array $attributes = NULL) {
        $this->title = $title;
        $this->description = $description;
        $this->start = $start;
        $this->end = $end;
        $this->type = "alert-$type";
        $this->attributes = $attributes;
    }

    /**
     * Returns the duration of the event.
     * 
     * @return float
     */
    public static function duration() {
        return strtotime($this->end) - strtotime($this->start);
    }

}

?>
