<?php
$edit_data = get_noticeboard_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Noticeboard
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_notice">
                    <input type="hidden" name="notice_id"   value="<?php echo $row['notice_id']; ?>">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="notice_title" data-validate="required" 
                                       data-message-required="value required" value="<?php echo $row['notice_title']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Notice</label>

                        <div class="col-sm-5">
                            <textarea name="notice" class="form-control" id="field-ta"><?php echo $row['notice']; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Starting Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="create_timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                       placeholder="date here" value="<?php if ($row['create_timestamp'] != '') echo date("D, d M Y", $row['create_timestamp']);?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Ending Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="end_timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                       placeholder="date here" value="<?php if ($row['end_timestamp'] != '') echo date("D, d M Y", $row['end_timestamp']);?>">
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