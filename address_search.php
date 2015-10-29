<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/29/15
 * Time: 11:04 AM
 */
$address=$_GET['address'];
$address = str_replace(" ", "+", $address);
$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
$json = json_decode($json);

$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
$lon = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
//echo $lat."<br>".$lon;
echo'<td>Lat:</td><td><input class="form-control" readonly type="text" name="lat" value="'.$lat.'" ></td><td>Lon:</td><td><input class="form-control" readonly  type="text" name="lon" value="'.$lon.'"></td>';
//echo'<td>Lat:</td><td><input type="text" name="lat" value="Lat" size="30"></td><td>Lon:</td><td><input type="text" name="lon" value="Lon" size="30"></td>';
?>

