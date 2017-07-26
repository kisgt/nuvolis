<?php
$edit_data = get_transport_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Transport
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"          value="ekattor_form_submit">
                    <input type="hidden" name="task"            value="edit_transport">
                    <input type="hidden" name="transport_id"    value="<?php echo $row['transport_id']; ?>">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Route Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="route_name" data-validate="required" 
                                       data-message-required="value required" value="<?php echo $row['route_name']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Number Of Vehicle</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="number_of_vehicle" value="<?php echo $row['number_of_vehicle']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-5">
                            <textarea name="description" class="form-control" 
                                id="field-ta"><?php echo $row['description']; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Route Fare</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="route_fare" value="<?php echo $row['route_fare']; ?>">
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