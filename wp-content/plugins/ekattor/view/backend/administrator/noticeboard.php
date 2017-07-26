<center>
    <h4> 
        <div class="label label-info">
            <i class="entypo-doc-text-inv"></i>
            Noticeboard List
        </div>
    </h4>
</center>
<br>

<button onclick="ajax_call('noticeboard-add')" class="btn btn-primary pull-right">
    <i class="entypo-plus"></i>
        <?php echo 'Add New Noticeboard'; ?>
</button>
<div style="clear:both;"></div>
<br>
    
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Title</th>
            <th>Notice</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $noticeboards = get_noticeboards();
        foreach ($noticeboards as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $row['notice_title']; ?></td>
                <td><?php echo $row['notice']; ?></td>
                <td><?php if ($row['create_timestamp'] != '') echo date("D, d M Y", $row['create_timestamp']); ?></td>
                <td><?php if ($row['end_timestamp'] != '') echo date("D, d M Y", $row['end_timestamp']); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <li>
                                <a href="#" onclick="ajax_call('noticeboard-edit' , <?php echo $row['notice_id'];?>)">
                                    <i class="entypo-pencil"></i> Edit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" onclick="confirm_modal('delete_notice' , <?php echo $row['notice_id'];?>)">
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