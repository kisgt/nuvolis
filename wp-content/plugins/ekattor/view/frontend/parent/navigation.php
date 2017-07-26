<nav class="navbar navbar-inverse" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <?php
    global $current_user;
    get_currentuserinfo();
    $current_user_name = $current_user->user_login;
    ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav">
            <li class="<?php if ($manager == 'home') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=home">
                    <i class="entypo-gauge"></i>
                   Home
                </a>
            </li>

            <li class="<?php if ($manager == 'teacher') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=teacher">
                    <i class="entypo-users"></i>
                    Teachers
                </a>
            </li>

            <li class="<?php if ($manager == 'class-routine') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=class-routine">
                    <i class="entypo-target"></i>
                    Class Routine
                </a>
            </li>

            <li class="<?php if ($manager == 'marks') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=marks">
                    <i class="entypo-graduation-cap"></i>
                    Marks
                </a>
            </li>

            <li class="<?php if ($manager == 'attendance') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=attendance">
                    <i class="entypo-chart-area"></i>
                    Attendance
                </a>
            </li>

            <li class="<?php if ($manager == 'invoice') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=invoice">
                    <i class="entypo-credit-card"></i>
                    Payments
                </a>
            </li>

            <li class="<?php if ($manager == 'book' || $manager == 'transport' || $manager == 'dormitory' || $manager == 'noticeboard') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="entypo-lifebuoy"></i>
                    Others <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=book"><i class="entypo-book"></i>Library</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=transport"><i class="entypo-location"></i>Transport</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=dormitory"><i class="entypo-home"></i>Dormitory</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_FRONT_URL; ?>&manager=noticeboard"><i class="entypo-doc-text-inv"></i>Noticeboard</a>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i> <?php echo $current_user_name; ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo admin_url(); ?>profile.php">
                            <i class="entypo-dot"></i> Edit Profile</a>
                    </li>
                    <li class="divider"></li>

                    <li>
                        <a href="<?php echo admin_url(); ?>profile.php">
                            <i class="entypo-dot"></i>Change Password
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo wp_logout_url(get_permalink()); ?>">
                            <i class="entypo-user"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
