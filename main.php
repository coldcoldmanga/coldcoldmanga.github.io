<?php 

include('footer.php');

session_start();

if(!isset($_SESSION['adminID'])){

    header("location:index.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="wide=device-width,initial-scale=1.0">
<link rel="stylesheet" href="gradient.css">

<!-- Bootstrap CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Jquery -->
<script defer src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<style type="text/css">


@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@500&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Noto Sans SC', sans-serif;
}

body{
    background: #f2f2f2;
}

nav{
    
    background:#9A76C5;
    z-index: 1;
    height: 90px;
}

nav:after{
    content:'';
    z-index: 1;
    clear:both;
    display:table;
}

nav .logo{

    float:left;
    margin-left:24px;
    margin-top: -80px;
}

nav .title{
    
    float:left;
    color:#faf3fc;
    font-size:40px;
    font-weight: 600;
    line-height:85px;
    margin-left:0px;
}

nav ul{
    float:right;
    list-style:none;
    margin-right:40px;
    position:relative;

}

nav ul li{
    float:none;
    display:inline-block;
    background:none;
    margin:0 5px;
    padding-top: 5px;;
}

nav ul li a{

    color:#faf3fc;
    text-decoration:none;
    line-height:75px;
    font-size:22px;
    z-index: 1;
    font-weight: 600;
    padding:8px 15px;
    width:100px;

}

nav ul li a:hover{

color:#cadefc;
border-radius:5px;
box-shadow: 0 0 5px #cadefc,
            0 0 5px #cadefc;
}

nav ul ul li a:hover{

    color:#cadefc;
    box-shadow: none;
}

nav ul ul{

    position:absolute;
    top:100px;
    opacity:0;
    visibility: hidden;
    transition: top .3s;
}

nav ul li:hover > ul{

    top: 80px;
    opacity:1;
    z-index: 1;
    background:#9A76C5;
    visibility:visible;
} 

nav ul ul li{
    
    position: relative;
    margin:0px -50px 0px -30px;
    width:180px;
    z-index: 1;
    float:none;
    display:list-item;
    border-bottom: solid rgba(#E6E6FA);
}

nav ul ul li a{

    line-height:50px;
}

.container-img{

    margin-top: 80px;
    margin-left: 0px;
}

.wrapper{
    width:680px;
    background: #fff;
    border-radius: 15px;
  
}

.wrapper header{
    font-size: 35px;
    font-weight: 600;
    text-align: center;
}

.wrapper{
    position: fixed;
    right: 120px;
    bottom: 300px;
}

.content .quote-area{
    display: flex;
    justify-content: center;
    margin: 10px;
}

.quote-area i{
    font-size: 15px;
}

.quote-area i:first-child{
    margin: 3px 10px 0 0;
}

.quote-area i:last-child{
    display: flex;
    align-items: flex-end;
    margin: 0 0 3px 10px ;
}

.quote-area .quote{
    font-size: 22px;
    text-align: center;
    word-break: break-all;
}

.content .author{
    display: flex;
    font-size: 18px;
    font-style: italic;
    margin-top: 20px;
    margin-right: 10px;
    justify-content: flex-end;
}

.author span:first-child{
    margin: -7px 5px 0 0;
    font-family: monospace;
}

.wrapper .button{
    border-top: 1px solid #ccc;
    padding-top: 10px;
    padding-bottom: 10px;
}

.button .feature{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-left: 530px;
}

.feature button{
    border: none;
    outline: none;
    padding: 10px;
    color: #fff;
    cursor: pointer;
    font-style: 16px;
    border-radius: 30px;
    background: #9A76C5;
    margin-left: 30px;
}

button .loading{
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    opacity: 0.7;
    pointer-events: none;
}

</style>
</head>

<body>

<!-- Navbar -->
    <nav class="shadow-sm">

        <div class="logo"><a href="main.php"><img src="logo1.png" alt="Logo" srcset="" width="150"  height="270"></a></div>
        <div class="title">Minimalist Library</div>

        <ul>
            <li><a href="borrow.php" class="">Borrow</a></li>
            <li><a href="return.php" >Return</a></li>
            <li><a href="book.php">Key In</a></li>
            <li>
                <a href="#">Register</a>
                <ul>
                    <li><a href="member.php">Member</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
        
            </li>
            <li>
              <a href="#">Utilities</a>
              <ul>
                <li><a href="search.php">Search</a></li>
                <li><a href="fine.php">Penalty</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="backup.php">Backup</a></li>
                <li><a href="import.php">Import</a></li>
                <li><a href="idCard.php">Print ID</a></li>

              </ul>
            </li>
            <li><a href="logout.php" onclick="return confirm('Proceed to Logout?');">Logout</a></li>
            
        </ul>

    </nav>

    <div class="container-img">

    <img src="book.svg" alt="book" srcset="" style="width:850px; height:650px">

    </div>

    <!-- Quote Box-->
    <div class="wrapper">
       <header>Quote of the day</header>
       <div class="content">
            <div class="quote-area">
                <i class="fas fa-quote-left"></i>
                <p class="quote">
                    <script>fetch("https://api.quotable.io/random").then(res => res.json()).then(result =>{
        console.log(result);
        quoteText.innerText = result.content;
        authorName.innerText = result.author;
       
    });</script>
    </p>
                <i class="fas fa-quote-right"></i>
            </div>
            <div class="author">
                <span>__</span>
                <span class="name"><script>fetch("https://api.quotable.io/random").then(res => res.json()).then(result =>{
        console.log(result);
       
        authorName.innerText = result.author;
       
    });</script></span>
            </div>
       </div>
       <div class="button">
            <div class="feature">
                <button onclick="randomQuote()">New Quote</button>
            </div>
            
       </div>
    </div>

    <script src="quote.js"></script>

</body>



</html>