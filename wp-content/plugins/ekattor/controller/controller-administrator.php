<?php


    // Create a new class.
    if ( $task == 'add_class' ) {
        create_class();
        wp_redirect( $redirect . 'manager=class&notify=success' );
    } 
    // Edit class.
    else if ( $task == 'edit_class') {
        edit_class( $_POST['class_id']);
        wp_redirect( $redirect . 'manager=class&notify=update' );
    } 
    // Delete a class.
    else if ( $task == 'delete_class') {
        delete_class( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=class&notify=delete' );
    }

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
        wp_redirect( $redirect . 'manager=student&class_id=' . $_POST['param1'] . '&notify=delete' );
    }
    
    // Create a new teacher.
    if ( $task == 'add_teacher' ) {
        if ( create_teacher() == 'success' )
            wp_redirect( $redirect . 'manager=teacher&notify=success' );
        else
            wp_redirect( $redirect . 'manager=teacher&notify=fail' );
    } 
    // Edit teacher.
    else if ( $task == 'edit_teacher') {
        edit_teacher( $_POST['teacher_id']);
        wp_redirect( $redirect . 'manager=teacher&notify=update' );
    } 
    // Delete a teacher.
    else if ( $task == 'delete_teacher') {
        delete_teacher( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=teacher&notify=delete' );
    }
    
    // Create a new parent.
    else if ( $task == 'add_parent') {
        if ( create_parent() == 'success' )
            wp_redirect( $redirect . 'manager=parent&class_id=' . $_POST['class_id'] . '&notify=success' );
        else
            wp_redirect( $redirect . 'manager=parent&class_id=' . $_POST['class_id'] . '&notify=fail' );
    }
    // Edit parent.
    else if ( $task == 'edit_parent') {
        edit_parent( $_POST['parent_id']);
        wp_redirect( $redirect . 'manager=parent&class_id=' . $_POST['class_id'] . '&notify=update' );
    }
    // Delete a parent.
    else if ( $task == 'delete_parent') {
        delete_parent( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=parent&class_id=' . $_POST['param1'] . '&notify=delete' );
    }
    
    // Create a new class_routine.
    else if ( $task == 'add_class_routine') {
        create_class_routine();
        wp_redirect( $redirect . 'manager=class-routine&notify=success' );
    }
    // Edit class_routine.
    else if ( $task == 'edit_class_routine') {
        edit_class_routine( $_POST['class_routine_id']);
        wp_redirect( $redirect . 'manager=class-routine&notify=update' );
    }
    // Delete a class_routine.
    else if ( $task == 'delete_class_routine') {
        delete_class_routine( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=class-routine&notify=delete' );
    }
    
    // Create a new subject.
    if ( $task == 'add_subject' ) {
        create_subject();
        wp_redirect( $redirect . 'manager=subject&class_id=' . $_POST['class_id'] . '&notify=success' );
    } 
    // Edit subject.
    else if ( $task == 'edit_subject') {
        edit_subject( $_POST['subject_id']);
        wp_redirect( $redirect . 'manager=subject&class_id=' . $_POST['class_id'] . '&notify=update' );
    } 
    // Delete a subject.
    else if ( $task == 'delete_subject') {
        delete_subject( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=subject&class_id=' . $_POST['param1'] . '&notify=delete' );
    }
    
    // Create a new exam.
    if ( $task == 'add_exam' ) {
        create_exam();
        wp_redirect( $redirect . 'manager=exam&notify=success' );
    } 
    // Edit exam.
    else if ( $task == 'edit_exam') {
        edit_exam( $_POST['exam_id']);
        wp_redirect( $redirect . 'manager=exam&notify=update' );
    } 
    // Delete a exam.
    else if ( $task == 'delete_exam') {
        delete_exam( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=exam&notify=delete' );
    }
    
    // Create a new grade.
    if ( $task == 'add_grade' ) {
        create_grade();
        wp_redirect( $redirect . 'manager=grade&notify=success' );
    } 
    // Edit grade.
    else if ( $task == 'edit_grade') {
        edit_grade( $_POST['grade_id']);
        wp_redirect( $redirect . 'manager=grade&notify=update' );
    } 
    // Delete a grade.
    else if ( $task == 'delete_grade') {
        delete_grade( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=grade&notify=delete' );
    }
    
    // Manage mark.
    if ( $task == 'manage_mark' ) {
        if ( $_POST['exam_id'] > 0 && $_POST['class_id'] > 0 && $_POST['subject_id'] > 0 )
            wp_redirect( $redirect . 'manager=marks&exam_id=' . $_POST['exam_id'] . '&class_id=' . $_POST['class_id'] . '&subject_id=' . $_POST['subject_id'] );
        else
            wp_redirect( $redirect . 'manager=marks' );
    } 
    // Edit mark.
    else if ( $task == 'edit_mark') {
        update_marks($_POST['class_id']);
        wp_redirect( $redirect . 'manager=marks&exam_id=' . $_POST['exam_id'] . '&class_id=' . $_POST['class_id'] . '&subject_id=' . $_POST['subject_id'] . '&notify=update' );
    }
    // Show mark.
    if ( $task == 'show_mark' ) {
        if ( $_POST['exam_id'] > 0 && $_POST['class_id'] > 0 && $_POST['subject_id'] > 0 )
            wp_redirect( $redirect . 'manager=marks&exam_id=' . $_POST['exam_id'] . '&class_id=' . $_POST['class_id'] . '&subject_id=' . $_POST['subject_id'] );
        else
            wp_redirect( $redirect . 'manager=marks' );
    }
    
    // Manage attendance.
    if ( $task == 'manage_attendance' ) {
        if ( $_POST['date'] > 0 && $_POST['month'] > 0 && $_POST['yr'] > 0 && $_POST['class_id'] > 0 )
            wp_redirect( $redirect . 'manager=attendance&date=' . $_POST['date'] . '&month=' . $_POST['month'] . '&yr=' . $_POST['yr'] . '&class_id=' . $_POST['class_id'] );
        else
            wp_redirect( $redirect . 'manager=attendance' );
    } 
    // Edit attendance.
    else if ( $task == 'edit_attendance') {
        update_attendance();
        wp_redirect( $redirect . 'manager=attendance&date=' . $_POST['date'] . '&month=' . $_POST['month'] . '&yr=' . $_POST['yr'] . '&class_id=' . $_POST['class_id'] . '&notify=update' );
    }
    
    // Create a new invoice.
    if ( $task == 'add_invoice' ) {
        create_invoice();
        wp_redirect( $redirect . 'manager=invoice&notify=success' );
    } 
    // Edit invoice.
    else if ( $task == 'edit_invoice') {
        edit_invoice( $_POST['invoice_id']);
        wp_redirect( $redirect . 'manager=invoice&notify=update' );
    } 
    // Delete a invoice.
    else if ( $task == 'delete_invoice') {
        delete_invoice( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=invoice&notify=delete' );
    }
    
    // Create a new book.
    if ( $task == 'add_book' ) {
        create_book();
        wp_redirect( $redirect . 'manager=book&notify=success' );
    } 
    // Edit book.
    else if ( $task == 'edit_book') {
        edit_book( $_POST['book_id']);
        wp_redirect( $redirect . 'manager=book&notify=update' );
    } 
    // Delete a book.
    else if ( $task == 'delete_book') {
        delete_book( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=book&notify=delete' );
    }
    
    // Create a new transport.
    if ( $task == 'add_transport' ) {
        create_transport();
        wp_redirect( $redirect . 'manager=transport&notify=success' );
    } 
    // Edit transport.
    else if ( $task == 'edit_transport') {
        edit_transport( $_POST['transport_id']);
        wp_redirect( $redirect . 'manager=transport&notify=update' );
    } 
    // Delete a transport.
    else if ( $task == 'delete_transport') {
        delete_transport( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=transport&notify=delete' );
    }
    
    // Create a new dormitory.
    if ( $task == 'add_dormitory' ) {
        create_dormitory();
        wp_redirect( $redirect . 'manager=dormitory&notify=success' );
    } 
    // Edit dormitory.
    else if ( $task == 'edit_dormitory') {
        edit_dormitory( $_POST['dormitory_id']);
        wp_redirect( $redirect . 'manager=dormitory&notify=update' );
    } 
    // Delete a dormitory.
    else if ( $task == 'delete_dormitory') {
        delete_dormitory( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=dormitory&notify=delete' );
    }
    
    // Create a new noticeboard.
    if ( $task == 'add_notice' ) {
        create_noticeboard();
        wp_redirect( $redirect . 'manager=noticeboard&notify=success' );
    } 
    // Edit noticeboard.
    else if ( $task == 'edit_notice') {
        edit_noticeboard( $_POST['notice_id']);
        wp_redirect( $redirect . 'manager=noticeboard&notify=update' );
    } 
    // Delete a noticeboard.
    else if ( $task == 'delete_notice') {
        delete_noticeboard( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=noticeboard&notify=delete' );
    }
    
    // Edit settings.
    else if ( $task == 'edit_settings') {
        edit_settings();
        wp_redirect( $redirect . 'manager=settings&notify=update' );
    }
    
    // Create a new document.
    if ( $task == 'add_document' ) {
        create_document();
        wp_redirect( $redirect . 'manager=document&notify=success' );
    } 
    // Edit document.
    else if ( $task == 'edit_document') {
        edit_document( $_POST['document_id']);
        wp_redirect( $redirect . 'manager=document&notify=update' );
    } 
    // Delete a document.
    else if ( $task == 'delete_document') {
        delete_document( $_POST['delete_id']);
        wp_redirect( $redirect . 'manager=document&notify=delete' );
    }