<?php

    // Show mark.
    if ( $task == 'show_mark' ) {
        if ( $_POST['exam_id'] > 0 && $_POST['class_id'] > 0 && $_POST['subject_id'] > 0 )
            wp_redirect($redirect . '&manager=marks&exam_id=' . $_POST['exam_id'] . '&class_id=' . $_POST['class_id'] . '&subject_id=' . $_POST['subject_id'] );
        else
            wp_redirect($redirect . '&manager=marks' );
    }

    // Manage attendance.
    if ( $task == 'manage_attendance' ) {
        if ( $_POST['date'] > 0 && $_POST['month'] > 0 && $_POST['yr'] > 0 && $_POST['class_id'] > 0 ){

            wp_redirect( $redirect . 'manager=attendance&date=' . $_POST['date'] . '&month=' . $_POST['month'] . '&yr=' . $_POST['yr'] . '&class_id=' . $_POST['class_id'] );
        }
        else
            wp_redirect( $redirect . 'manager=attendance' );
    }
