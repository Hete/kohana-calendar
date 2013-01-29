<div class="event <?php echo $event->type ?>" style="padding:5px">

    <smaller><?php echo date("G:i", strtotime($event->start)) ?> à <?php echo date("G:i", strtotime($event->end)) ?></smaller><br/>

    <strong><?php echo $event->title ?></strong>
    <p><?php echo $event->description ?></p>

</div>
