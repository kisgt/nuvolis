<?php
$edit_data = get_invoice_info($_POST['param2']);
foreach ($edit_data as $row):
?>
<center>
    <a onClick="PrintElem('#invoice_print')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Print Invoice
        <i class="entypo-print"></i>
    </a>
</center>

    <br><br>

    <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
                <td align="right">
                    <h5>Creation Date : <?php echo date('d M,Y', $row['creation_timestamp']);?></h5>
                    <h5>Title : <?php echo $row['title'];?></h5>
                    <h5>Description : <?php echo $row['description'];?></h5>
                    <h5>Status : <?php echo $row['status']; ?></h5>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">    
            <tr>
                <td align="left"><h4>Payment To </h4></td>
                <td align="right"><h4>Bill To </h4></td>
            </tr>

            <tr>
                <td align="left" valign="top">
                    <?php echo get_settings_info('system_name'); ?><br>
                    <?php echo get_settings_info('address'); ?><br>
                     <?php echo get_settings_info('phone'); ?><br>            
                </td>
                <td align="right" valign="top">
                    <?php echo $student_name = get_student_name_from_id($row['student_id']); ?><br>
                    <?php 
                        $student_info = get_student_info($row['student_id']);
                        foreach ($student_info as $row2)
                            $class_id = $row2['class_id'];
                        echo 'class' . ' - ' . get_class_name_from_id($class_id);
                    ?><br>
                    <?php
                    $student_info = get_student_info($row['student_id']); foreach ($student_info as $row2)
                    echo 'roll - ' . $row2['roll'];?><br>
                </td>
            </tr>
        </table>
        <hr>

        <table width="100%" border="0">    
            <tr>
                <td align="right" width="80%"> Amount :</td>
                <td align="right"><?php echo $row['amount']; ?></td>
            </tr>
        </table>

        <hr>
    </div>
<?php endforeach; ?>


<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>