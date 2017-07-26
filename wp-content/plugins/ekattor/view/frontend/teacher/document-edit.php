<?php
$edit_data = get_document_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Study Material
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_document">
                    <input type="hidden" name="document_id" value="<?php echo $row['document_id']; ?>">
                    <input type="hidden" name="redirect"    value="" id="redirect_url">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                       placeholder="date here" 
                                       value="<?php if ($row['timestamp'] != '') echo date("d M, Y", $row['timestamp']); ?>"
                                       onclick="create_datepicker()">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-5">
                            <input type="text" name="title" class="form-control" id="field-1" value="<?php echo $row['title']; ?>">
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
                        <label for="field-ta" class="col-sm-3 control-label">Class</label>

                        <div class="col-sm-5">
                            <select name="class_id" class="form-control" style="float:left;">
                                <option value=""><?php echo ('Select A Class');?></option>
                                <?php 
                                $classes = get_classes();
                                foreach($classes as $row2):
                                ?>
                                    <option value="<?php echo $row2['class_id'];?>" <?php if($row2['class_id'] == $row['class_id']) echo 'selected'; ?>>
                                        Class <?php echo $row2['name'];?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
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
<script>
            
                
            
            function create_datepicker() {
                $( ".datepicker" ).css("z-index" , "10000");
            }
            
 </script>