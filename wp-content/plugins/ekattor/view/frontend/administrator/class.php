<center>
    <h4> 
        <div class="label label-info" style="font-size: 100%;">
            <i class="entypo-menu"></i>
            Class list
        </div>
    </h4>
</center>

<div class="col-md-offset-1 col-md-10">
    <button onclick="ajax_call('class-add')" class="btn btn-primary pull-right">
        <i class="entypo-plus"></i>
        <?php echo 'Add New Class'; ?>
    </button>
    <div style="clear:both;"></div>
    <br>
    
    <table class="table table-bordered datatable" id="table_export">
        <thead>
            <tr>
                <th> # </th>
                <th>Class Name</th>
                <th>Numeric Name</th>
                <th>Teacher</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count      = 1;
            $classes = get_classes();
            foreach ($classes as $row) { ?>
                <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['name_numeric']; ?></td>
                    <td><?php $teacher_info	= get_teacher_info($row['teacher_id']); foreach ($teacher_info as $row2)echo $row2['name'];?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="#" onclick="ajax_call('class-edit' , <?php echo $row['class_id'];?>)">
                                        <i class="entypo-pencil"></i> Edit
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('delete_class' , <?php echo $row['class_id'];?>)">
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

















