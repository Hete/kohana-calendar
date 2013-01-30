<?php echo View::factory("calendar/assets") ?>

<?php $time = strtotime($date) ?>

<table class="calendar week table table-bordered">

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
                    <?php endif; ?>

                <?php if ($hour === 0): ?>

                    <?php echo View::factory("calendar/td/day", array("time_beginning_of_the_day" => $time_beginning_of_the_day, "events" => $events)) ?>

                <?php endif; ?>

                <?php if ($day === NULL): ?>
                    <?php $time_beginning_of_the_day += Date::HOUR ?>
                <?php endif; ?>

            <?php endforeach; ?>

        </tr>

    <?php endfor; ?>

</table>

