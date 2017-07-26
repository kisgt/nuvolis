<?php
/**
 * Plugin Name: Ekattor School Manager Wordpress Plugin
 * Plugin URI: http://codecanyon.net/user/Creativeitem/portfolio?ref=Creativeitem
 * Description: Manage your school completely by this plugin. Separate account for teacher, student and parent.
 * Version: 1.0 
 * Author: Creativeitem
 * Author URI: http://codecanyon.net/user/Creativeitem?ref=Creativeitem
 * License: GPL2
 */  




    // Prohibit direct file accessing.
    defined( 'ABSPATH' ) or die( 'Access not allowed!' );



    // Directory constants value for plugin files, assets.
    define( 'EKATTOR_DIR', __DIR__ );
    define( 'EKATTOR_BASE_URL', admin_url() . 'admin.php?page=ekattor' );



    // Database installation and custom role creation during plugin activation.
    register_activation_hook( __FILE__, 'install_ekattor_plugin' );		
    function install_ekattor_plugin() {
        /*
        * Runs database table creation query.
        * Creates user role for teacher, parent, student.
        * Creates directory for user image and study material document upload.
        */
        include ( EKATTOR_DIR . '/plugin-installer.php' );
    }
    


    // Adding plugin to admin menu.
    add_action( 'admin_menu', 'ekattor_plugin' );
    function ekattor_plugin() {
        //$menu = add_menu_page( 'Ekattor School Management System Pro', 'Ekattor', 'read' , 'ekattor', 'ekattor_manager' );

        // Css and javascript adding action calling.
        add_action( 'admin_print_styles-' . $menu, 'ekattor_add_styles' );
        add_action( 'admin_print_scripts-' . $menu, 'ekattor_add_scripts' );
    }
    


    // Loading the main application file.
    function ekattor_manager() {
        /*
        * Loads the main application index file here.
        */
        include ( EKATTOR_DIR . '/view/backend/index.php' );
    }
    
    // Ekattor frontend integration shortcode
    add_shortcode( 'ekattor_school_manager', 'ekattor_shortcode_handler' );
    function ekattor_shortcode_handler() {
        
        include ( EKATTOR_DIR . '/view/frontend/index.php' );
    }

    // Remove the wordpress admin footer
    function remove_footer_admin () {}
    add_filter('admin_footer_text', 'remove_footer_admin');
    
    // Remove the wordpres footer version
    function remove_footer_version() {}
    add_filter( 'update_footer', 'remove_footer_version' , 9999);

    // Enqueue plugin template css files.
    function ekattor_add_styles() {
        wp_enqueue_style( 'font-style',         'http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic' );
        wp_enqueue_style( 'jquery-ui',          plugins_url( 'assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css', __FILE__ ) );
        wp_enqueue_style( 'entypo-font',        plugins_url( 'assets/css/font-icons/entypo/css/entypo.css', __FILE__ ) );
        wp_enqueue_style( 'neon-style',         plugins_url( 'assets/css/neon-backend.css', __FILE__ ) );
        wp_enqueue_style( 'custom-style',       plugins_url( 'assets/css/custom.css', __FILE__ ) );
        wp_enqueue_style( 'font-awesome',       plugins_url( 'assets/css/font-icons/font-awesome/css/font-awesome.min.css', __FILE__ ) );
        
        wp_enqueue_style( 'select2-bootstrap',  plugins_url( 'assets/js/select2/select2-bootstrap.css', __FILE__ ) );
        wp_enqueue_style( 'select2-style',      plugins_url( 'assets/js/select2/select2.css', __FILE__ ) );
        wp_enqueue_style( 'daterangepicker',    plugins_url( 'assets/js/daterangepicker/daterangepicker-bs3.css', __FILE__ ) );
    }
    // Enqueue plugin template js files.
    function ekattor_add_scripts() {
        wp_enqueue_script( 'gsap-js',           plugins_url( 'assets/js/gsap/main-gsap.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'jquery-ui-minimal', plugins_url( 'assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'bootstrap-min-js',  plugins_url( 'assets/js/bootstrap.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'joinable-js',       plugins_url( 'assets/js/joinable.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'resizable-js',      plugins_url( 'assets/js/resizeable.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'neon-api',          plugins_url( 'assets/js/neon-api.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'jquery-validate',   plugins_url( 'assets/js/jquery.validate.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'jquery-datatable',  plugins_url( 'assets/js/jquery.dataTables.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'tabletools',        plugins_url( 'assets/js/datatables/TableTools.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'datatable-column',  plugins_url( 'assets/js/datatables/jquery.dataTables.columnFilter.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'lodash-js',         plugins_url( 'assets/js/datatables/lodash.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'datatable',         plugins_url( 'assets/js/dataTables.bootstrap.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'select2-js',        plugins_url( 'assets/js/select2/select2.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'toastr-js',         plugins_url( 'assets/js/toastr.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'datepicker-js',     plugins_url( 'assets/js/bootstrap-datepicker.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'daterangepicker',   plugins_url( 'assets/js/daterangepicker/daterangepicker.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'neon-custom',       plugins_url( 'assets/js/neon-custom.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'neon-demo',         plugins_url( 'assets/js/neon-demo.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'timepicker',        plugins_url( 'assets/js/bootstrap-timepicker.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'fullcalendar',      plugins_url( 'assets/js/fullcalendar/fullcalendar.min.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'calendar',          plugins_url( 'assets/js/neon-calendar.js', __FILE__ ), '', '', true );
        wp_enqueue_script( 'ekattor',           plugins_url( 'assets/js/ekattor.js', __FILE__ ), '', '', true );
    }



    // Wordpress form submission post function. 
    add_action( 'admin_post_ekattor_form_submit' , 'ekattor_form_submit' );
    function ekattor_form_submit() {

        $task       =   $_POST['task'];
        $redirect   =   $_POST['redirect'];

        // All database table query functions written in this file.
        // On url get variable $task, functions are performed from function.php
        include ( EKATTOR_DIR . '/model/function.php' );

        // Defining the current logged in user role.
        global $current_user, $wpdb;
        $role               = $wpdb->prefix . 'capabilities';
        $current_user->role = array_keys( $current_user->$role );
        $role               = $current_user->role[0];

        // Performs form submission tasks and controles redirection operation on task and loggedin user type basis
        if ( $role == 'administrator')
            include ( EKATTOR_DIR . '/controller/controller-administrator.php' );
        if ( $role == 'teacher')
            include ( EKATTOR_DIR . '/controller/controller-teacher.php' );
        if ( $role == 'student')
            include ( EKATTOR_DIR . '/controller/controller-student.php' );
        if ( $role == 'parent')
            include ( EKATTOR_DIR . '/controller/controller-parent.php' );
    }



    // Wordpress ajax enque function, used for ajax functionalities inside popup modal pages.
    add_action( 'wp_ajax_ekattor_task', 'ekattor_task' );
    function ekattor_task() {

        // Defining the current logged in user role.
        global $current_user, $wpdb;
        $role               = $wpdb->prefix . 'capabilities';
        $current_user->role = array_keys( $current_user->$role );
        $role               = $current_user->role[0];
        $task_name          = $_POST['task_name'];

        // All database table query functions written in this file.
        include ( EKATTOR_DIR . '/model/function.php' );

        /*
        * Includes the modal task named file.
        * Shows edit page of a user or event.
        * Shows profile page of a user.
        * Includes views depending on current user role, logged in.
        * User role can be administrator / teacher / parent / student.
        */
        

        //if ( $role == 'administrator')
            //include 'view/backend/'.$role . '/' . $task_name . '.php';
        //else
            include 'view/frontend/' . $role . '/' . $task_name . '.php';

        // Calling the custom jquery plugins only for modals.
        echo '<script src="'. plugin_dir_url(__FILE__) .'assets/js/neon-custom.js"></script>';
        die();
    }
?>