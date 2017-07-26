<center>
    <h3> 
        <div class="label label-info">
            <i class="entypo-credit-card"></i>
            Invoice List
        </div>
    </h3>
</center>
<br>
 <div class="col-md-offset-1 col-md-10">        
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Student</th>
            <th>Title</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count      = 1;
        $invoices   = get_invoices_of_loggedin_student();
        foreach ($invoices as $row){ ?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $student_name = get_student_name_from_id($row['student_id']); ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'secondary';?>"><?php echo $row['status'];?></span></td>
                <td><?php echo date("D, d M Y", $row['creation_timestamp']); ?></td>
               <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-gold btn-sm dropdown-toggle" data-toggle="dropdown">
                             <a href="#" onclick="ajax_call('invoice-show' , <?php echo $row['invoice_id'];?>)">
                                    <i class="entypo-book-open"></i> View Invoice
                                </a>
                        </button>
                        
                    </div>
                </td>
                <?php $count++; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
 </div>
