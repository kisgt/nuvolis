<center>
    <h4> 
        <div class="label label-info" style="font-size: 100%;">
            <i class="entypo-book"></i>
            Book List
        </div>
    </h4>
</center>

<div class="col-md-offset-1 col-md-10">
    <button onclick="ajax_call('book-add')" class="btn btn-primary pull-right">
        <i class="entypo-plus"></i>
        <?php echo 'Add New Book'; ?>
    </button>
    <div style="clear:both;"></div>
    <br>
        
    <table class="table table-bordered datatable" id="table_export">
        <thead>
            <tr>
                <th> # </th>
                <th>Name</th>
                <th>Author</th>
                <th>Description</th>
                <th>Price</th>
                <th>Class</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $books = get_books();
            foreach ($books as $row){ ?>
                <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo get_class_name_from_id($row['class_id']); ?></td>
                    <td><span class="label label-<?php if($row['status']=='available')echo 'success';else echo 'secondary';?>"><?php echo $row['status'];?></span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="#" onclick="ajax_call('book-edit' , <?php echo $row['book_id'];?>)">
                                        <i class="entypo-pencil"></i> Edit
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" onclick="confirm_modal('delete_book' , <?php echo $row['book_id'];?>)">
                                        <i class="entypo-cancel-circled"></i> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <?php $count++; ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>






















