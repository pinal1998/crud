<?php

$connection = mysqli_connect("localhost","root","","corephp");

if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $deleteq = mysqli_query($connection,"delete from tbl_user where user_id='{$did}'") or die (mysqli_error($connection));
    if($deleteq){
        header("location:userdisplay.php");
    }
}    
   $selectq = mysqli_query($connection,"select * from tbl_user")or die (mysqli_error($connection));
    
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>User Id</th>";
    echo "<th>User name</th>";
    echo "<th>User Mobile</th>";
    echo "<th>User Email</th>";
    echo "<th>User Password</th>";
    echo "<th>User city</th>";
    echo "<th>User Image</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    while($row=mysqli_fetch_array($selectq))
    {
        echo "<tr>";
        echo "<td>{$row['user_id']}</td>
              <td>{$row['user_name']}</td>
              <td>{$row['user_mobile']}</td>
              <td>{$row['user_email']}</td>
              <td>{$row['user_password']}</td>
              <td>{$row['user_city']}</td>
              <td><img  style ='width:100px;' src ='uploads/{$row['user_image']}'>";
       echo "<td> <a href ='useredit.php?editid=$row[0]'> Edit </a> | <a href='userdisplaydisplay.php?did=$row[0]'>Delete</a></td>";
       
}
echo "</table>" ;

?>


              
        
    
   
 
    
    
