<?php
$edit_data = get_teacher_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Teacher
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_teacher">
                    <input type="hidden" name="teacher_id"  value="<?php echo $row['teacher_id']; ?>">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                   data-message-required="value required" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-5">
                            <input type="email" name="email" class="form-control" id="field-1" value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-5">
                            <textarea name="address" class="form-control" 
                                id="field-ta"><?php echo $row['address']; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Phone</label>

                        <div class="col-sm-5">
                            <input type="text" name="phone" class="form-control" id="field-1" value="<?php echo $row['phone']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Birth Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="birthday" class="form-control datepicker" 
                                       data-format="D, dd MM yyyy" placeholder="date here"  
                                       value="<?php if ($row['birthday'] != '') echo date("D, d M Y", $row['birthday']);?>">
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