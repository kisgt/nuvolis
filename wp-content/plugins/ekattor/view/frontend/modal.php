<script>
    function ajax_call( task_name, param2, param3 ) {
        
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' );?>';
        var redirect_url = '<?php echo EKATTOR_FRONT_URL;?>';
        // LOADING THE AJAX MODAL
        jQuery( '#modal_ajax' ).modal( 'show', {backdrop: 'true'} );
		
        
        jQuery.post(
            ajaxurl, 
            {
                'action'    : 'ekattor_task',
                'task_name' : task_name,
                'param2'    : param2,
                'param3'    : param3,
            }, 
            function( response ) {
                jQuery( '#modal_ajax .modal-body' ).html( response );
                jQuery( '#redirect_url' ).val( redirect_url );
            }
        );
    }
</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax" style="margin-top:30px;">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    School Management System
                </h4>
            </div>

            <div class="modal-body" style="height:500px; overflow:auto;"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    function confirm_modal( task , delete_id , param1 )
    {
        $('#preloader-delete').html('');
        jQuery('#modal_delete').modal('show', {backdrop: 'static'});
        document.getElementById('task').setAttribute("value" , task );
        document.getElementById('delete_id').setAttribute("value" , delete_id );
        document.getElementById('param1').setAttribute("value" , param1 );
        var redirect_url = '<?php echo EKATTOR_FRONT_URL;?>';
        jQuery( '#redirect_url' ).val( redirect_url );
    }
    </script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <span id="preloader-delete"></span>
                    </br>

                    <form action="<?php echo admin_url(); ?>admin-post.php" method="post" style="float:none;">
                    
                        <input type="hidden" name="action"      value="ekattor_form_submit">
                        <input type="hidden" name="task"        value=""    id="task">
                        <input type="hidden" name="delete_id"   value=""    id="delete_id">
                        <input type="hidden" name="param1"      value=""    id="param1">
                        <input type="hidden" name="redirect"    value=""    id="redirect_url">
                        
                        <button type="submit" class="btn btn-danger" id="delete_link" onClick="">Delete</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" id="delete_cancel_link">Cancel</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>