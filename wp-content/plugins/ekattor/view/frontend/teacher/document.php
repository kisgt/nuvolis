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
    <button onclick="ajax_call('document-add')" class="btn btn-primary pull-right">
    <i class="entypo-plus"></i>
    <?php echo 'Add New Study Material'; ?>
</button>
<div style="clear:both;"></div>
<br>
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Date</th>
            <th>Title</th>
            <th>Description</th>
            <th>Class</th>
            <th>Download</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count      = 1;
        $upload_dir = wp_upload_dir();
        $documents  = get_documents_of_loggedin_teacher();
        foreach ($documents as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php if ($row['timestamp'] != '') echo date("d M, Y", $row['timestamp']); ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php $class_info = get_class_info($row['class_id']); foreach ($class_info as $row2)echo $row2['name'];?></td>
                <td>
                    <a href="<?php echo $upload_dir['baseurl'] . '/ekattor/document/' . $row['file_name']; ?>" 
                        class="btn btn-blue btn-icon icon-left">
                            <i class="entypo-download"></i>
                            Download
                    </a>
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="ajax_call('document-edit' , <?php echo $row['document_id'];?>)">
                                    <i class="entypo-pencil"></i> Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('delete_document' , <?php echo $row['document_id'];?>)">
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

</script>