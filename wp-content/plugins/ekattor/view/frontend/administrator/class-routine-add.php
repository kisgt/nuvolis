<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Add Class Routine
                </div>
            </div>
            
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="add_class_routine">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Class</label>

                        <div class="col-sm-5">
                            <select name="class_id" class="form-control"  onchange="show_subjects(this.value)"  style="float:left;">
                                <option value=""><?php echo ('Select A Class');?></option>
                                <?php 
                                $classes = get_classes();
                                foreach($classes as $row):
                                ?>
                                    <option value="<?php echo $row['class_id'];?>">
                                            Class <?php echo $row['name'];?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Subject</label>

                        <div class="col-sm-5">
                            <?php 
                                $classes	=	get_classes(); 
                                foreach($classes as $row): ?>

                                <select name="subject_id" 
                                      id="subject_id_<?php echo $row['class_id'];?>" 
                                          style="display:<?php  echo 'none';?>;" class="form-control"  style="float:left;">

                                    <option value="">Subject of class <?php echo $row['name'];?></option>

                                    <?php 
                                    $subjects	=	get_subjects_by_class($row['class_id']); 
                                    foreach($subjects as $row2): ?>
                                    <option value="<?php echo $row2['subject_id'];?>">
                                                    <?php echo $row2['name'];?>
                                    </option>
                                    <?php endforeach;?>


                                </select> 
                            <?php endforeach;?>


                            <select name="temp" id="subject_id_0" 
                              style="display:<?php if(isset($_POST['class_id']) && $_POST['class_id'] >0)echo 'none';else echo 'block';?>;" class="form-control" style="float:left;">
                                    <option value="">Select a class first</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Day</label>
                        <div class="col-sm-5">
                            <select name="day" class="form-control" style="width:100%;">
                                <option value="sunday">sunday</option>
                                <option value="monday">monday</option>
                                <option value="tuesday">tuesday</option>
                                <option value="wednesday">wednesday</option>
                                <option value="thursday">thursday</option>
                                <option value="friday">friday</option>
                                <option value="saturday">saturday</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Starting Hour</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="number" name="hour_start" class="form-control" data-template="dropdown" data-show-seconds="false" data-show-meridian="false"  placeholder="hour here">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Starting Minute</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="number" name="minute_start" class="form-control" data-template="dropdown" data-show-seconds="false"  data-show-meridian="false"   placeholder="minute here">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Ending Hour</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="number" name="hour_end" class="form-control " data-template="dropdown" data-show-seconds="false" data-show-meridian="false"   placeholder="time here">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Ending Minute</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="minute_end" class="form-control " data-template="dropdown" data-show-seconds="false"  data-show-meridian="false"  placeholder="time here">
                            </div>
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

<script type="text/javascript">
  function show_subjects(class_id)
  {
    for(i=0;i<=100;i++)
    {
        try
        {
            document.getElementById('subject_id_'+i).style.display = 'none' ;
            document.getElementById('subject_id_'+i).setAttribute("name" , "temp");
        }
        catch(err){}
    }

    if ( class_id == "")
    {
        document.getElementById('subject_id_0').style.display = 'block' ;
    }
    else if ( class_id != "")
    {
        document.getElementById('subject_id_'+class_id).style.display = 'block' ;
        document.getElementById('subject_id_'+class_id).setAttribute("name" , "subject_id");        
    }
  }
</script> 