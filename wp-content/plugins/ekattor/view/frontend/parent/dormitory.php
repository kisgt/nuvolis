<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-home"></i>
            Dormitory List
        </div>
    </h3>
</center>
<br>
<div class="col-md-offset-1 col-md-10">      
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Dormitory Name</th>
            <th>Number Of Room</th>
            <th>Description</th>
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
                <?php $count++; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
