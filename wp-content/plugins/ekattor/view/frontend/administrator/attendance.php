<center>
    <h4>
        <div class="label label-info" style="font-size: 100%">
            <i class="entypo-graduation-cap"></i>
            Attendance
        </div>
    </h4>
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
                        <input type="hidden" name="task" value="manage_attendance">
                        <input type="hidden" name="redirect" value="<?php echo EKATTOR_FRONT_URL; ?>">

                        <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">

                            <tr>
                                <td>
                                    <select name="date" class="form-control">
                                        <option value="" selected="selected">Select date</option>
                                        <?php for ( $i = 1; $i <= 31; $i++ ): ?>
                                            <option value="<?php echo $i; ?>"
                                                <?php if ( isset( $_GET['date'] ) && $_GET['date'] == $i ) echo 'selected'; ?>>
                                                    <?php echo $i; ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="month" class="form-control">
                                        <option value="" selected="selected">Select month</option>
                                        <?php
                                        for ( $i = 1; $i <= 12; $i++ ):
                                            if ( $i == 1 )
                                                $m = 'january';
                                            else if ( $i == 2 )
                                                $m = 'february';
                                            else if ( $i == 3 )
                                                $m = 'march';
                                            else if ( $i == 4 )
                                                $m = 'april';
                                            else if ( $i == 5 )
                                                $m = 'may';
                                            else if ( $i == 6 )
                                                $m = 'june';
                                            else if ( $i == 7 )
                                                $m = 'july';
                                            else if ( $i == 8 )
                                                $m = 'august';
                                            else if ( $i == 9 )
                                                $m = 'september';
                                            else if ( $i == 10 )
                                                $m = 'october';
                                            else if ( $i == 11 )
                                                $m = 'november';
                                            else if ( $i == 12 )
                                                $m = 'december';
                                            ?>
                                            <option value="<?php echo $i; ?>"
                                                <?php if ( isset( $_GET['month'] ) && $_GET['month'] == $i ) echo 'selected'; ?>>
                                                    <?php echo $m; ?>
                                            </option>
                                            <?php
                                        endfor;
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="yr" class="form-control">
                                        <option value="" selected="selected">Select year</option>
                                        <?php for ( $i = 2020; $i >= 2010; $i-- ): ?>
                                            <option value="<?php echo $i; ?>"
                                                <?php if ( isset( $_GET['yr'] ) && $_GET['yr'] == $i ) echo 'selected'; ?>>
                                                    <?php echo $i; ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="class_id" class="form-control">
                                        <option value="">Select a class</option>
                                        <?php
                                        $classes = get_classes();
                                        foreach ( $classes as $row ):
                                            ?>
                                            <option value="<?php echo $row['class_id']; ?>"
                                                <?php if ( isset( $_GET['class_id'] ) && $_GET['class_id'] == $row['class_id'] ) echo 'selected'; ?>>
                                                    <?php echo $row['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" value="Manage Attendance" class="btn btn-default" />
                                </td>
                            </tr>
                        </table>
                    </form>

                    <!--ATTENDANCE MANAGEMENT FROM HERE -->
                    <?php if ( isset( $_GET['date']) && $_GET['date'] > 0 &&
                                isset( $_GET['month']) && $_GET['month'] > 0 &&
                                    isset( $_GET['yr']) && $_GET['yr'] > 0 &&
                                        isset( $_GET['class_id']) &&  $_GET['class_id'] > 0 ){ ?>
                        <?php
                        //// CREATE THE ATTEDANCE ENTRY ONLY IF NOT EXISTS ////
                        $students = get_students( $_GET['class_id'] );
                        foreach ( $students as $row ):
                            $full_date      = $_GET['yr'] . '-' . $_GET['month'] . '-' . $_GET['date'];
                            $verify_data    = array( 'date' => $full_date, 'student_id' => $row['student_id'] );
                            verify_create_attendance_entry( $verify_data );
                        endforeach;
                        ?>
                        <center>
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4">

                                    <div class="tile-stats tile-white-gray">
                                        <div class="icon"><i class="entypo-suitcase"></i></div>
                                        <?php
                                            $timestamp = strtotime( $full_date );
                                            $day = strtolower( date( 'l', $timestamp ) );
                                         ?>
                                        <h2><?php echo ucwords( $day );?></h2>

                                        <h3>Attendance of class <?php echo get_class_name_from_id( $_GET['class_id'] );?></h3>
                                        <p><?php echo $full_date;?></p>
                                    </div>
                                </div>
                            </div>
                        </center>
                    <div class="row">
                        <div class="col-sm-offset-3 col-md-6">
                        <table class="table table-bordered" >
                            <thead>
                                <tr class="gradeA">
                                    <td>Roll</td>
                                    <td>Name</td>
                                    <td>Status</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $students = get_students( $_GET['class_id'] );
                                foreach ( $students as $row ):

                                    $verify_data = array( 'date' => $full_date, 'student_id' => $row['student_id'] );

                                    $attendance = get_attendance( $verify_data );
                                    foreach ( $attendance as $row2 ):
                                        ?>
                                    <form action="<?php echo admin_url(); ?>admin-post.php" method="post"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="action" value="ekattor_form_submit">
                                        <input type="hidden" name="task" value="edit_attendance">
                                        <input type="hidden" name="redirect" value="<?php echo EKATTOR_FRONT_URL; ?>">

                                        <tr class="gradeA">
                                            <td>
                                                <?php echo $row['roll']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['name']; ?>
                                            </td>
                                            <td>
                                                <select name="status" class="form-control" style="width:100px; float:left;">
                                                    <option value="0" <?php if( $row2['status'] == 0 )echo 'selected';?>></option>
                                                    <option value="1" <?php if( $row2['status'] == 1 )echo 'selected';?>>Present</option>
                                                    <option value="2" <?php if( $row2['status'] == 2 )echo 'selected';?>>Absent</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" name="attendance_id" value="<?php echo $row2['attendance_id']; ?>" />

                                                <input type="hidden" name="date" value="<?php echo $_GET['date']; ?>" />
                                                <input type="hidden" name="month" value="<?php echo $_GET['month']; ?>" />
                                                <input type="hidden" name="yr" value="<?php echo $_GET['yr']; ?>" />
                                                <input type="hidden" name="class_id" value="<?php echo $_GET['class_id']; ?>" />

                                                <button type="submit" class="btn btn-normal btn-gray">Update</button>
                                            </td>
                                        </tr>
                                    </form>
                                    <?php
                                endforeach;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <?php } else { ?>

                        <div class="alert alert-info">Please select a complete <b>date</b> and <b>class</b> to manage student's attendance</div>
                    <?php } ?>
                    <!-- MARKS MANAGEMENT ENDS HERE -->
                </div>
            </div>
        </div>
    </div>
</div>
