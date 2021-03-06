<center>
    <h4> 
        <div class="label label-info">
            <i class="entypo-users"></i>
            Teachers List
        </div>
    </h4>
</center>
<br>
<button onclick="ajax_call('teacher-add')" class="btn btn-primary pull-right">
    <i class="entypo-user-add"></i>
    <?php echo 'Add New Teacher'; ?>
</button>
<div style="clear:both;"></div>
<br>

<div style="min-height: 800px;">
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $teachers = get_teachers();
        foreach ($teachers as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td>
                    <img src="<?php echo get_image_url('teacher' , $row['teacher_id']);?>" 
                        class="img-circle" width="40px" height="40px">
                </td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="ajax_call('teacher-profile' , <?php echo $row['teacher_id'];?>)">
                                    <i class="entypo-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="ajax_call('teacher-edit' , <?php echo $row['teacher_id'];?>)">
                                    <i class="entypo-pencil"></i> Edit
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo admin_url() . 'user-edit.php?user_id=' . $row['ID']; ?>">
                                    <i class="entypo-pencil"></i> Wp account
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('delete_teacher' , <?php echo $row['teacher_id'];?>)">
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