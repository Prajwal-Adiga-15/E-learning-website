<?php
require 'configuration.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
        <style>
            #image{
                margin-left: 18px;
                }
        </style>
    </head>
    <body>
        <div>
        <form action="" method="POST">
            <img src="./project images/Loginicon.png" alt="" width="70" height="70" 
            id="image"><br><br>
            <!--<label for="loginid">Username : </label>-->
            <div>
                <i class="fas fa-user" style="padding: 10px;"><span class="req">*</span>
                </i><input type="email" id="loginid" name="loginid" 
                placeholder="Username" required><br><br>
            </div>
            <!--<label for="password">Password : </label>-->
            <div>
                <i class="fas fa-lock" style="padding: 10px;"><span class="req">*</span>
                </i><input type="password" id="password" class="password" name="password"
                 placeholder="Password" required><br><br>
            </div>
            <div>
                <i class="fas fa-envelope" style="padding: 4px;"></i><a href="">Forgot Password</a>
            </div>
            <input type="submit" name="submit" id="submit" value="Login">
            <input type="reset" name="reset" class="reset" value="Reset"><br><br>
            <a href="signup.html">I don't have an account, <b>SignUp</b></a>
            
        </form>
       </div> 

       <?php
             if(isset($_POST['submit']))
             {
                 $loginid=$_POST['loginid']
                 $password=$_POST['password'];
                 $query = "select * from ulogin WHERE loginid = '$loginid' AND password = '$password'";
                 $query_run = mysqli_query($con,$query);
                 if(mysqli_num_rows($query_run)>0)
                 {
                     session_start();
                     echo '<script type = "text\javascript"> alert("User Logged in") </script>';
                     $_SESSION['loginid'] = $loginid;
                     echo '<script>window.location.href="Usersindex.html"</script>';
                 }
                
                else
                {
                  echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
                
               }

            }
            ?>
        
    </body>
</html>
