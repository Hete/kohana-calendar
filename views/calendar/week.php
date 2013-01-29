<?php echo View::factory("calendar/assets") ?>

<table class="calendar week table table-bordered table-hover">

    <?php $time = Calendar::timetogmtime(strtotime($date) - (strtotime($date) % Date::DAY)) ?>

    <tr>
        <th colspan="8" style="text-align: center;"><?php echo Date::formatted_time($date, "F") ?></th>
    </tr>

    <tr>
        <th style="text-align: center;">GMT -5</th>

        <?php foreach (Calendar::$days_of_week as $day): ?>
            <th style="text-align: center;"><?php echo date("l", $time) ?></th>
            <?php $time += Date::DAY ?>
        <?php endforeach; ?>
    </tr>   

    <?php $time = Calendar::timetogmtime(strtotime($date) - (strtotime($date) % Date::DAY)) ?>

    <?php for ($hour = 0; $hour < Date::DAY; $hour = $hour += Date::HOUR): ?>

        <tr>
            <?php foreach (array(NULL) + Calendar::$days_of_week as $day): ?>

                <?php if ($day === NULL): ?>
                    <th style="text-align: center;"><?php echo gmdate("G:i", $hour) ?></th>
                <?php endif; ?>

                <?php if ($hour === 0): ?>

                    <td rowspan="24" class="day">

                        <?php foreach ($events as $event): ?>

                            <?php if (strtotime($event->start) >= $time && strtotime($event->end) < ($time + Date::DAY)): ?>

                                <?php
                                // Determining relative distances from top and bottom
                                $top = (strtotime($event->start) - $time) / Date::DAY * 100;

                                $bottom = 100 - ((strtotime($event->end) - $time) / Date::DAY * 100);

                                $top = number_format($top, 2, ".", "");
                                $bottom = number_format($bottom, 2, ".", "");
                                ?>

                                <div class="event-container" style="top: <?php echo $top ?>%; bottom: <?php echo $bottom ?>%; ">
                                    <?php echo View::factory("calendar/event", array("event" => $event)) ?>
                                </div>


                            <?php endif; ?>

                        <?php endforeach; ?>

                    </td>

                <?php endif; ?>


                <?php $time += Date::DAY ?>


            <?php endforeach; ?>

        </tr>


    <?php endfor; ?>

</table>

