<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-location"></i>
            Transport List
        </div>
    </h3>
</center>
<br>
<div class="col-md-offset-1 col-md-10">        
    <table class="table table-bordered datatable" id="table_export">
        <thead>
            <tr>
                <th> # </th>
                <th>Route Name</th>
                <th>Number Of Vehicle</th>
                <th>Description</th>
                <th>Route Fare</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $transports = get_transports();
            foreach ($transports as $row) {
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['route_name']; ?></td>
                    <td><?php echo $row['number_of_vehicle']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['route_fare']; ?></td>
                <?php $count++; ?>
                </tr>
<?php } ?>
        </tbody>
    </table>

</div>