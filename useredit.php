<?php

$connection = mysqli_connect("localhost","root","","corephp");

$editid = $_GET['editid'];
if(!isset($_GET['editid']) || empty($_GET['editid']))
{
    header("location:userdisplay.php");
}
$selectq = mysqli_query($connection,"select * from tbl_user where user_id='{$editid}'") or die (mysqli_error($connection));
$editdata = mysqli_fetch_array($selectq);
if($_POST)
{
   $id = $_POST['user_id'];
   $name = $_POST['user_name']; 
   $mobile = $_POST['user_mobile'];
   $email = $_POST['user_email'];
   $password = $_POST['user_password'];
   $city = $_POST['user_city'];
   $hobby = $_POST['user_hobby'];
   $image = $_FILES['user_image']['name'];
   
  $updateq = mysqli_query($connection,"update tbl_user set user_name='{$name}',user_mobile='{$mobile}',user_email='{$email}',user_password='{$password}',user_city='{$city}',user_hobby='{$hobby}',user_image='{$image}' where user_id='{$editid}'")or die (mysqli_error($connection));
  if($updateq)
{
    $fileupload = move_uploaded_file($_FILES['user_image']['tmp_name'],"uploads/".$image);
     if($fileupload){
       echo "<script>alert('record updated'); window.location='userdisplay.php'</script>";

     }
}
}
?>
<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                   
                    <td><input type="hidden"  readonly="true " value="<?php echo $editdata[0];?>"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="user_name" value="<?php echo $editdata[1];?>"></td>
                </tr>
                
                <tr>
                    <td>Mobile</td>
                    <td><input type="number" name="user_mobile" value="<?php echo $editdata[2];?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="user_email" value="<?php echo $editdata[3];?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="user_password" value="<?php echo $editdata[4];?>"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        <select name="user_city">
                <option value="select"></option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="surat">surat</option>
                <option value="morbi">Morbi</option>
                
                    
                        </select>
                    </td>
                    
                </tr>
                <tr>
                    <td>Hobby</td>   
                    <td><input type="checkbox" value="singing" name="user_hobby">Singing
                        <input type="checkbox" value="music" name="user_hobby">Music
                        <input type="checkbox" value="traveling" name="user_hobby">Traveling
                        <input type="checkbox" value="Dancing" name="user_hobby">Dancing</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="user_image"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit">
                </tr>
            </table>
        </form>
    </body>
</html>


        

