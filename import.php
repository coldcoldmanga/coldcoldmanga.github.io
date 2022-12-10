<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');

//Importing the Book
if(isset($_POST['book'])){

    $file = $_FILES["importBook"]["tmp_name"];
    $file_open =fopen($file,"r");
    
    while(($csv = fgetcsv($file_open,1000,",")) !== false){

        $bookID = $csv[0];
        $title = ucwords($csv[1]);
        $author = ucwords($csv[2]);
        $publisher = ucwords($csv[3]);
        $type = $csv[4];
        $price = $csv[5];
        $ISBN = $csv[6];
        $datetime = $csv[7];
        $stats = $csv[8];

        mysqli_query($conn, "INSERT INTO book VALUES ('$bookID','$title','$author','$publisher','$type','$price','$ISBN','$datetime','$stats')"); ?>

            <div class="alert alert-success" role="alert">
                <h4 class="text-center">
                     Book Record Imported Successfully
                </h4>
            </div> 

 <?php }

    
}

//Importing the Member Record
if(isset($_POST['member'])){

    $file = $_FILES["importMember"]["tmp_name"];
    $file_open =fopen($file,"r");
    
    while(($csv = fgetcsv($file_open,1000,",")) !== false){

        $memberID = ucwords($csv[0]);
        $name = ucwords($csv[1]);
        $class = ucwords($csv[2]);
        $level = ucwords($csv[3]);
        $telephone = $csv[4];

        mysqli_query($conn, "INSERT INTO member(memberID, name, class, level, telephone) VALUES ('$memberID','$name','$class','$level','$telephone')"); ?>
        
            <div class="alert alert-success" role="alert">
                <h4 class="text-center">
                     Member Record Imported Successfully
                </h4>
            </div>

 <?php }
}

//Importing the Penalty Record
if(isset($_POST['fine'])){

    $file = $_FILES["importPenalty"]["tmp_name"];
    $file_open =fopen($file,"r");
    
    while(($csv = fgetcsv($file_open,1000,",")) !== false){

        $memberID = ucwords($csv[0]);
        $amount = $csv[1];
        
        mysqli_query($conn, "INSERT INTO penalty(memberID, amount) VALUES ('$memberID','$amount')"); ?>
        
            <div class="alert alert-success" role="alert">
                <h4 class="text-center">
                     Penalty Record Imported Successfully
                </h4>
            </div>

<?php }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">

        .card{

            text-align: center;
            margin: 50px 0 0 500px;
        }

        .container{

            text-align: center;
            margin-top: 10px;
        }

        button{
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <div class="card w-50 box">
        <h5 class="card-header">Import Book Records</h5>
            <form action="import.php" method="post" enctype="multipart/form-data"> 
            <div class="card-body">
            <input type="file" class="form-control" name="importBook">
                <button type="submit" name="book" class="btn btn-primary ">Import Book Data to Excel</button>
            </div>
            </form>
    </div>

    <div class="card w-50 box">
        <h5 class="card-header">Import Member Records</h5>
            <form action="import.php" method="post" enctype="multipart/form-data"> 
            <div class="card-body">
                <input type="file" class="form-control" name="importMember">
                <button type="submit" name="member" class="btn btn-primary ">Import Member Data to Excel</button>
            </div>
            </form>
    </div>

    <div class="card w-50 box">
        <h5 class="card-header">Import Penalty Records</h5>
            <form action="import.php" method="post" enctype="multipart/form-data"> 
            <div class="card-body">
                <input type="file" class="form-control" name="importPenalty">
                <button type="submit" name="fine" class="btn btn-primary ">Import Penalty Data to Excel</button>
            </div>
            </form>
    </div>

        <div class="container">
            <a href="main.php" class="btn btn-sencondary">Go Back</a>
        </div>
     
    </div>
</div>
    
</body>
</html>