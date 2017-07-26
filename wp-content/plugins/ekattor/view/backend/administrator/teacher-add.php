<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Add Teacher
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="add_teacher">
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                data-message-required="value required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-5">
                            <input type="email" name="email" class="form-control" id="field-1" >
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
                        <label for="field-ta" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-5">
                            <textarea name="address" class="form-control html5editor" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Phone</label>

                        <div class="col-sm-5">
                            <input type="text" name="phone" class="form-control" id="field-1" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Birth Date</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="birthday" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                       placeholder="date here">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Sex</label>

                        <div class="col-sm-5">
                            <select name="sex" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Photo</label>

                        <div class="col-sm-5">
                            <input type="file" name="image" class="form-control" >
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