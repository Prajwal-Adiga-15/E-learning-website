<?php
require 'configuration.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        #firstname {
            width: 250px;
            height: 30px;
            background-color: transparent;
            color: white;
        }

        #lastname {
            width: 250px;
            height: 30px;
            background-color: transparent;
            color: white;
        }

        #dob {
            width: 250px;
            height: 30px;
            background-color: transparent;
            color: white;
        }

        #phnumber {
            width: 250px;
            height: 30px;
            background-color: transparent;
            color: white;
        }

        /*p{
                width: 250px;
                height: 30px;
            }*/
    </style>
</head>

<body>
    <form name="signup" action="" method="post">

        <h1>Sign Up</h1>
        <div>
            <i class="fas fa-user" style="padding: 10px;"><span class="req">*</span></i>
            <input type="text" id="firstname" name="firstname"
                placeholder="First Name" required><br><br>
        </div>
        <div>
            <i class="fas fa-user" style="padding: 10px;"><span class="req">*</span></i>
            <input type="text" id="lastname" name="lastname"
                placeholder="Last Name" required><br><br>
        </div>
        <div>
            <i class="fas fa-birthday-cake" style="padding: 10px;"><span class="req">*</span></i> 
            <input type="date" id="dob" name="dob"
                placeholder="Date Of Birth" required><br><br>
        </div>
        <!--<div>
                <p>Gender : <input type="radio" id="male" name="gender"><label for="male">Male</label>
                                <input type="radio" id="female" name="gender"><label for="female">Female</label>
                                <input type="radio" id="others" name="gender"><label for="others">Others</label><br><br></p>
            </div>-->
        <div>
            <i class="fas fa-phone" style="padding: 10px;"><span class="req">*</span></i><input type="tel" name="tel"
                pattern="[0-9]" id="phnumber" maxlength="10" title="Enter 10 Digit Ph no" placeholder="Phone Number"
                required><br><br>
        </div>
        <div>
            <i class="fas fa-envelope" style="padding: 10px;"><span class="req">*</span></i><input type="email" id="loginid" name="loginid"
                placeholder="Email ID" required><br><br>
        </div>
        <div>
            <i class="fas fa-lock" style="padding: 10px;"><span class="req">*</span></i><input type="password" id="password" class="password"
                name="password" placeholder="Password" required><br><br>
        </div>
        <div>
            <i class="fas fa-lock" style="padding: 10px;"><span class="req">*</span></i><input type="password" id="cpassword" class="password"
                onfocusout="pc()" name="confirmpassword" placeholder="Confirm Password" required><br><br>
        </div>
        <input type="submit" name="submit" id="submit" value="SignUp">
        <input type="reset" name="reset" class="reset" value="Reset"><br><br>
        <a href="Login.html">I already have a account</a>
    </form>

    <?php 
                     if(isset($_POST['submit']))
                      {
                      
                      $firstname = $_POST['firstname']
                      $lastname = $_POST['lastname'] 
                      $dob=date("Y-m-d");
                      $tel = $_POST['tel'];
                      $loginid = $_POST['loginid'];
                      $password = $_POST['password'];
                      $confirmpassword = $_POST['confirmpassword'];
                      
                      
                      if($password==$confirmpassword)
                      {
                        
                          $query = "select * from user WHERE tel=$tel";
                          $query_run = mysqli_query($con,$query);
                        
                          if(mysqli_num_rows($query_run)>0)
                          {
                            echo '<script type="text/javascript"> alert("number already registered...") </script>';
                          }
                          
                          else
                          {
                                $query= "insert into user(firstname,lastname,dob,tel,loginid,password) values('$firstname','$lastname','$dob','$tel','$loginid','$password')";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                {
                                    echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
                                    echo '<script>window.location.href="Login.php"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Errorrrrr") </script>' .mysqli_error($con);
                                }
                          }
                        }
                        

                      
                      
                      else
                      {
                        echo '<script type="text/javascript"> alert("Password and Confirm password doesnot match") </script>';
                      }

                      }
                      


                    ?>

</body>
<script>
    function pc() {
        var pas = document.getElementById("password").value;
        var cpas = document.getElementById("cpassword").value;

        if (pas != cpas) {
            alert("Password is not matching");
        }

    }
</script>

</html>