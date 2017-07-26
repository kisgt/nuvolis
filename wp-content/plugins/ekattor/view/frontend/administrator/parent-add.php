<?php $student_id = $_POST['param2']; ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Add Parent
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="add_parent">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Parent Of</label>

                        <div class="col-sm-5">
                            <input type="text"  readonly class="form-control" 
                                 value="<?php $student_info = get_student_info($student_id);foreach ($student_info as $row)echo $row['name'];?>" >
                            <input type="hidden" name="student_id" value="<?php echo $student_id;?>" >
                            <input type="hidden" name="class_id" value="<?php echo $row['class_id'];?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                   data-message-required="Value Required"  autofocus value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" 
                                   value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Wp Username</label>

                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" id="field-1"  data-validate="required" 
                                       data-message-required="value required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" id="field-1"  data-validate="required" 
                                       data-message-required="value required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Relation With Student</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="relation_with_student" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Phone</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="address" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Profession</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="profession" value="">
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