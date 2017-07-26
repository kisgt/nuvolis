<center>
    <h4> 
        <div class="label label-info">
            <i class="entypo-home"></i>
            Dormitory List
        </div>
    </h4>
</center>
<br>

<button onclick="ajax_call('dormitory-add')" class="btn btn-primary pull-right">
    <i class="entypo-plus"></i>
    <?php echo 'Add New Dormitory'; ?>
</button>
<div style="clear:both;"></div>
<br>
    
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Dormitory Name</th>
            <th>Number Of Room</th>
            <th>Description</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $dormitorys = get_dormitorys();
        foreach ($dormitorys as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number_of_room']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="ajax_call('dormitory-edit' , <?php echo $row['dormitory_id'];?>)">
                                    <i class="entypo-pencil"></i> Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('delete_dormitory' , <?php echo $row['dormitory_id'];?>)">
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
