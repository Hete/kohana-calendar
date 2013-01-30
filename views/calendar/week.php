<?php echo View::factory("calendar/assets") ?>


<?php $time = strtotime($date) ?>


<table class="calendar week table table-bordered table-hover"> 


    <?php $time_beginning_of_the_day = Calendar::floor_time($time - ($time % Date::DAY)) ?>

    <tr>
        <th colspan="8" style="text-align: center;"><?php echo Date::formatted_time($date, "F " . Date::$timestamp_format) ?></th>
    </tr>

    <tr>
        <th style="text-align: center;"></th>

        <?php foreach (Calendar::$days_of_week as $day): ?>
            <th style="text-align: center;"><?php echo date("l d", $time_beginning_of_the_day) ?></th>
            <?php
            $time_beginning_of_the_day += Date::DAY
            ?>
        <?php endforeach; ?>
    </tr>

    <?php $time_beginning_of_the_day = Calendar::floor_time($time - ($time % Date::DAY)) ?>

    <?php for ($hour = 0; $hour < Date::DAY; $hour = $hour += Date::HOUR): ?>

        <tr>
            <?php foreach (array(NULL) + Calendar::$days_of_week as $day): ?>

                <?php if ($day === NULL): ?>
                    <th style="text-align: center;"><?php echo date("G:i", $time_beginning_of_the_day) ?></th>
                    <?php echo $time_beginning_of_the_day += Date::HOUR ?>
                <?php endif; ?>

                <?php if ($hour === 0): ?>

                    <td rowspan="24" class="day">

                 
                        <?php foreach ($events as $event): ?>

                            <?php if (strtotime($event->start) >= $time_beginning_of_the_day && strtotime($event->end) < ($time_beginning_of_the_day + Date::DAY)): ?>

                                <?php
                                // Determining relative distances from top and bottom
                                $top = (strtotime($event->start) - $time_beginning_of_the_day) / Date::DAY * 100;

                                $bottom = 100 - ((strtotime($event->end) - $time_beginning_of_the_day) / Date::DAY * 100);

                                $top = number_format($top, 2, ".", "");
                                $bottom = number_format($bottom, 2, ".", "");
                                ?>

                                <div class="event-container success" style="top: <?php echo $top ?>%; height: <?php echo $bottom - $top ?>%; ">
                                    <?php echo View::factory("calendar/event", array("event" => $event)) ?>
                                </div>


                            <?php endif; ?>

                        <?php endforeach; ?>

                    </td>

                <?php endif; ?>

            <?php endforeach; ?>

        </tr>

    <?php endfor; ?>

</table>

