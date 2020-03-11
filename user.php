<?php

$connection = mysqli_connect("localhost","root","","corephp");

if($_POST)
{
   $name = $_POST['user_name']; 
   $mobile = $_POST['user_mobile'];
   $email = $_POST['user_email'];
   $password = $_POST['user_password'];
   $city = $_POST['user_city'];
   $hobby = $_POST['user_hobby'];
   $image = $_FILES['user_image']['name'];
   
   $insertq = mysqli_query($connection,"insert into tbl_user(user_name,user_mobile,user_email,user_password,user_city,user_hobby,user_image)values
           ('{$name}','{$mobile}','{$email}','{$password}','{$city}','{$hobby}','{$image}')") or die (mysqli_error($connection));

if($insertq)
{
    $fileupload = move_uploaded_file($_FILES['user_image']['tmp_name'],"uploads/".$image);
     if($fileupload){
         echo "<script>alert('user insert')</script>";
     }
}
}
?>
<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="user_name"></td>
                </tr>
                
                <tr>
                    <td>Mobile</td>
                    <td><input type="number" name="user_mobile"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="user_email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="user_password"></td>
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

