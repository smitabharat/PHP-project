<?php
include_once 'dbConnection.php';
set_time_limit(500);

/*********************************************************************************************************************************/
$string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/marketmap&format=&type=0&ind_id=7");
$json_a = json_decode($string, true);
$selectOptions = $json_a['item'];

for($i = 0; $i < sizeof($selectOptions); $i++){
  $CompanyName = $selectOptions[$i]['shortname'];
  $lastvalue = $selectOptions[$i]['lastvalue'];
  $pchange = $selectOptions[$i]['percentchange'];
  $ru = "nse500";

  if($pchange > 0){

    $qd = mysqli_query($con,"SELECT * FROM `lose1` WHERE `comp` = '$CompanyName' ");
    $rowd = mysqli_num_rows($qd);
    if($rowd == 0){
    }else{
      $del1 = "DELETE FROM `lose1` WHERE `comp` = '$CompanyName' ";
      $run1 = mysqli_query($con,$del1);
    }

    $qa = mysqli_query($con,"SELECT * FROM `gain1` WHERE `comp` = '$CompanyName' ");
    $rowa = mysqli_num_rows($qa);
    if($rowa == 0){
      $insert = "INSERT INTO `gain1`(`comp`, `curr`, `gai`, `sr`, `rou`) VALUES ('$CompanyName','$lastvalue','$pchange','$i','$ru')";
      $runin = mysqli_query($con,$insert);
    }else{
      $q=mysqli_query($con,"UPDATE `gain1` SET `curr` = '$lastvalue', `gai` = '$pchange', `sr` = '$i', `rou` = '$ru' WHERE `comp` = '$CompanyName' ");
      if($q == true){
        //echo "Updated !<br>";
      }else{
        //echo "".mysqli_error($con);
      }
    }

  }
}

/*********************************************************************************************************************************/

$string2 = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/marketmap&format=&type=0&ind_id=7");
$json_a2 = json_decode($string2, true);
$selectOptions2 = $json_a2['item'];

for($i = 0; $i < sizeof($selectOptions2); $i++){

    $CompanyName2 = $selectOptions2[$i]['shortname'];
    $lastvalue2 = $selectOptions2[$i]['lastvalue'];
    $pchange2 = $selectOptions2[$i]['percentchange'];
    $ru = "nse500";
    if($pchange2 < 0){

      $qc = mysqli_query($con,"SELECT * FROM `gain1` WHERE `comp` = '$CompanyName2' ");
      $rowc = mysqli_num_rows($qc);
      if($rowc == 0){
      }else{
        //echo "Data Found 2 !";
        $del2 = "DELETE FROM `lose1` WHERE `gain1` = '$CompanyName2' ";
        $run2 = mysqli_query($con,$del2);
      }


      $qb = mysqli_query($con,"SELECT * FROM `lose1` WHERE `comp` = '$CompanyName2' ");
      $rowb = mysqli_num_rows($qb);
      if($rowb == 0){
        $insert1 = "INSERT INTO `lose1`(`comp`, `curr`, `gai`, `sr`, `rou`) VALUES ('$CompanyName2','$lastvalue2','$pchange2','$i','$ru')";
        $runin1 = mysqli_query($con,$insert1);
      }else{
        $q1=mysqli_query($con,"UPDATE `lose1` SET `curr` = '$lastvalue2', `gai` = '$pchange2', `sr` = '$i', `rou` = '$ru' WHERE `comp` = '$CompanyName2' ");
        if($q1 == true){
          //echo "Updated !<br>";
        }else{
          //echo "".mysqli_error($con);
        }
      }
    }

}


/*********************************************************************************************************************************/



/*
$string4 = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/marketmap&format=&type=0&ind_id=7");
$json_a4 = json_decode($string4, true);
$selectOptions4 = $json_a4['item'];

for($i = 0; $i < 300; $i++){

    $CompanyName4 = $selectOptions4[$i]['shortname'];
    $id4 = $selectOptions4[$i]['id'];

    $string5 = file_get_contents("https://priceapi.moneycontrol.com/pricefeed/nse/equitycash/$id");
    $json_a5 = json_decode($string5, true);
    $selectOptions5 = $json_a5['data'];
    $comp5 = $selectOptions5['SC_FULLNM'];

    $q1=mysqli_query($con,"SELECT * FROM `all` WHERE id = '$id' ")or die('Error223');
    $result1 = mysqli_num_rows($q1);
    if($result1 == 0){
        $insert = "INSERT INTO `all`(`sr`, `comp`, `id`) VALUES ('$i','$comp5','$id4')";
        $runin = mysqli_query($con,$insert);
    }

}
if($runin == true){
}
else {
    
  $delete = "DELETE FROM `all` WHERE sr='12' ";
  $rundelete = mysqli_query($con,$delete);

  if($rundelete == false){
  }else{
    $string6 = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/marketmap&format=&type=0&ind_id=7");
    $json_a6 = json_decode($string6, true);
    $selectOptions6 = $json_a1['item'];
    for($i = 0; $i < sizeof($selectOptions6); $i++){

      $CompanyName5 = $selectOptions6[$i]['shortname'];
      $id5 = $selectOptions6[$i]['id'];


      $string7 = file_get_contents("https://priceapi.moneycontrol.com/pricefeed/nse/equitycash/$id");
      $json_a7 = json_decode($string7, true);
      $selectOptions7 = $json_a7['data'];
      $comp6 = $selectOptions7['SC_FULLNM'];

      $insert = "INSERT INTO `all`(`sr`, `comp`, `id`) VALUES ('12','$comp','$id')";
      $runin = mysqli_query($con,$insert);

    }
    if($runinsert == true){
      //echo "Data Updeted !";
    }
  }
  

}
// */

/*********************************************************************************************************************************/

?>