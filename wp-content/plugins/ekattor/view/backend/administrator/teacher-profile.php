<?php
$profile_data = get_teacher_info($_POST['param2']);
foreach ($profile_data as $row){ ?>
    <div class="profile-env">

        <header class="row">

            <div class="col-sm-3">

                <a href="#" class="profile-picture">
                    <img src="<?php echo get_image_url('teacher' , $row['teacher_id']);?>" 
                         class="img-responsive img-circle" />
                </a>

            </div>

            <div class="col-sm-9">

                <ul class="profile-info-sections">
                    <li style="padding:0px; margin:0px;">
                        <div class="profile-name">
                            <h3><?php echo $row['name']; ?></h3>
                        </div>
                    </li>
                </ul>

            </div>


        </header>

        <section class="profile-info-tabs">

            <div class="row">

                <div class="">
                    <br>
                    <table class="table table-bordered">

                        <?php if ($row['birthday'] != ''): ?>
                            <tr>
                                <td>Birthday</td>
                                <td><b><?php echo date("D, d M Y", $row['birthday']); ?></b></td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($row['sex'] != ''): ?>
                            <tr>
                                <td>Gender</td>
                                <td><b><?php echo $row['sex']; ?></b></td>
                            </tr>
                        <?php endif; ?>


                        <?php if ($row['phone'] != ''): ?>
                            <tr>
                                <td>Phone</td>
                                <td><b><?php echo $row['phone']; ?></b></td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($row['email'] != ''): ?>
                            <tr>
                                <td>Email</td>
                                <td><b><?php echo $row['email']; ?></b></td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($row['address'] != ''): ?>
                            <tr>
                                <td>Address</td>
                                <td><b><?php echo $row['address']; ?></b>
                                </td>
                            </tr>
                        <?php endif; ?>

                    </table>
                </div>
            </div>		
        </section>

    </div>

<?php } ?>