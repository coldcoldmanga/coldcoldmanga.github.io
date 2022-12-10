<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Jquery Cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <style type="text/css">

    .member{
        margin-top: 150px;
        margin-left:250px
    }

    .book{
        margin-top: 100px;
        margin-left: 250px;
          
    }

    .btn{
        margin-top: 20px;
        
    }

    .form-control{

        width: 98%;
        margin-left: 10px;
    }

    label{

        margin-left: 10px;
    }

     a{

        margin-left: 10px;
        margin-bottom: 10px;
    }

    </style>

</head>
<body>
    
<div class="container text-center">
    <div class="row">
        <div class="col-12 member">
            <h2>Update Member</h2>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><a href="main.php"><i class="bi bi-house-fill" style="margin-right: 10px;  color:black; font-size: 25px;"></i></a>Search For Member</span>
                <input type="text" id="updateMember" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Eg: Member ID or Name">
        </div>
        </div>
        
        <div id="resultMember"></div>
    
        
        

        <div class="col-12 book">
            <h2>Update Book</h2>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><a href="main.php"><i class="bi bi-house-fill" style="margin-right: 10px;  color:black; font-size: 25px;"></i></a>Search For Book</span>
                <input type="text" id="updateBook" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Eg: Book ID or Title">
            </div>
        </div>
        <div id="resultBook"></div>
    </div>
</div>

    <div id="result-book"></div>

    <script type="text/javascript">
//For member
$(document).ready(function(){

$("#updateMember").keyup(function(){
    var input = $(this).val();
    //alert(input);

    if(input != ""){

        $.ajax({

            url:"updateMember.php",
            method:"POST",
            data:{input:input},

            success:function(data){

                $("#resultMember").html(data);
            }

        });
    }

    else{

        $("#resultMember");
    }
})

});

//For book
$(document).ready(function(){

$("#updateBook").keyup(function(){
    var input = $(this).val();
    //alert(input);

    if(input != ""){

        $.ajax({

            url:"updateBook.php",
            method:"POST",
            data:{input:input},

            success:function(data){

                $("#resultBook").html(data);
            }

        });
    }

    else{

        $("#resultBook");
    }
})

});


    </script>

</body>
</html>