<center>
    <h3> <div class="label label-info">
            <i class="entypo-graduation-cap"></i>
            Marks
        </div>
    </h3>
</center>
<br>
    
<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
                <div>
                    <form action="<?php echo admin_url(); ?>admin-post.php" method="post" 
                        enctype="multipart/form-data">
                        
                        <input type="hidden" name="action" value="ekattor_form_submit">
                        <input type="hidden" name="task" value="manage_mark">
                        <input type="hidden" name="redirect" value="<?php echo EKATTOR_FRONT_URL;?>">
                        <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
                            <tr>
                                <td>Select Exam</td>
                                <td>Select Class</td>
                                <td>Select Subject</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="exam_id" class="form-control"  style="float:left;">
                                        <option value="">Select An Exam</option>
                                        <?php
                                        $exams = get_exams();
                                        foreach ($exams as $row):
                                            ?>
                                            <option value="<?php echo $row['exam_id']; ?>"
                                                <?php if ( isset( $_GET['exam_id']) && $_GET['exam_id'] == $row['exam_id']) echo 'selected'; ?>>
                                                    <?php echo $row['name']; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="class_id" class="form-control"  onchange="show_subjects(this.value)"  style="float:left;">
                                        <option value="">Select A Class</option>
                                        <?php
                                        $classes = get_classes();
                                        foreach ($classes as $row):
                                            ?>
                                            <option value="<?php echo $row['class_id']; ?>"
                                                <?php if ( isset( $_GET['class_id']) && $_GET['class_id'] == $row['class_id']) echo 'selected'; ?>>
                                                    Class <?php echo $row['name']; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <!-- SELECT SUBJECT ACCORDING TO SELECTED CLASS -->
                                    <?php
                                    $classes = get_classes();
                                    foreach ($classes as $row):
                                        ?>

                                        <select name="<?php
                                        if ($_GET['class_id'] == $row['class_id'])
                                            echo 'subject_id';
                                        else
                                            echo 'temp';
                                        ?>" 
                                                id="subject_id_<?php echo $row['class_id']; ?>" 
                                                style="display:<?php
                                                if (isset ($_GET['class_id']) && $_GET['class_id'] == $row['class_id'])
                                                    echo 'block';
                                                else
                                                    echo 'none';
                                                ?>;" class="form-control"  style="float:left;">

                                            <option value="">Subject of class <?php echo $row['name']; ?></option>

                                            <?php
                                            $subjects = get_subjects_by_class($row['class_id']);
                                            foreach ($subjects as $row2):
                                                ?>
                                                <option value="<?php echo $row2['subject_id']; ?>"
                                                <?php
                                                if (isset($_GET['subject_id']) && $_GET['subject_id'] == $row2['subject_id'])
                                                    echo 'selected="selected"';
                                                ?>>
                                                            <?php echo $row2['name']; ?>
                                                </option>
                                            <?php endforeach; ?>


                                        </select> 
                                    <?php endforeach; ?>


                                    <select name="temp" id="subject_id_0" 
                                            style="display:<?php
                                            if (isset($_GET['subject_id']) && $_GET['subject_id'] > 0)
                                                echo 'none';
                                            else
                                                echo 'block';
                                            ?>;" class="form-control" style="float:left;">
                                        <option value="">Select A Class First</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" name="action"  value="ekattor_form_submit">
                                    <input type="hidden" name="task"    value="manage_mark">
                                    <input type="submit" value="Manage Marks" class="btn btn-default" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <br><br>

                    <!-- MARKS MANAGEMENT FROM HERE  -->
                    <?php if ( isset ($_GET['exam_id']) && $_GET['exam_id'] > 0 && 
                                isset ($_GET['class_id']) && $_GET['class_id'] > 0 && 
                                    isset ($_GET['subject_id']) && $_GET['subject_id'] > 0) { ?>
                        <?php
                        //CREATE THE MARK ENTRY ONLY IF NOT EXISTS
                        $students = get_students($_GET['class_id']);
                        foreach ($students as $row):
                            $verify_data = array('exam_id' => $_GET['exam_id'],
                                'class_id' => $_GET['class_id'],
                                'subject_id' => $_GET['subject_id'],
                                'student_id' => $row['student_id']);

                            verify_create_mark_entry($verify_data);

                        endforeach;
                        ?>
                        <table class="table table-bordered box" >
                            <thead>
                                <tr>
                                    <td>Student</td>
                                    <td>Mark Obtained(out of 100)</td>
                                    <td>Note</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $students = get_students($_GET['class_id']);
                                foreach ($students as $row):

                                    $verify_data = array('exam_id' => $_GET['exam_id'],
                                        'class_id' => $_GET['class_id'],
                                        'subject_id' => $_GET['subject_id'],
                                        'student_id' => $row['student_id']);


                                    $marks = get_marks($verify_data);
                                    foreach ($marks as $row2):
                                        ?>
                                    <form action="<?php echo admin_url(); ?>admin-post.php" method="post"  
                                        enctype="multipart/form-data">
                                        
                                        <input type="hidden" name="action" value="ekattor_form_submit">
                                        <input type="hidden" name="task" value="edit_mark">
                                        <input type="hidden" name="redirect" value="<?php echo EKATTOR_FRONT_URL;?>">
                                        <tr>
                                            <td>
                                                <?php echo $row['name']; ?>
                                            </td>
                                             <td>
                                                <input type="number" value="<?php if(isset($row2['mark_obtained'])) echo $row2['mark_obtained']; ?>" name="mark_obtained_<?php echo $row['student_id'] ?>"  />
                                            </td>
                                            <td>
                                                <textarea name="comment_<?php echo $row['student_id'] ?>"><?php echo $row2['comment']; ?></textarea>
                                            </td>
                                            <td>
                                                <input type="hidden" name="mark_id_<?php echo $row['student_id'] ?>" value="<?php echo $row2['mark_id']; ?>" />

                                                <input type="hidden" name="exam_id" value="<?php echo $_GET['exam_id']; ?>" />
                                                <input type="hidden" name="class_id" value="<?php echo $_GET['class_id']; ?>" />
                                                <input type="hidden" name="subject_id" value="<?php echo $_GET['subject_id']; ?>" />

                                              
                                            </td>
                                        </tr>
                                    
                                    <?php
                                endforeach;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                      <button type="submit" class="btn btn-normal btn-gray">Update</button>
                      </form>
                    <?php } else { ?>
                    
                        <div class="alert alert-info">Please select an <b>exam</b>, <b>class</b> and <b>subject</b> to manage student's marks</div>
                    <?php } ?>
                    <!--MARKS MANAGEMENT ENDS HERE-->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function show_subjects(class_id)
    {
        for (i = 0; i <= 100; i++)
        {

            try
            {
                document.getElementById('subject_id_' + i).style.display = 'none';
                document.getElementById('subject_id_' + i).setAttribute("name", "temp");
            }
            catch (err) {
            }
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