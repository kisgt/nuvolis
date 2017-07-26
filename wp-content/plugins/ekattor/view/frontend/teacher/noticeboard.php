<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-doc-text-inv"></i>
            Noticeboard List
        </div>
    </h3>
</center>
<br>
<div class="col-md-offset-1 col-md-10">   
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Title</th>
            <th>Notice</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
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
                <?php $count++; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
