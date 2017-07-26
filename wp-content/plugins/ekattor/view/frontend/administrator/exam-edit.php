<?php
$edit_data = get_exam_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Exam
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_exam">
                    <input type="hidden" name="exam_id"     value="<?php echo $row['exam_id']; ?>">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Exam Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                   data-message-required="value required" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="date" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                       placeholder="date here" value="<?php if ($row['date'] != '')echo date("D, d M Y", $row['date']);?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Comment</label>

                        <div class="col-sm-5">
                            <textarea name="comment" class="form-control" id="field-ta"><?php echo $row['comment']; ?></textarea>
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