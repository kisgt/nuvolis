<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Add Invoice
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="add_invoice">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Student</label>
                        
                        <div class="col-sm-7">
                            <select name="student_id" class="form-control">
                                <?php
                                $students = get_all_students();
                                foreach ($students as $row):
                                    ?>
                                    <option value="<?php echo $row['student_id']; ?>">
                                        class <?php echo get_class_name_from_id($row['class_id']); ?> -
                                        roll <?php echo $row['roll']; ?> -
                                        <?php echo $row['name']; ?>
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
                            <input type="text" class="form-control" name="title" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-5">
                            <textarea name="description" class="form-control" id="field-ta" ></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Amount</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="amount" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-5">
                            <select name="status" class="form-control">
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="creation_timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                       placeholder="date here">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" class="btn btn-info" id="submit-button">Submit</button>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>