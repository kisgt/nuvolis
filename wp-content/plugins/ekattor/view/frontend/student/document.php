<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-book-open"></i>
            Study Material List
        </div>
    </h3>
</center>
<br>
<div class="col-md-offset-1 col-md-10">       
    <table class="table table-bordered datatable" id="table_export">
        <thead>
            <tr>
                <th> # </th>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                <th>Class</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $upload_dir = wp_upload_dir();
            $documents = get_documents_of_loggedin_student();
            foreach ($documents as $row) {
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php if ($row['timestamp'] != '') echo date("d M, Y", $row['timestamp']); ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo get_class_name_from_id($row['class_id']); ?></td>
                    <td>
                        <a href="<?php echo $upload_dir['baseurl'] . '/ekattor/document/' . $row['file_name']; ?>" 
                           class="btn btn-blue btn-icon icon-left">
                            <i class="entypo-download"></i>
                            Download
                        </a>
                    </td>
                <?php $count++; ?>
                </tr>
<?php } ?>
        </tbody>
    </table>
</div>
