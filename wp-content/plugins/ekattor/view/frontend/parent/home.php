

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">    
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            Noticeboard And Event Calendar
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body">
                                <div id="notice_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

</div>

<script>
    jQuery(document).ready(function ($)
    {
        var calendar = $('#notice_calendar');

        $('#notice_calendar').fullCalendar({
            header: {
                left: 'title',
                right: 'month,agendaWeek,agendaDay today prev,next'
            },
            //defaultView: 'basicWeek',

            editable: false,
            firstDay: 1,
            height: 430,
            droppable: false,
            events: [
<?php
$notices = get_noticeboards();
foreach ($notices as $row) {
    ?>
                    {
                        title: "<?php echo $row['notice_title']; ?>",
                        start: new Date(<?php echo date('Y', $row['create_timestamp']); ?>,
    <?php echo date('m', $row['create_timestamp']) - 1; ?>,
    <?php echo date('d', $row['create_timestamp']); ?>),
                        end: new Date(<?php echo date('Y', $row['end_timestamp']); ?>,
    <?php echo date('m', $row['end_timestamp']) - 1; ?>,
    <?php echo date('d', $row['end_timestamp']); ?>)
                    },
<?php } ?>
            ]
        });
    });
</script>

