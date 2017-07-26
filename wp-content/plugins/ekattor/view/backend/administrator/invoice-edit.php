<?php
$edit_data = get_invoice_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Invoice
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_invoice">
                    <input type="hidden" name="invoice_id"  value="<?php echo $row['invoice_id']; ?>">
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Student</label>
                        
                        <div class="col-sm-7">
                            <select name="student_id" class="form-control">
                                <?php
                                $students = get_all_students();
                                foreach ($students as $row2):
                                    ?>
                                    <option value="<?php echo $row2['student_id']; ?>" <?php if($row2['student_id'] == $row['student_id']) echo 'selected'; ?>>
                                        class <?php echo get_class_name_from_id($row2['class_id']); ?> -
                                        roll <?php echo $row2['roll']; ?> -
                                        <?php echo $row2['name']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-5">
                            <textarea name="description" class="form-control" id="field-ta" ><?php echo $row['description']; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Amount</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="amount"  value="<?php echo $row['amount']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-5">
                            <select name="status" class="form-control">
                                <option value="paid" <?php if($row['status'] == 'paid') echo 'selected'; ?>>Paid</option>
                                <option value="unpaid" <?php if($row['status'] == 'unpaid') echo 'selected'; ?>>Unpaid</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="creation_timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                       placeholder="date here"  value="<?php if ($row['creation_timestamp'] != '') echo date("D, d M Y", $row['creation_timestamp']); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" class="btn btn-info" id="submit-button">Update</button>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>