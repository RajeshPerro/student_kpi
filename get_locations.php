<?php
    
    include 'database_config.php';
    include ('rajesh_model.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_Name='student_kpi';
$sql = "SELECT * FROM locations";
$locations = $raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);

echo json_encode( $locations );
?>