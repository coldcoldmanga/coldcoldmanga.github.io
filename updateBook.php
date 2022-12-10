<?php 

include('config.php');
require('header.php');

if(isset($_POST['input'])){

$bookID = $_POST['input'];

    $search = mysqli_query($conn,"SELECT * FROM book WHERE title LIKE '{$bookID}%' OR bookID LIKE '{$bookID}%' ");

    if(mysqli_num_rows($search) > 0){ ?>

        <table class="table table-striped table-bordered resultMember">
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
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php 
                
                    while($row = mysqli_fetch_assoc($search)){

                        $bookID = $row['bookID'];
                        $title = $row['title'];
                        $author = $row['author'];
                        $publisher = $row['publisher'];
                        $type = $row['type'];
                        $price = $row['price'];
                        $ISBN = $row['ISBN'];
                        $date = $row['datetime'];
                        $status = $row['stats'];

                         ?>

                            <tr>
                            <td><?php echo $bookID;  ?></td>
                            <td><?php echo $title;  ?></td>
                            <td><?php echo $author;  ?></td>
                            <td><?php echo $publisher;  ?></td>
                            <td><?php echo $type;  ?></td>
                            <td><?php echo $price;  ?></td>
                            <td><?php echo $ISBN;  ?></td>
                            <td><?php echo $date;  ?></td>
                            <td><?php echo $status;  ?></td>
                            <td>
                                <form action="editBookProcess.php" method="post" style="display:inline-block;"><input type="hidden" name="bookID" value="<?php echo $bookID; ?>"><button type="submit" name="edit" class="btn btn-secondary">Edit</button></form>
                                <form action="deleteBook.php" method="post" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this book?')"><input type="hidden" name="bookID" value="<?php echo $bookID; ?>"><button type="submit" name="delete" class="btn btn-danger">Delete</button></form>
                            </td>
                        </tr>

                   <?php     }
                    
                
                ?>

            </tbody>
        </table>   

        <?php   }
        
        else{

            echo "<h6>No Data Found</h6>";
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
        margin-left: 150px;
        width: 960px;
    }

    </style>

</head>
<body>

</body>
</html>










