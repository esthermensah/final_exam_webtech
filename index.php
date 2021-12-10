
<!-- Esther Dzifa Mensah 
Final Exam 
Web Technology
2022 -->



<?php
    //session_start();

    require __DIR__ ."./php/credentials.php";

    $error = "";
    if (isset($_POST['submit']))  {
        $conn = new mysqli(servername,username,password,dbname);


        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
            echo "Connection failed";
        }
        else {

            //this will have to change coz I'm not using sign up
            $Email = $_POST["email"];
            $Password=$_POST["password"];
            // need a table for this in data base 
            $stmt = $conn -> prepare("SELECT * FROM `person` WHERE `email`=? AND `pasword`=?");
            $stmt -> bind_param("ss",$Email,$Password);
            $user = null;

            $stmt->execute();

            $result = $stmt->get_result();

            //there will be two options for this coz i have admiin and student interface
            if($result -> fetch_assoc()) {
                header( 'Location: ./php/admin.php');

            }
            else {
                $error = " Please Check your credentials and Try again!!";
            }


        }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./css/login.css">
    </head>

    <body login-body>
      
        <div class="login border">
            <h1>Admin Login</h1>
            <form method="post" name="form" id="form" action="">
                <input type="text" name="email" placeholder="Your Email *" required="required"/>
                <input type="password" name="password" placeholder="Password" required="required" />
                <button name="submit" type="submit" class="btn btn-primary btn-block btn-large">Login</button>
            </form>
        </div>  
    

        <?php if ($error){ ?>
            <p style="color:red;width:250px;margin: 10px auto;" ><?php echo $error ?> </p> 

        <?php }?>   

            <script src= "../javascript/passwordvalidation.js"></script>
            <script src= "../javascript/validation_signup.js"></script>
        </div>
    </body>
</html>