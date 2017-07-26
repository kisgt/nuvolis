<center>
    <h4> 
        <div class="label label-info">
            <i class="entypo-user"></i>
            Parents of class <?php echo get_class_name_from_id($_GET['class_id']);?>
        </div>
    </h4>
</center>
<br>
    
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th> # </th>
            <th>Roll</th>
            <th>Student</th>
            <th>Parent</th>
            <th>Relation</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Profession</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count      = 1;
        $students   = get_students($_GET['class_id']);
        foreach ($students as $row) {
            $parent_info = get_parent_info_of_student($row['student_id']);?>
            <tr class="odd gradeX">
                <td><?php echo $count; ?></td>
                <td><?php echo $row['roll']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <?php
                    if (isset($parent_info['name']))
                        echo $parent_info['name'];
                    else
                        echo '-';
                    ?>
                </td>
                <td>
                    <?php
                    if (isset($parent_info['relation_with_student']))
                        echo $parent_info['relation_with_student'];
                    else
                        echo '-';
                    ?>
                </td>
                <td>
                    <?php
                    if (isset($parent_info['email']))
                        echo $parent_info['email'];
                    else
                        echo '-';
                    ?>
                </td>
                <td>
                    <?php
                    if (isset($parent_info['phone']))
                        echo $parent_info['phone'];
                    else
                        echo '-';
                    ?>
                </td>
                <td>
                    <?php
                    if (isset($parent_info['address']))
                        echo $parent_info['address'];
                    else
                        echo '-';
                    ?>
                </td>
                <td>
                    <?php
                    if (isset($parent_info['profession']))
                        echo $parent_info['profession'];
                    else
                        echo '-';
                    ?>
                </td>
                
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            <?php if (empty($parent_info)){ ?>
                                        <li>
                                            <a href="#" onclick="ajax_call('parent-add' , <?php echo $row['student_id'];?>)">
                                                <i class="entypo-plus-circled"></i> Add
                                            </a>
                                        </li> 
                            <?php } else { ?>
                                        <li>
                                            <a href="#" onclick="ajax_call('parent-edit' , <?php echo $parent_info['parent_id'];?>, <?php echo $row['student_id'];?>)">
                                                <i class="entypo-pencil"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo admin_url() . 'user-edit.php?user_id=' . $parent_info['ID']; ?>">
                                                <i class="entypo-pencil"></i> Wp account
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" onclick="confirm_modal('delete_parent' , <?php echo $parent_info['parent_id'];?> , <?php echo $row['class_id'];?>)">
                                                <i class="entypo-cancel-circled"></i> Delete
                                            </a>
                                        </li>
                            <?php } ?>
                        </ul>
                    </div>
                </td>
                <?php $count++; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>