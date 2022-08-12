<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table thead th{
            text-align: center;
            border: 2px solid black;
            font-weight: bold;
          
        }
        table{
           
            /* width:40vw ; */
            width:80vw ;
            margin: 5% auto;
        }
        table tbody td{
            text-align: center;
            padding: 10px;
            border:2px solid black;
        }
    
    </style>
</head>
<body>
    <?php
    include "../nav/nav.php";
    include "../basic/dbconnect.php";
    if (isset($_SESSION['adminloggedin'])){
        $sql="SELECT * FROM `rooms`";
    $result=$conn->query($sql);
    $num=$result->num_rows;
    if($num<1){
       echo "<script>alert('no data Found')</script>";
    //    echo "<h1><a href='../rooms/roomadd.php'>add data to continue</a></h1>";
    header("location:../basic/index.php");
    }
    else{
    ?>
    <table>
        <thead>
            <th>Sn</th>
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Added By</th>
            <th>Booking</th>
            
            <th>Unbook</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php 
            $sn=0;
            while($row=mysqli_fetch_assoc($result)){
                $sn=$sn+1;

          
            ?>
            <tr>
                <td><?php echo $sn ?></td>                         
                <td><?php echo $row['title']?></td>
                <td><img src="<?php echo "../rooms/".$row['image']; ?>"style="height:120px" width="120px"></td>
                <td><?php echo $row['price']?></td>
                <td style="width:10vw"><?php echo $row['description']?></td>
                <td><?php echo $row['category']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['book']?></td>
                <td>
                <form action="/roomrentsystem/book/unbook.php" method="post">
                    <input type="hidden" name="unbook_id" value="<?php echo $row['id']?>">
                 <input type="submit" name="unbook" value="unbook" class="btn btn-primary" onclick="return unbook()"> 
                </form>
                </td>
                <td>
                <form action="../rooms/roomdelete.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                 <input type="submit" name="delete" value="Delete" class="btn btn-danger" onclick="return check()"> 
                </form>
                </td>
                </tr>
                <?php
                       }  }}
                       else{
                        echo "<script>alert('you are not logged in')</script>";
                        echo "<h1><a href='../login/loginform.php'>Login to continue</a></h1>";
                       }
                ?>
        </tbody>
    </table>
    <script>
            function unbook(){
            alert('do you want to unbook this data?');
        }
        function check(){
            alert('do you want to delete this data?');
        }
        </script>
</body>

</html>