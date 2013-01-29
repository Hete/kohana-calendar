<?php

/**
 * 
 * @package Calendar
 * @category Model
 */
class Model_Event extends Model {

    public $start, $end, $title, $description, $attributes;

    public function __construct($title, $description, $start, $end, array $attributes = NULL) {
        $this->title = $title;
        $this->description = $description;
        $this->start = $start;
        $this->end = $end;
        $this->attributes = $attributes;
    }

}

?>
