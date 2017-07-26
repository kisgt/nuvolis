<?php
$edit_data = get_student_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Student
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_student">
                    <input type="hidden" name="student_id"  value="<?php echo $row['student_id']; ?>">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                       data-message-required="value required"  value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Class</label>

                        <div class="col-sm-5">
                            <select name="class_id" class="form-control">
                                <?php
                                $classes = get_classes();
                                foreach ($classes as $row2){ ?>
                                    <option value="<?php echo $row2['class_id']; ?>" <?php if($row2['class_id'] == $row['class_id']) echo 'selected'; ?>>
                                        Class <?php echo $row2['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Roll</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="roll" value="<?php echo $row['roll']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Birth Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="birthday" class="form-control datepicker" 
                                       data-format="D, dd MM yyyy" placeholder="date here" 
                                       value="<?php if ($row['birthday'] != '')echo date("D, d M Y", $row['birthday']);?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Sex</label>

                        <div class="col-sm-5">
                            <select name="sex" class="form-control">
                                <option value="male" <?php if($row['sex'] == 'male') echo 'selected'; ?>>Male</option>
                                <option value="female" <?php if($row['sex'] == 'female') echo 'selected'; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-5">
                            <textarea name="address" 
                                class="form-control" id="field-ta"><?php echo $row['address']; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Phone</label>

                        <div class="col-sm-5">
                            <input type="text" name="phone" class="form-control" id="field-1" value="<?php echo $row['phone']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-5">
                            <input type="email" name="email" class="form-control" id="field-1" value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Photo</label>

                        <div class="col-sm-5">
                            <input type="file" name="image" class="form-control" >
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