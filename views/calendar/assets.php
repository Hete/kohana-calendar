<style>

    .event-container {
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

    .day {        
        position: relative; 
        padding-left: 0px;
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