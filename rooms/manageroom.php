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
 
    if (isset($_SESSION['email'])){
          
       
      
    $email=$_SESSION['email'];
        $sql="SELECT * FROM `rooms` WHERE `email`='$email'";
    $result=$conn->query($sql);
    $num=$result->num_rows;
    if($num<1){
        header('refresh:0.1;url=../rooms/roomadd.php');
       echo "<script>alert('no data inserted with this account')</script>";
    //    echo "<h1><a href='../rooms/roomadd.php'>add data to continue</a></h1>";
    }
    else{
    ?>
        <h3 class="text-center my-4">welcome <?php echo $email ?> </h3>
    <table>
        <thead>
            <th>Sn</th>
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Booking</th>
            <th>Booked By</th>
            <th>Edit</th>
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
                <td><?php echo $row['description']?></td>
                <td><?php echo $row['category']?></td>
                <td><?php echo $row['book']?></td>
               <?php
               if( $row['book']=="booked"){
                echo '<td>'.$row["booked_email"].'</td>';
               }
               else{
                echo '<td>Not Booked Yet</td>';
                
               }
                ?>

                <td>
                <form action="roomupdate.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                 <input type="submit" name="edit" value="Edit" class="btn btn-success">
                </form>
                </td>
                <td>
                <form action="/roomrentsystem/book/unbook.php" method="post">
                    <input type="hidden" name="unbook_id" value="<?php echo $row['id']?>">
                 <input type="submit" name="unbook" value="unbook" class="btn btn-primary" onclick="return unbook()"> 
                </form>
                </td>
                <td>
                <form action="roomdelete.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                 <input type="submit" name="delete" value="Delete" class="btn btn-danger" onclick="return check()"> 
                </form>
                </td>
                </tr>
                <?php
                       }  }}
                       else{  if($_SESSION['adminloggedin']==false){
                        
                        header('refresh:0.1;url=../login/loginform.php');
                           echo "<script>alert('you are not logged in')</script>";
                        //    echo "<h1><a href='../login/loginform.php'>Login to continue</a></h1>";
                        }
                        else{
                            header("location:../admin/admin.php");
                        }
                       }
                ?>
        </tbody>
    </table>
    <script>
        function check(){
            alert('do you want to delete this data?');
        }
        function unbook(){
            alert('do you want to delete this data?');
        }
        </script>
       
</body>

</html>