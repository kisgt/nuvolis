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
                        <input type="hidden" name="task" value="show_mark">
                        <input type="hidden" name="redirect" value="<?php echo EKATTOR_FRONT_URL; ?>">
                        <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
                            <tr>
                                <td>Select Exam</td>
                                <td>Select Subject</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="exam_id" style="float:left;" class="form-control">
                                        <option value="">Select An Exam</option>
                                        <?php
                                        $exams = get_exams($student_id);
                                        foreach ($exams as $row):
                                            ?>
                                            <option value="<?php echo $row['exam_id']; ?>"
                                                    <?php if (isset($_GET['exam_id']) && $_GET['exam_id'] == $row['exam_id']) echo 'selected'; ?>>
                                                    <?php echo $row['name']; ?></option>
                                                <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <?php
                                    $classes = get_classes_of_student_of_loggedin_parent();
                                    foreach ($classes as $row):
                                        ?>

                                        <select name="subject_id" style="float:left;" class="form-control">

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
                                </td>
                                <td>
                                    <input type="hidden" name="class_id" value="<?php echo $row['class_id'] ?>">
                                    <input type="submit" value="Show Marks" class="btn btn-default" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <br><br>

                    <!--MARKS VIEW FROM HERE -->
                    <?php
                    if (isset($_GET['exam_id']) && $_GET['exam_id'] > 0 &&
                            isset($_GET['class_id']) && $_GET['class_id'] > 0 &&
                            isset($_GET['subject_id']) && $_GET['subject_id'] > 0) {
                        ?>
                        <table class="table table-bordered datatable" id="table_export" >
                            <thead>
                                <tr>
                                    <td>Student</td>
                                    <td>Mark Obtained(out of 100)</td>
                                    <td>Note</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $parent = $wpdb->prefix . 'ekattor_parent';
                                global $current_user;
                                get_currentuserinfo();
                                $current_user_name = $current_user->user_login;
                                $query_result = $wpdb->get_results("SELECT * FROM $parent WHERE username = '$current_user_name' ", ARRAY_A);

                                foreach ($query_result as $row4) {
                                    $student_id = $row4['student_id'];
                                }

                                $verify_data = array('exam_id' => $_GET['exam_id'],
                                    'class_id' => $_GET['class_id'],
                                    'subject_id' => $_GET['subject_id'],
                                    'student_id' => $student_id);


                                $marks = get_marks($verify_data);
                                foreach ($marks as $row2):
                                    ?>
                                <form method="post" action="<?php echo EKATTOR_BASE_URL; ?>&manager=marks" >
                                    <tr>
                                        <td>
                                            <?php echo get_student_name_from_id($row2['student_id']); ?>
                                        </td>
                                        <td>
                                            <?php if (isset($row2['mark_obtained'])) echo $row2['mark_obtained'];
                                            else echo '-'; ?>
                                        </td>
                                        <td>
                                    <?php if (isset($row2['comment'])) echo $row2['comment'];
                                    else echo '-'; ?>
                                        </td>
                                    </tr>
                                </form>
                                <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>

                                    <?php } else { ?>

                        <div class="alert alert-info">Please select an <b>exam</b> and <b>subject</b> to manage marks</div>
                                    <?php } ?>

                    <!--MARKS VIEW ENDS HERE-->
                </div>
            </div>
        </div>
    </div>
</div>
