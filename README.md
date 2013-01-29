# Kohana calendar

Kohana calendar is a simple calendar module. It handles events and present them
nicely in a Bootstrap clean design.

## How to use

This prints a week calendar starting on monday of the current week

    echo Calendar::week();

You may define the starting day

    echo Calendar::("2013-09-02");

And also add events in in

    $event = new Model_Event("A title", "A description", "2013-09-02 22:00", "2013-09-02 22:45");

    $events = array($event);

    echo Calendar::("2013-09-02", $events);
