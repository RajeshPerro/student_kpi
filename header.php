<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/13/15
 * Time: 6:53 PM
 */
session_start();

?>

<!--<ul class="nav navbar-nav navbar-left">-->
<!--    <li><a href="dashboard.php?user=--><?php //echo $_SESSION['user']?><!-- &token=--><?php //echo $_SESSION['token']?><!--">-->
<!--            <span class="glyphicon glyphicon-dashboard"></span>-->
<!--            Dashboard</a></li>-->
<!--    <li><a href="attendance.php"><span class="glyphicon glyphicon-check"></span> Attendance</a>-->
<!--    </li>-->
<!--    <li><a href="input_score.php"><span class="glyphicon glyphicon-send"></span> Input Score</a>-->
<!--    </li>-->
<!--    <li><a href="worksnap1.php"><span class="glyphicon glyphicon-picture"></span> Worksnap Score</a></li>-->
<!--    <li><a href="upload_result.php"><span class="glyphicon glyphicon-upload"></span>Upload Score</a></li>-->
<!--    <li><a href="student_status.php"><span class="glyphicon glyphicon-apple"></span>Student Status</a></li>-->
<!--    <li><a href="logout.php" id="sign-out"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>-->
<!--    <li>-->
<!--        <a href="dashboard.php?user=--><?php //echo $_SESSION['user']?><!-- &token=--><?php //echo $_SESSION['token']?><!--"><span class=""></span>--><?php //echo $_SESSION['user']; ?><!--</a>-->
<!--    </li>-->
<!---->
<!--</ul>-->
<ul class="nav navbar-nav navbar-left">
    <li><a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>">
            <span class="glyphicon glyphicon-dashboard"></span>
            Dashboard</a></li>
    <li>
        <a class="dropdown-toggle" data-toggle='dropdown'><span class="glyphicon glyphicon-check"></span> Attendance <span class='caret'></span></a>
        <ul class="dropdown-menu">
            <li><a href="attendance.php"><span class="glyphicon glyphicon-check"></span> Attendance</a></li>
            <li><a href="attendance_edit.php"><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
            <li><a href="attendance_view.php"><span class="glyphicon glyphicon-asterisk"></span> View</a></li>
        </ul>
    </li>
    <li><a class="dropdown-toggle" data-toggle='dropdown'><span class="glyphicon glyphicon-send"></span> Score <span class='caret'></span></a>
        <ul class="dropdown-menu">
            <li><a href="input_score.php"><span class="glyphicon glyphicon-send"></span> Add Score</a></li>
            <li><a href="score_update.php"><span class="glyphicon glyphicon-edit"></span> Edit Score</a></li>
        </ul>
    </li>
    <li><a href="worksnap1.php"><span class="glyphicon glyphicon-picture"></span> Worksnap</a></li>

    <li><a class="dropdown-toggle" data-toggle='dropdown'><span class="glyphicon glyphicon-send"></span> Upload <span class='caret'></span></a>
        <ul class="dropdown-menu">
            <li><a href="upload_result.php"><span class="glyphicon glyphicon-send"></span> Upload Score</a></li>
            <li><a href="map_data_insert.php"><span class="glyphicon glyphicon-info-sign"></span> Add Earning Zones </a></li>
            <li><a href="db_manage.php"><span class="glyphicon glyphicon-edit"></span> DataBase</a></li>
        </ul>
    </li>

    <li><a  class='dropdown-toggle' data-toggle='dropdown'><span class="glyphicon glyphicon-apple"></span> Student Info <span class='caret'></span></a>
        <ul class='dropdown-menu'>
            <li><a href="student_status.php"><span class="glyphicon glyphicon-stats"></span> Student Status</a></li>
            <li><a href="map_view.php" target="_blank"><span class="glyphicon glyphicon-map-marker"></span> Earning Zones</a></li>

        </ul>
    </li>
    <li>
        <a  class='dropdown-toggle' data-toggle='dropdown'><span class="glyphicon glyphicon-cog"></span> Others <span class='caret'></span></a>
        <ul class='dropdown-menu'>
            <li><a href="link_upload.php"><span class="glyphicon glyphicon-info-sign"></span> Help</a></li>
            <li><a href="logout.php" id="sign-out"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
            <li>
                <a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user']; ?></a>
            </li>
        </ul>
    </li>
</ul>