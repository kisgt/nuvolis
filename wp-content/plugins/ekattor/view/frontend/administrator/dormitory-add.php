<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Add Dormitory
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="add_dormitory">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Dormitory Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                       data-message-required="value required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Number Of Room</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="number_of_room" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-5">
                            <textarea name="description" class="form-control" id="field-ta"></textarea>
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