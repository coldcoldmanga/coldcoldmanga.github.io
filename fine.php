<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');

if(isset($_POST['search'])){

    $input = ucwords($_POST['input']);

    if(empty($input)){

        header("location:Sfine.php");
    }
    else if(!preg_match('/[A-Za-z0-9\s]+/',$memberID)){ ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                    Use only alphabets and numbers!
                </h4>
            </div>

 <?php   }
    
    else{

        $search = mysqli_query($conn, "SELECT penalty.amount FROM member INNER JOIN penalty.member ON member.memberID WHERE memberID = '$input' OR name = '$input'");
    }
}

if(isset($_POST['submit'])){

    $memberID = ucwords($_POST['memberID']);
    $amount = $_POST['amount'];

    if(empty($memberID) || empty($amount)){

        header("location:Sfine.php");
    }
    else if(!preg_match('/[A-Za-z0-9\s]+/',$memberID) || !preg_match('/[A-Za-z0-9\s]+/',$amount)){

        echo "<script>alert('Use only alphabets and numbers!');
        window.location='Sfine.php'</script>";

    }
    else{

        $memberFine = mysqli_query($conn,"SELECT * FROM member WHERE memberID = '$memberID' ");
        $result = mysqli_fetch_assoc($memberFine);

        $check = $result['penalty'] - $amount;

        if(!$check == 0){

            $update = mysqli_query($conn,"UPDATE member SET penalty = '$check' WHERE memberID = '$memberID' "); ?>

            <div class="alert alert-warning" role="alert">
                        <h4 class="text-center">
                            You still need to pay RM <?php echo $check; ?>!
                        </h4>
                    </div>
  <?php    }

        else{

            $update = mysqli_query($conn,"UPDATE member SET penalty = 0 WHERE memberID = '$memberID' "); ?>
            
                    <div class="alert alert-success" role="alert">
                        <h4 class="text-center">
                            Thank you for paying your penalty!
                        </h4>
                    </div>

    <?php   }

    }

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
        margin-left: 500px;
        margin-top: 100px;
    }

</style>

</head>
<body>

    <div class="card w-50">
        <h5 class="card-header">Settling Penalty Fee</h5>
            <form action="fine.php" method="post"> 
            <div class="card-body">
               
                <label for="studentID">Member's ID</label>
                <input type="text" name="memberID" class="form-control" autocomplete="off">

                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control" autocomplete="off">

                <a href="main.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 20px; margin-left:5px;">Pay</button>
                
            </div>
            </form>
    </div>

</body>
</html>