<?php 

include('config.php');
require('header.php');

if(isset($_POST['input'])){

    $input = $_POST['input'];

    $search = mysqli_query($conn,"SELECT * FROM book WHERE title LIKE '{$input}%' OR author LIKE '{$input}%'");

    if(mysqli_num_rows($search) > 0){ ?>

        <div class="table-resonsive-sm">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Book ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Added Date</th>
                </tr>
            </thead>

            <tbody>

            <?php 
            
            while($row = mysqli_fetch_array($search)){

                $bookID = $row['bookID'];
                $title = $row['title'];
                $author = $row['author'];
                $publisher = $row['publisher'];
                $type = $row['type'];
                $price = $row['price'];
                $ISBN = $row['ISBN'];
                $datetime = $row['datetime'];

                ?>

                <tr>
                    <td><?php echo $bookID ; ?></td>
                    <td><?php echo $title ; ?></td>
                    <td><?php echo $author ; ?></td>
                    <td><?php echo $publisher ; ?></td>
                    <td><?php echo $type ; ?></td>
                    <td><?php echo $price ; ?></td>
                    <td><?php echo $ISBN ; ?></td>
                    <td><?php echo $datetime ; ?></td>
                </tr>

                

<?php   }
            
            ?>

            </tbody>
        </table>
        </div>

        

  <?php }

    else{

        echo "<h6>No data found</h6>";
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

body{
    background: #f2f2f2;
}

        .table{
            position: relative;
            margin-top: 30px;
            margin-left: 250px;
        }

    </style>
</head>
<body>
    
</body>
</html>