<center>
    <h4> 
        <div class="label label-info" style="font-size: 100%;">
            <i class="entypo-graduation-cap"></i>
            Exam List
        </div>
    </h4>
</center>

<div class="col-md-offset-1 col-md-10">  
    <button onclick="ajax_call('exam-add')" class="btn btn-primary pull-right">
        <i class="entypo-plus"></i>
        <?php echo 'Add New Exam'; ?>
    </button>
    <div style="clear:both;"></div>
    <br>
    
    <table class="table table-bordered datatable" id="table_export">
        <thead>
            <tr>
                <th> # </th>
                <th>Exam Name</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Options</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $count  = 1;
            $exams  = get_exams();
            foreach ($exams as $row){ ?>
                <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo date("D, d M Y", $row['date']); ?></td>
                    <td><?php echo $row['comment']; ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="#" onclick="ajax_call('exam-edit' , <?php echo $row['exam_id'];?>)">
                                        <i class="entypo-pencil"></i> Edit
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('delete_exam' , <?php echo $row['exam_id'];?>)">
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



















