<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/13/15
 * Time: 6:53 PM
 */
session_start();

?>

<ul class="nav navbar-nav navbar-left">
    <li><a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>">
            <span class="glyphicon glyphicon-dashboard"></span>
            Dashboard</a></li>
    <li><a href="attendance.php"><span class="glyphicon glyphicon-check"></span> Attendance</a>
    </li>
    <li><a href="input_score.php"><span class="glyphicon glyphicon-send"></span> Input Score</a>
    </li>
    <li><a href="worksnap1.php"><span class="glyphicon glyphicon-picture"></span> Worksnap Score</a></li>
    <li><a href="upload_result.php"><span class="glyphicon glyphicon-upload"></span>Upload Score</a></li>
    <li><a href="student_status.php"><span class="glyphicon glyphicon-apple"></span>Student Status</a></li>
    <li><a href="logout.php" id="sign-out"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>
    <li>
        <a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>"><span class=""></span><?php echo $_SESSION['user']; ?></a>
<!--        <ul>-->
<!--            <li><a href="logout.php" id="sign-out"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>-->
<!--        </ul>-->
    </li>

</ul>