<center>
    <h4> 
        <div class="label label-info">
            <i class="entypo-graduation-cap"></i>
            Grade List
        </div>
    </h4>
</center>
<br>

<button onclick="ajax_call('grade-add')" class="btn btn-primary pull-right">
    <i class="entypo-plus"></i>
    <?php echo 'Add New Grade'; ?>
</button>
<div style="clear:both;"></div>
<br>
    
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Grade Name</th>
            <th>Grade Point</th>
            <th>Mark From</th>
            <th>Mark Upto</th>
            <th>Comment</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count      = 1;
        $grades     = get_grades();
        foreach ($grades as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['grade_point']; ?></td>
                <td><?php echo $row['mark_from']; ?></td>
                <td><?php echo $row['mark_upto']; ?></td>
                <td><?php echo $row['comment']; ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="ajax_call('grade-edit' , <?php echo $row['grade_id'];?>)">
                                    <i class="entypo-pencil"></i> Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('delete_grade' , <?php echo $row['grade_id'];?>)">
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
