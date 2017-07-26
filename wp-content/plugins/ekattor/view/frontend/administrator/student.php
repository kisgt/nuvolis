<center>
    <h4> 
        <div class="label label-info" style="font-size: 100%;">
            <i class="fa fa-group"></i>
            Students of class <?php echo get_class_name_from_id($_GET['class_id']);?>
        </div>
    </h4>
</center>
<br>
    
<div class="col-md-offset-1 col-md-10">
    <table class="table table-bordered datatable" id="table_export">
        <thead>
            <tr>
                <th> # </th>
                <th>Roll</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count      = 1;
            $students   = get_students($_GET['class_id']);
            foreach ($students as $row){ ?>
                <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['roll']; ?></td>
                    <td>
                        <img src="<?php echo get_image_url('student' , $row['student_id']);?>" 
                            class="img-circle" width="40px" height="40px">
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="#" onclick="ajax_call('student-profile' , <?php echo $row['student_id'];?>)">
                                        <i class="entypo-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="ajax_call('student-edit' , <?php echo $row['student_id'];?>)">
                                        <i class="entypo-pencil"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="ajax_call('student-show-marksheet' , <?php echo $row['student_id'];?>)">
                                        <i class="entypo-chart-bar"></i> View Marksheet
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo admin_url() . 'user-edit.php?user_id=' . $row['ID']; ?>">
                                        <i class="entypo-pencil"></i> Wp account
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('delete_student' , <?php echo $row['student_id'];?> , <?php echo $row['class_id'];?>)">
                                        <i class="entypo-cancel-circled"></i> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <?php $count++; ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>






















