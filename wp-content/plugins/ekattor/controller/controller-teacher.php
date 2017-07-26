<?php


   

    // Create a new student.
     if ( $task == 'add_student') {
        if ( create_student() == 'success' )
            wp_redirect( $redirect . 'manager=student&class_id=' . $_POST['class_id'] . '&notify=success' );
        else
            wp_redirect( $redirect . 'manager=student&class_id=' . $_POST['class_id'] . '&notify=fail' );
    }
    // Edit student.
    else if ( $task == 'edit_student') {
        edit_student( $_POST['student_id']);
            wp_redirect( $redirect . 'manager=student&class_id=' . $_POST['class_id'] . '&notify=update' );
    }
    // Delete a student.
    else if ( $task == 'delete_student') {
        delete_student( $_POST['delete_id']);
        wp_redirect( $redirect . '&manager=student&class_id=' . $_POST['param1'] . '&notify=delete' );
    }
   
    // Manage mark.
    if ( $task == 'manage_mark' ) {
        if ( $_POST['exam_id'] > 0 && $_POST['class_id'] > 0 && $_POST['subject_id'] > 0 )
            wp_redirect( $redirect . '&manager=marks&exam_id=' . $_POST['exam_id'] . '&class_id=' . $_POST['class_id'] . '&subject_id=' . $_POST['subject_id'] );
        else
            wp_redirect( $redirect . '&manager=marks' );
    } 
    // Edit mark.
    else if ( $task == 'edit_mark') {
        //demo($_POST['class_id']);
        update_marks($_POST['class_id']);
        wp_redirect( $redirect . '&manager=marks&exam_id=' . $_POST['exam_id'] . '&class_id=' . $_POST['class_id'] . '&subject_id=' . $_POST['subject_id'] . '&notify=update' );
    }
    // Show mark.
    if ( $task == 'show_mark' ) {
        if ( $_POST['exam_id'] > 0 && $_POST['class_id'] > 0 && $_POST['subject_id'] > 0 )
            wp_redirect( $redirect . '&manager=marks&exam_id=' . $_POST['exam_id'] . '&class_id=' . $_POST['class_id'] . '&subject_id=' . $_POST['subject_id'] );
        else
            wp_redirect( $redirect . '&manager=marks' );
    }
    
    // Manage attendance.
    if ( $task == 'manage_attendance' ) {
        if ( $_POST['date'] > 0 && $_POST['month'] > 0 && $_POST['yr'] > 0 && $_POST['class_id'] > 0 )
            wp_redirect( $redirect . '&manager=attendance&date=' . $_POST['date'] . '&month=' . $_POST['month'] . '&yr=' . $_POST['yr'] . '&class_id=' . $_POST['class_id'] );
        else
            wp_redirect( $redirect . '&manager=attendance' );
    } 
    // Edit attendance.
    else if ( $task == 'edit_attendance') {
        update_attendance();
        wp_redirect( $redirect . '&manager=attendance&date=' . $_POST['date'] . '&month=' . $_POST['month'] . '&yr=' . $_POST['yr'] . '&class_id=' . $_POST['class_id'] . '&notify=update' );
    }
    
    // Create a new document.
    if ( $task == 'add_document' ) {
        create_document();
        wp_redirect( $redirect . '&manager=document&notify=success' );
    } 
    // Edit document.
    else if ( $task == 'edit_document') {
        edit_document( $_POST['document_id']);
        wp_redirect( $redirect . '&manager=document&notify=update' );
    } 
    // Delete a document.
    else if ( $task == 'delete_document') {
        delete_document( $_POST['delete_id']);
        wp_redirect( $redirect . '&manager=document&notify=delete' );
    }