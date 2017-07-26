<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-book"></i>
            Book List
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
            <th>Author</th>
            <th>Description</th>
            <th>Price</th>
            <th>Class</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $books = get_books();
        foreach ($books as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo get_class_name_from_id($row['class_id']); ?></td>
                <td><span class="label label-<?php if($row['status']=='available')echo 'success';else echo 'secondary';?>"><?php echo $row['status'];?></span></td>
                <?php $count++; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
 </div>
