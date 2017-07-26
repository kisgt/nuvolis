<?php
$student_id     = $_POST['param3'];
$edit_data      = get_parent_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Parent
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_parent">
                    <input type="hidden" name="parent_id"   value="<?php echo $row['parent_id']; ?>">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Parent Of</label>

                        <div class="col-sm-5">
                            <input type="text"  readonly class="form-control" 
                                 value="<?php $student_info = get_student_info($student_id);foreach ($student_info as $row2)echo $row2['name'];?>" >
                            <input type="hidden" name="class_id" value="<?php echo $row2['class_id'];?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                   data-message-required="Value Required"  autofocus value="<?php echo $row['name'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Relation With Student</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="relation_with_student" value="<?php echo $row['relation_with_student'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Phone</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Profession</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="profession" value="<?php echo $row['profession'];?>">
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