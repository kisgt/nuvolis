<center>
    <h4> 
        <div class="label label-info">
            <i class="entypo-docs"></i>
            Subjects of class <?php echo get_class_name_from_id($_GET['class_id']);?>
        </div>
    </h4>
</center>
<br>
    
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Name</th>
            <th>Class</th>
            <th>Teacher</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count      = 1;
        $subjects   = get_subjects_by_class($_GET['class_id']);
        foreach ($subjects as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php $class_info	= get_class_info($row['class_id']); foreach ($class_info as $row2)echo $row2['name'];?></td>
                <td><?php $teacher_info	= get_teacher_info($row['teacher_id']); foreach ($teacher_info as $row3)echo $row3['name'];?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="ajax_call('subject-edit' , <?php echo $row['subject_id'];?>)">
                                    <i class="entypo-pencil"></i> Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('delete_subject' , <?php echo $row['subject_id'];?> , <?php echo $row['class_id'];?>)">
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
