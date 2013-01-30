<td rowspan="24" class="day"> 

    <?php foreach ($events as $event): ?>

        <?php if (strtotime($event->start) >= $time_beginning_of_the_day && strtotime($event->end) < ($time_beginning_of_the_day + Date::DAY)): ?>

            <?php
            // Determining relative distances from top and bottom
            $top = (strtotime($event->start) - $time_beginning_of_the_day) / Date::DAY * 100;

            $height = ((strtotime($event->end) - strtotime($event->start)) / Date::DAY * 100);

            $top = number_format($top, 2, ".", "");
            $height = number_format($height, 2, ".", "");
            ?>

            <div class="event-container alert alert-<?php echo $event->type ?>" style="top: <?php echo $top ?>%; height: <?php echo $height ?>%; ">
                <?php echo View::factory("calendar/event", array("event" => $event)) ?>
            </div>

        <?php endif; ?>

    <?php endforeach; ?>

</td>