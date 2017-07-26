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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav">
            <li class="<?php if($manager == 'dashboard') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=dashboard">
                    <i class="entypo-gauge"></i>
                    Dashboard
                </a>
            </li>
            
            <li class="<?php if($manager == 'student') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-group"></i>
                    Students <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#" onclick="ajax_call('student-add')">
                            <i class="entypo-plus-circled"></i>
                            Add New Student
                        </a>
                    </li>
                    <li class="divider"></li>
                    <?php
                    $classes = get_classes();
                    foreach ($classes as $row):
                        ?>
                        <li>
                            <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=student&class_id=<?php echo $row['class_id']; ?>">
                                <i class="entypo-dot"></i>Class <?php echo $row['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            
            <li class="<?php if($manager == 'teacher') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=teacher">
                    <i class="entypo-users"></i>
                    Teachers
                </a>
            </li>
            
            <li class="<?php if($manager == 'parent') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="entypo-user"></i>
                    Parents <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    $classes = get_classes();
                    foreach ($classes as $row):
                        ?>
                        <li>
                            <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=parent&class_id=<?php echo $row['class_id']; ?>">
                                <i class="entypo-dot"></i>Class <?php echo $row['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            
            <li class="<?php if($manager == 'class' || $manager == 'class-routine') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="entypo-flow-tree"></i>
                    Class <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=class">
                            <i class="entypo-menu"></i>Class List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=class-routine">
                            <i class="entypo-target"></i>
                            Class Routine
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="<?php if($manager == 'subject') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="entypo-docs"></i>
                    Subjects <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#" onclick="ajax_call('subject-add')">
                            <i class="entypo-plus-circled"></i>
                            Add New Subject
                        </a>
                    </li>
                    <li class="divider"></li>
                    <?php
                    $classes = get_classes();
                    foreach ($classes as $row):
                        ?>
                        <li>
                            <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=subject&class_id=<?php echo $row['class_id']; ?>">
                                <i class="entypo-dot"></i>Class <?php echo $row['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            
            <li class="<?php if($manager == 'exam' || $manager == 'grade' || $manager == 'marks' || $manager == 'attendance') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="entypo-graduation-cap"></i>
                    Exam <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=exam"><i class="entypo-dot"></i>Exam List</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=grade"><i class="entypo-dot"></i>Grades</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=marks"><i class="entypo-dot"></i>Marks</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=attendance"><i class="entypo-dot"></i>Attendance</a>
                    </li>
                </ul>
            </li>
            
            <li class="<?php if($manager == 'invoice') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=invoice">
                    <i class="entypo-credit-card"></i>
                    Payments
                </a>
            </li>
            
            <li class="<?php if($manager == 'book' || $manager == 'transport' || $manager == 'dormitory' || $manager == 'noticeboard') echo 'active'; ?> dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="entypo-lifebuoy"></i>
                    Others <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=book"><i class="entypo-book"></i>Library</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=transport"><i class="entypo-location"></i>Transport</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=dormitory"><i class="entypo-home"></i>Dormitory</a>
                    </li>
                    <li>
                        <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=noticeboard"><i class="entypo-doc-text-inv"></i>Noticeboard</a>
                    </li>
                </ul>
            </li>
            
            <li class="<?php if($manager == 'settings') echo 'active'; ?>">
                <a href="<?php echo EKATTOR_BASE_URL; ?>&manager=settings">
                    <i class="entypo-tools"></i>
                    Settings
                </a>
            </li>
            
        </ul>
    </div>
</nav>