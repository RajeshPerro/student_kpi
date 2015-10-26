<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/26/15
 * Time: 11:27 AM
 */
$Search_key=$_GET['search'];
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$sql="select * FROM resources WHERE name LIKE  '$Search_key%'";
$db_Name='student_kpi';
$sl=0;
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
//print_r($fetch_result);
echo ('<table class="table-bordered table-hover table-condensed " ><tr><th>SL#</th><th>Link Name</th><th>Description</th><th>URL</th></tr>');
foreach ($fetch_result as $key => $value) {
echo('<tr><td>'.$value['id'].'</td><td>'.$value['name'].'</td><td>'.$value['description'].'</td><td><a href="'.$value['link'].'" target="_blank">'.$value['link'].'</a></td></tr>');

}
echo '</table>';
?>