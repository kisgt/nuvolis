<center>
    <h4> 
        <div class="label label-info" style="font-size: 100%;">
            <i class="entypo-location"></i>
            Transport List
        </div>
    </h4>
</center>

<div class="col-md-offset-1 col-md-10">
    <button onclick="ajax_call('transport-add')" class="btn btn-primary pull-right">
        <i class="entypo-plus"></i>
        <?php echo 'Add New Transport'; ?>
    </button>
    <div style="clear:both;"></div>
    <br>
        
    <table class="table table-bordered datatable" id="table_export">
        <thead>
            <tr>
                <th> # </th>
                <th>Route Name</th>
                <th>Number Of Vehicle</th>
                <th>Description</th>
                <th>Route Fare</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $transports = get_transports();
            foreach ($transports as $row){ ?>
                <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['route_name']; ?></td>
                    <td><?php echo $row['number_of_vehicle']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['route_fare']; ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="#" onclick="ajax_call('transport-edit' , <?php echo $row['transport_id'];?>)">
                                        <i class="entypo-pencil"></i> Edit
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('delete_transport' , <?php echo $row['transport_id'];?>)">
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






















