<?php echo View::factory("calendar/assets") ?>

<?php $time = strtotime($date) ?>

<?php $time_beginning_of_the_day = Calendar::floor_time($time - ($time % Date::DAY)) ?>

<table class="table table-bordered calendar day">

    <tr>

        <th></th>

        <th style="text-align: center;"><?php echo date("l d", $time_beginning_of_the_day) ?></th>


    </tr>

    <?php for ($hour = 0; $hour < Date::DAY; $hour = $hour += Date::HOUR): ?>

        <tr>

            <th style="text-align: center;"><?php echo date("G:i", $time_beginning_of_the_day) ?></th>

            <?php if ($hour === 0): ?>
                <?php echo View::factory("calendar/td/day", array("time_beginning_of_the_day" => $time_beginning_of_the_day, "events" => $events)) ?>
            <?php endif; ?>
        </tr>
        <?php $time_beginning_of_the_day += Date::HOUR ?>

    <?php endfor; ?>

</table>