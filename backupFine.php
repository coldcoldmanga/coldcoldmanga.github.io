<?php 

require('config.php');

if(isset($_POST['fine'])){

$date = date("Y/m/d");

@header("Content-Disposition: attachment; filename= PenaltyBackup_$date.csv"); 

$data = '';

$fine = mysqli_query($conn, "SELECT * FROM borrow WHERE penalty > 0");

while($row = mysqli_fetch_assoc($fine)){

    $data.= $row['ID'].",";
    $data.= $row['memberID'].",";
    $data.= $row['amount']."\n";
}

echo $data;
exit();

}

?>