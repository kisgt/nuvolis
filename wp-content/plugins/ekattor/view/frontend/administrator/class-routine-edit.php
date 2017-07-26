<?php
$edit_data = get_class_routine_info($_POST['param2']);
foreach ($edit_data as $row){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Class Routine
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                    class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action"      value="ekattor_form_submit">
                    <input type="hidden" name="task"        value="edit_class_routine">
                    <input type="hidden" name="class_routine_id"  value="<?php echo $row['class_routine_id']; ?>">
                    <input type="hidden" name="redirect"  id="redirect_url">
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Class</label>

                        <div class="col-sm-5">
                            <select name="class_id" class="form-control"  onchange="show_subjects(this.value)"  style="float:left;">
                                <option value=""><?php echo ('Select A Class');?></option>
                                <?php 
                                $classes = get_classes();
                                foreach($classes as $row2):
                                ?>
                                    <option value="<?php echo $row2['class_id'];?>" 
                                        <?php if($row2['class_id'] == $row['class_id']) echo 'selected'; ?>>
                                            Class <?php echo $row2['name'];?></option>
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
                                $classes = get_classes(); 
                                foreach($classes as $row2): ?>

                                <select name="subject_id" 
                                      id="subject_id_<?php echo $row2['class_id'];?>" 
                                          style="display:<?php if($row2['class_id'] == $row['class_id'])echo 'block';else echo 'none';?>;" class="form-control"  style="float:left;">

                                    <option value="">Subject of class <?php echo $row2['name'];?></option>

                                    <?php 
                                    $subjects =	get_subjects_by_class($row['class_id']); 
                                    foreach($subjects as $row2): ?>
                                    <option value="<?php echo $row2['subject_id'];?>"
                                        <?php if($row2['subject_id'] == $row['subject_id']) echo 'selected'; ?>>
                                                    <?php echo $row2['name'];?>
                                    </option>
                                    <?php endforeach;?>
                                </select> 
                            <?php endforeach;?>


                            <select name="temp" id="subject_id_0" 
                              style="display:<?php if(isset($row['subject_id']) && $row['subject_id'] >0)echo 'none';else echo 'block';?>;" class="form-control" style="float:left;">
                                    <option value="">Select a class first</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Day</label>
                        <div class="col-sm-5">
                            <select name="day" class="form-control" style="width:100%;">
                                <option value="sunday" <?php if($row['day'] == 'sunday') echo 'selected'; ?>>sunday</option>
                                <option value="monday" <?php if($row['day'] == 'monday') echo 'selected'; ?>>monday</option>
                                <option value="tuesday" <?php if($row['day'] == 'tuesday') echo 'selected'; ?>>tuesday</option>
                                <option value="wednesday" <?php if($row['day'] == 'wednesday') echo 'selected'; ?>>wednesday</option>
                                <option value="thursday" <?php if($row['day'] == 'thursday') echo 'selected'; ?>>thursday</option>
                                <option value="friday" <?php if($row['day'] == 'friday') echo 'selected'; ?>>friday</option>
                                <option value="saturday" <?php if($row['day'] == 'saturday') echo 'selected'; ?>>saturday</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Starting Hour</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="number" name="hour_start" value="<?php echo $row['hour_start']; ?>" class="form-control" data-template="dropdown" data-show-seconds="false" data-show-meridian="false"  placeholder="hour here">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Starting Minute</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="number" name="minute_start" value="<?php echo $row['minute_start']; ?>"  class="form-control" data-template="dropdown" data-show-seconds="false"  data-show-meridian="false"   placeholder="minute here">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Ending Hour</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="number" name="hour_end" value="<?php echo $row['hour_end']; ?>"  class="form-control " data-template="dropdown" data-show-seconds="false" data-show-meridian="false"   placeholder="time here">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Ending Minute</label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="minute_end" value="<?php echo $row['minute_end']; ?>"  class="form-control " data-template="dropdown" data-show-seconds="false"  data-show-meridian="false"  placeholder="time here">
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