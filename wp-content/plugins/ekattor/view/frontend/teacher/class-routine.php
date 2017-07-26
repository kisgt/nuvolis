<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-target"></i>
            Class Routine List
        </div>
    </h3>
</center>
<br>
   
<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <div class="panel-group joined" id="accordion-test-2">
           
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2" 
                               class="active">
                                    <i class="entypo-direction"></i> Class Routine
                            </a>
                        </h4>
                    </div>
                   
                    <div id="collapseOne-2" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <table cellpadding="0" cellspacing="0" border="0"  class="table table-bordered table-responsive">
                                <tbody>
                                    <?php
                                    for ($d = 1; $d <= 7; $d++):

                                        if ($d == 1)
                                            $day = 'sunday';
                                        else if ($d == 2)
                                            $day = 'monday';
                                        else if ($d == 3)
                                            $day = 'tuesday';
                                        else if ($d == 4)
                                            $day = 'wednesday';
                                        else if ($d == 5)
                                            $day = 'thursday';
                                        else if ($d == 6)
                                            $day = 'friday';
                                        else if ($d == 7)
                                            $day = 'saturday';
                                        ?>
                                        <tr class="gradeA">
                                            <td width="100"><?php echo strtoupper($day); ?></td>
                                            <td>
                                                <?php
                                                $routines = get_class_routines($_GET['class_id'], $day);
                                                foreach ($routines as $row2):
                                                    ?>
                                                    <div class="btn-group">
                                                        <button class="btn btn-info btn-normal dropdown-toggle" data-toggle="dropdown">
                                                            <?php echo get_subject_name_from_id($row2['subject_id']); ?>
                                                            <?php 
                                                    if($row2['minute_start'] < 10 || $row2['minute_end'] <10){
                                                         echo '(' . $row2['hour_start'].':0'.$row2['minute_start'] . '-' .  $row2['hour_end'].':0'.$row2['minute_end']  . ')';  
                                                    }else{
                                                    echo '(' . $row2['hour_start'].':'.$row2['minute_start'] . '-' .  $row2['hour_end'].':'.$row2['minute_end']  . ')'; 
                                                    }
                                                    ?>
                                                        </button>
                                                    </div>
                                                <?php endforeach; ?>

                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
</div>


<script type="text/javascript">

    jQuery(document).ready(function ($)
    {
        // convert datatable
        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
        });

        //customize the select menu
        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>