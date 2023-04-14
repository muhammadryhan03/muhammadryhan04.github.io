<?php
require "config.php";
// $db = new DataBase();
// if (isset($_POST['submit']) && isset($_POST['userlog']) && isset($_POST['passlog'])) {
//     if ($db->dbConnect()) {
//         if ($db->logIn("user", $_POST['userlog'], $_POST['passlog'])) {
//             // echo "Login Success";
//             echo "<script type='text/javascript'>
//                     alert('Login berhasil ');
//                     window.location='http://localhost/tugas/Halaman_Utama/main-page.php';
//                   </script>";
//         //   header("location:./dashboard/main-page.php");
//     } else {  
//         echo "<script type='text/javascript'> 
//                 alert('Username atau Password Salah '); 
//                 window.location='http://localhost/tugas/Halaman_Utama/main-page.php';
//                 </script>";
//     } 
    
//     //   else {
//     //      echo "<script type='text/javascript'> alert('Error: Database connection'); </script> ";

//     //  }
    
//     }else {
//     echo "All fields are required";
//         }
//     }
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form      
    
    $myusername = mysqli_real_escape_string($conn,$_POST['userlog']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['passlog']); 
    
    $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count == 1) {
    //    session_register("myusername");
       $_SESSION['login_user'] = $myusername;
       echo "<script type='text/javascript'> alert('Login berhasil'); </script> ";
       header("location: http://localhost/tugas/Halaman_Utama/main-page.php");

    }else {
       $error = "Your Login Name or Password is invalid";
       echo "<script type='text/javascript'> alert('Login gagal'); </script> ";

    }
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>GameStore Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
      *:before,
      *:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-attachment: fixed;
    background-image: url(Background\ Login.jpg);
    background-size:120%;
}

form{
    height: 520px;
    width: 400px;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}

.login{
    margin-top: 30px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 15px;
    text-align: center;
}
a{
    color: #080710;
    text-decoration: none;
}

.register{
    color:#ffffff;
    font-size: 12px;
}
    </style>
</head>
<body>
    <form action="#" method="post">
        <h3>Login</h3>

        <label for="username">Username</label>
        <input type="text" name="userlog" placeholder="Email or Phone" id="username">

        <label for="password">Password</label>
        <input type="password" name="passlog" placeholder="Password" id="password">
        
        <input type="submit" name="submit" class="login">
        <a href="./signup.php" class="register"> Belum Punya akun? Register Sekarang </a>
    </form>
</body>
</html>
