<?php 
    // create custom user role for student, teacher, parent.
    add_role( 'student', 'student', array( 'read' => true, 'level_0' => true ) ); 
    add_role( 'teacher', 'teacher', array( 'read' => true, 'level_0' => true ) ); 
    add_role( 'parent',  'parent',  array( 'read' => true, 'level_0' => true ) );
    
    // Create file upload directories.
    $upload_dir = wp_upload_dir();
    $path[0]    = $upload_dir['basedir'] . '/ekattor/';
    $path[1]    = $upload_dir['basedir'] . '/ekattor/document/';
    $path[2]    = $upload_dir['basedir'] . '/ekattor/teacher_image/';
    $path[3]    = $upload_dir['basedir'] . '/ekattor/student_image/';
    
    // giving the directory write permission.
    foreach ($path as $dir) {
        if ( !is_dir($dir) ) {
            wp_mkdir_p($dir, 0777);
        }
    }
	
    // defining the database table name
    global $wpdb;
    $ekattor_attendance      = $wpdb->prefix . 'ekattor_attendance';
    $ekattor_book            = $wpdb->prefix . 'ekattor_book';
    $ekattor_class           = $wpdb->prefix . 'ekattor_class';
    $ekattor_class_routine   = $wpdb->prefix . 'ekattor_class_routine';
    $ekattor_document        = $wpdb->prefix . 'ekattor_document';
    $ekattor_dormitory       = $wpdb->prefix . 'ekattor_dormitory';
    $ekattor_exam            = $wpdb->prefix . 'ekattor_exam';
    $ekattor_grade           = $wpdb->prefix . 'ekattor_grade';
    $ekattor_invoice         = $wpdb->prefix . 'ekattor_invoice';
    $ekattor_mark            = $wpdb->prefix . 'ekattor_mark';
    $ekattor_noticeboard     = $wpdb->prefix . 'ekattor_noticeboard';
    $ekattor_parent          = $wpdb->prefix . 'ekattor_parent';
    $ekattor_settings        = $wpdb->prefix . 'ekattor_settings';
    $ekattor_student         = $wpdb->prefix . 'ekattor_student';
    $ekattor_subject         = $wpdb->prefix . 'ekattor_subject';
    $ekattor_teacher         = $wpdb->prefix . 'ekattor_teacher';
    $ekattor_transport       = $wpdb->prefix . 'ekattor_transport';
    
    
    // sql queries for database table creation during plugin activation.

    $sql1   =   "CREATE TABLE IF NOT EXISTS $ekattor_attendance (
                    `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
                    `student_id` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `status` int(11) NOT NULL,
                    `date` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`attendance_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql2   =   "CREATE TABLE IF NOT EXISTS $ekattor_book (
                    `book_id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `description` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `author` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `status` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `price` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`book_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql3   =   "CREATE TABLE IF NOT EXISTS $ekattor_class (
                    `class_id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `name_numeric` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `teacher_id` int(11) NOT NULL,
                    PRIMARY KEY (`class_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql4   =   "CREATE TABLE IF NOT EXISTS $ekattor_class_routine (
                    `class_routine_id` int(11) NOT NULL AUTO_INCREMENT,
                    `class_id` int(11) NOT NULL,
                    `subject_id` int(11) NOT NULL,
                    `hour_start` int(11) COLLATE utf8_unicode_ci NOT NULL,
                    `hour_end` int(11) COLLATE utf8_unicode_ci NOT NULL,
                    `minute_start` int(11) COLLATE utf8_unicode_ci NOT NULL,
                    `minute_end` int(11) COLLATE utf8_unicode_ci NOT NULL,
                    `day` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`class_routine_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql5   =   "CREATE TABLE IF NOT EXISTS $ekattor_document (
                    `document_id` int(11) NOT NULL AUTO_INCREMENT,
                    `title` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `description` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `file_type` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `class_id` int(11) NOT NULL,
                    `teacher_id` int(11) NOT NULL,
                    `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`document_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql6   =   "CREATE TABLE IF NOT EXISTS $ekattor_dormitory (
                    `dormitory_id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `number_of_room` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `description` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`dormitory_id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql7   =   "CREATE TABLE IF NOT EXISTS $ekattor_exam (
                    `exam_id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `date` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`exam_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql8   =   "CREATE TABLE IF NOT EXISTS $ekattor_grade (
                    `grade_id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `grade_point` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `mark_from` int(11) NOT NULL,
                    `mark_upto` int(11) NOT NULL,
                    `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`grade_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql9   =   "CREATE TABLE IF NOT EXISTS $ekattor_invoice (
                    `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
                    `student_id` int(11) NOT NULL,
                    `title` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `description` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `amount` int(11) NOT NULL,
                    `creation_timestamp` int(11) NOT NULL,
                    `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid',
                    PRIMARY KEY (`invoice_id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql10  =   "CREATE TABLE IF NOT EXISTS $ekattor_mark (
                    `mark_id` int(11) NOT NULL AUTO_INCREMENT,
                    `student_id` int(11) NOT NULL,
                    `subject_id` int(11) NOT NULL,
                    `class_id` int(11) NOT NULL,
                    `exam_id` int(11) NOT NULL,
                    `mark_obtained` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `mark_total` int(11) NOT NULL DEFAULT '100',
                    `attendance` int(11) NOT NULL DEFAULT '0',
                    `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`mark_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql11  =   "CREATE TABLE IF NOT EXISTS $ekattor_noticeboard (
                    `notice_id` int(11) NOT NULL AUTO_INCREMENT,
                    `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `create_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `end_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`notice_id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql12  =   "CREATE TABLE IF NOT EXISTS $ekattor_parent (
                    `parent_id` int(11) NOT NULL AUTO_INCREMENT,
                    `ID` bigint(20) NOT NULL COMMENT 'wordpress user ID',
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `email` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `username` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'wp login username',
                    `password` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `student_id` int(11) NOT NULL,
                    `relation_with_student` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `address` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `profession` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`parent_id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql13  =   "CREATE TABLE IF NOT EXISTS $ekattor_settings (
                    `settings_id` int(11) NOT NULL AUTO_INCREMENT,
                    `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                    `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`settings_id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
    
    $sql14  =   "CREATE TABLE IF NOT EXISTS $ekattor_student (
                    `student_id` int(11) NOT NULL AUTO_INCREMENT,
                    `ID` bigint(20) NOT NULL COMMENT 'wordpress user ID',
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `address` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `email` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `username` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `password` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `transport_id` int(11) NOT NULL,
                    `dormitory_id` int(11) NOT NULL,
                    `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`student_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql15  =   "CREATE TABLE IF NOT EXISTS $ekattor_subject (
                    `subject_id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `class_id` int(11) NOT NULL,
                    `teacher_id` int(11) DEFAULT NULL,
                    PRIMARY KEY (`subject_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql16  =   "CREATE TABLE IF NOT EXISTS $ekattor_teacher (
                    `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
                    `ID` bigint(20) NOT NULL COMMENT 'wordpress user ID',
                    `name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `address` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `email` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `username` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'wp login username',
                    `password` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`teacher_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    
    $sql17  =   "CREATE TABLE IF NOT EXISTS $ekattor_transport (
                    `transport_id` int(11) NOT NULL AUTO_INCREMENT,
                    `route_name` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `number_of_vehicle` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `description` longtext COLLATE utf8_unicode_ci NOT NULL,
                    `route_fare` longtext COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`transport_id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    // running the database table creation queries.
    dbDelta($sql1);
    dbDelta($sql2);
    dbDelta($sql3);
    dbDelta($sql4);
    dbDelta($sql5);
    dbDelta($sql6);
    dbDelta($sql7);
    dbDelta($sql8);
    dbDelta($sql9);
    dbDelta($sql10);
    dbDelta($sql11);
    dbDelta($sql12);
    dbDelta($sql13);
    dbDelta($sql14);
    dbDelta($sql15);
    dbDelta($sql16);
    dbDelta($sql17);


    // adding initial data for settings table.
    $wpdb->get_results( "SELECT * FROM $ekattor_settings" );
    if ( $wpdb->num_rows == 0 ) {
        $wpdb->insert( $ekattor_settings, array( 'type' => 'system_name'      ,'description' => 'Ekattor School Management System') );
        $wpdb->insert( $ekattor_settings, array( 'type' => 'system_title'     ,'description' => 'Ekattor School Manager') );
        $wpdb->insert( $ekattor_settings, array( 'type' => 'address'          ,'description' => 'Sydney, Australia') );
        $wpdb->insert( $ekattor_settings, array( 'type' => 'phone'            ,'description' => '+8012654159') );
        $wpdb->insert( $ekattor_settings, array( 'type' => 'paypal_email'     ,'description' => 'payment@school.com') );
        $wpdb->insert( $ekattor_settings, array( 'type' => 'currency'         ,'description' => 'usd') );
        $wpdb->insert( $ekattor_settings, array( 'type' => 'system_email'     ,'description' => 'school@example.com') );
    }

            
?>