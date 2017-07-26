<?php

    // Show mark.
    if ( $task == 'show_mark' ) {
        if ( $_POST['exam_id'] > 0 && $_POST['class_id'] > 0 && $_POST['subject_id'] > 0 )
            wp_redirect($redirect . '&manager=marks&exam_id=' . $_POST['exam_id'] . '&class_id=' . $_POST['class_id'] . '&subject_id=' . $_POST['subject_id'] );
        else
            wp_redirect($redirect . '&manager=marks' );
    }
    
    