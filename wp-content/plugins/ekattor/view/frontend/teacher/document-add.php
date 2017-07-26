<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Add Study Material
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="add_document">
                     <input type="hidden" name="redirect"  id="redirect_url">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                       placeholder="date here" onclick="create_datepicker()">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-5">
                            <input type="text" name="title" class="form-control" id="field-1" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-5">
                            <textarea name="description" class="form-control" id="field-ta"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Class</label>

                        <div class="col-sm-5">
                            <select name="class_id" class="form-control" style="float:left;">
                                <option value=""><?php echo ('Select A Class');?></option>
                                <?php 
                                $classes = get_classes();
                                foreach($classes as $row):
                                ?>
                                    <option value="<?php echo $row['class_id'];?>">
                                        Class <?php echo $row['name'];?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">File</label>

                        <div class="col-sm-8">
                            <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" 
                                   data-label="<i class='glyphicon glyphicon-file'></i> Browse" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">File Type</label>

                        <div class="col-sm-5">
                            <select name="file_type" class="form-control">
                                <option value="">Select File Type</option>
                                <option value="image">Image</option>
                                <option value="doc">Doc</option>
                                <option value="pdf">Pdf</option>
                                <option value="excel">Excel</option>
                                <option value="other">Other</option>
                            </select>
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
<script>
            
                
            
            function create_datepicker() {
                $( ".datepicker" ).css("z-index" , "10000");
            }
            
 </script>