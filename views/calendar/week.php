<style>

    .event {
        position: absolute; 
        overflow: hidden; 
        margin: 0; 
        width: 100%; 
        max-width: 100%; 
        padding: 0;
        right: 0;    
    }

    .event + .event {

        width: 80%;
    }


</style>

<script type="text/javascript">

    var Calendar = {
        
        init: function() {
            
            $(".event").hover(Calendar.mouseInEvent, Calendar.mouseOutEvent);
            
        },
        mouseInEvent: function() {
            $(this).css("z-index", 999999);           
            
        },
        mouseOutEvent: function() {
            $(this).css("z-index", null);           
            
        }        
        
    };
    
    $(document).ready(Calendar.init);


</script>

<table class="calendar table table-bordered">

    <?php $time = Calendar::timetogmtime(strtotime($date) - (strtotime($date) % Date::DAY)) ?>

    <tr>
        <td></td>
        <th colspan="7" style="text-align: center;"><?php echo Date::formatted_time($date, "F") ?></th>

    </tr>

    <tr>
        <th></th>

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

                    <td rowspan="24" style="position: relative; padding-left: 0px;">

                        <?php foreach ($events as $event): ?>

                            <?php if (strtotime($event->start) >= $time && strtotime($event->end) < ($time + Date::DAY)): ?>

                                <?php
                                // Determining relative distances from top and bottom
                                $top = (strtotime($event->start) - $time) / Date::DAY * 100;

                                $bottom = 100 - ((strtotime($event->end) - $time) / Date::DAY * 100);

                                $top = number_format($top, 2, ".", "");
                                $bottom = number_format($bottom, 2, ".", "");
                                ?>

                                <div class="success event" style="top: <?php echo $top ?>%; bottom: <?php echo $bottom ?>%; ">
                                    <div style="margin:5px">
                                        <?php echo View::factory("calendar/event", array("event" => $event)) ?>
                                    </div>
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

