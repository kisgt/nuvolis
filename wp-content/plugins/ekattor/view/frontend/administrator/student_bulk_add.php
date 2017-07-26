<?php $upload_dir = wp_upload_dir(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Student Bulk Add Form
                </div>
            </div>
            <div class="panel-body">

                <form action="<?php echo admin_url(); ?>admin.php?page=ekattor&manager=student&do=bulk_add" method="post" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Select Excel File</label>

                        <div class="col-sm-5">
                            <input type="file" name="userfile" class="form-control" />
                            <br>
                            <a href="<?php echo $upload_dir['baseurl'] . '/ekattor/blank_excel_file.xlsx'; ?>" target="_blank" 
                               class="btn btn-info btn-sm"><i class="entypo-download"></i> Download blank excel file</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Class</label>

                        <div class="col-sm-5">
                            <select name="class_id" class="form-control">
                                <?php
                                $classes = get_classes();
                                foreach ($classes as $row){ ?>
                                    <option value="<?php echo $row['class_id']; ?>">
                                        Class <?php echo $row['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Upload And Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>