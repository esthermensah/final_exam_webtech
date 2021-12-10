
<!-- Esther Dzifa Mensah 
Final Exam 
Web Technology
2022 -->

<?php  
require __DIR__ ."/database_connection_test.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/styles.css"> 
    </head>
    <body class="adminbody">
        <!-- <div class="adminbody">  -->
            <div class="container">
                <div class="innerdiv">
                    <!-- Display for the main tabs on the admin page -->
                    <div class="leftinnerdiv">
                        <Button class="all_buttons"> ADMIN DASHBOARD</Button>
                        <a href="./book_details.php">  <Button class="all_buttons" > Book List</Button>
                        <a href="./studentdetails.php">  <Button class="all_buttons" > Student List</Button>
                        <a href="./staffdetails.php">  <Button class="all_buttons" > Staff List</Button>
                    
                        <a href="fines.php"><Button class="all_buttons" > Track Books</Button>
                        
                        <a href="login.php"><Button class="all_buttons" > Logout</Button></a>
                    </div>

                        

                </div>
            </div>

        <!-- </div>  -->
    </body>
</html>

