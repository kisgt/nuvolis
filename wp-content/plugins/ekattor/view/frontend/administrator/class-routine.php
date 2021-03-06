<center>
    <h4> 
        <div class="label label-info" style="font-size: 100%;">
            <i class="entypo-target"></i>
            Class Routine List
        </div>
    </h4>
</center>

<div class="col-md-offset-1 col-md-10">
    <button onclick="ajax_call('class-routine-add')" class="btn btn-primary pull-right">
        <i class="entypo-plus"></i>
        <?php echo 'Add New Class Routine'; ?>
    </button>
    <div style="clear:both;"></div>
    <br>
        
    <div class="panel-group joined" id="accordion-test-2">
        <?php
        $toggle = true;
        $classes = get_classes();
        foreach ($classes as $row):
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php echo $row['class_id']; ?>" 
                           class="<?php if ($toggle == false) { echo 'collapsed'; } ?>">
                                <i class="entypo-direction"></i> Class <?php echo $row['name_numeric']; ?>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?php if ( $_POST ) echo $_POST['class_id']; else echo $row['class_id']; ?>" class="panel-collapse collapse <?php if ($toggle == true) { echo 'in'; } ?>">
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
                                            $routines = get_class_routines($row['class_id'], $day);
                                            foreach ($routines as $row2):
                                                ?>
                                                <div class="btn-group">
                                                    <button class="btn btn-info btn-normal dropdown-toggle" data-toggle="dropdown">
                                                        <?php echo get_subject_name_from_id($row2['subject_id']); ?>
                                                        <?php 
                                                        if($row2['minute_start'] < 10 || $row2['minute_end'] < 10){
                                                             echo '(' . $row2['hour_start'].':0'.$row2['minute_start'] . '-' .  $row2['hour_end'].':0'.$row2['minute_end']  . ')';  
                                                        }else{
                                                        echo '(' . $row2['hour_start'].':'.$row2['minute_start'] . '-' .  $row2['hour_end'].':'.$row2['minute_end']  . ')'; 
                                                        }
                                                        ?>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="#" onclick="ajax_call('class-routine-edit' , <?php echo $row2['class_routine_id'];?>)">
                                                                <i class="entypo-pencil"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="#" onclick="confirm_modal('delete_class_routine' , <?php echo $row2['class_routine_id'];?>)">
                                                                <i class="entypo-cancel-circled"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
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
            <?php
            $toggle = false;
        endforeach;
        ?>
    </div>
</div>