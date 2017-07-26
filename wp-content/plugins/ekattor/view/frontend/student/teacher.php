<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-users"></i>
            Teachers list
        </div>
    </h3>
</center>
<br>
<div class="col-md-offset-1 col-md-10">       
    <table class="table table-bordered datatable" id="table_export">
        <thead>
            <tr>
                <th> # </th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $teachers = get_teachers();
            foreach ($teachers as $row) {
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td>
                        <img src="<?php echo get_image_url('teacher', $row['teacher_id']); ?>" 
                             class="img-circle" width="40px" height="40px">
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                <?php $count++; ?>
                </tr>
<?php } ?>
        </tbody>
    </table>
</div>
