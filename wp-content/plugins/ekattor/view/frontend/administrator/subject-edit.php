<?php
$edit_data = get_subject_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Subject
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_subject">
                    <input type="hidden" name="subject_id"  value="<?php echo $row['subject_id']; ?>">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                   data-message-required="value required" value="<?php echo $row['name']; ?>">
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
                        <label for="field-ta" class="col-sm-3 control-label">Teacher</label>

                        <div class="col-sm-5">
                            <select name="teacher_id" class="form-control">
                                <?php
                                $teachers = get_teachers();
                                foreach ($teachers as $row2){ ?>
                                    <option value="<?php echo $row2['teacher_id']; ?>" <?php if($row2['teacher_id'] == $row['teacher_id']) echo 'selected'; ?>>
                                        <?php echo $row2['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
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