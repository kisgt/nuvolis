<?php
$class_info = get_classes_of_loggedin_student();
foreach ($class_info as $row) $class_id = $row['class_id'];
?>
<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-docs"></i>
            Subjects of class <?php echo get_class_name_from_id($class_id);?>
        </div>
    </h3>
</center>
<br>
 <div class="col-md-offset-1 col-md-10">        
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Name</th>
            <th>Class</th>
            <th>Teacher</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count      = 1;
        $subjects   = get_subjects_by_class($class_id);
        foreach ($subjects as $row2){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $row2['name']; ?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php $teacher_info	= get_teacher_info($row2['teacher_id']); foreach ($teacher_info as $row3)echo $row3['name'];?></td>
                <?php $count++; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
 </div>
