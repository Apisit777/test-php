<?php
 include("../../../inc/mysqli_db_donation.php");
//  include("../../../inc/connect.php");
//  include("../../");

// var_dump("Test");
// echo "Test"."<br>";
// echo $kty_donate;

$id=$_GET['id'];
$name=$_GET['name'];
$tbl_list="food";


$getlist = "SELECT * FROM $tbl_list";
$rs_getlist = mysqli_query($kty_donate, $getlist);
$numrow = mysqli_num_rows($rs_getlist);

echo $rs_getlist;
echo $numrow;

// if($numrow == 0)
// {
// 	$arr->status = "N";
// 	$arr->remark = "ไม่พบรายการนี้";
// 	$myJSON1 = json_encode($arr);
// 	echo $myJSON1;
// 	return false;

// }

?>
