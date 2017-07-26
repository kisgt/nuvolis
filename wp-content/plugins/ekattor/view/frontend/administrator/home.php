<div class="row">
    <div class="col-md-7 col-md-offset-1">
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

    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="fa fa-group" style="margin-bottom: 37px;"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo count(get_all_students()); ?>" 
                         data-postfix="" data-duration="1500" data-delay="0">0</div>

                    <h3>Total students</h3>
                </div>

            </div>
            <div class="col-md-12">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo count(get_teachers()); ?>" 
                         data-postfix="" data-duration="800" data-delay="0">0</div>

                    <h3>Total teachers</h3>
                </div>

            </div>
            <div class="col-md-12">

                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-user"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo count(get_parents()); ?>" 
                         data-postfix="" data-duration="500" data-delay="0">0</div>

                    <h3>Total parents</h3>
                </div>

            </div>
            <div class="col-md-12">
            
                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo get_todays_total_attendance();?>" 
                        data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3>Total present student today</h3>
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
            foreach( $notices as $row ) { ?>
            {
                title   : "<?php echo $row['notice_title'];?>",
                start   : new Date( <?php echo date('Y', $row['create_timestamp']); ?>, 
                                    <?php echo date('m', $row['create_timestamp']) - 1; ?>, 
                                    <?php echo date('d', $row['create_timestamp']); ?>),
                end     : new Date( <?php echo date('Y', $row['end_timestamp']); ?>, 
                                    <?php echo date('m', $row['end_timestamp']) - 1; ?>, 
                                    <?php echo date('d', $row['end_timestamp']); ?>)
            },
            <?php } ?>
        ]
    });
});
</script>
