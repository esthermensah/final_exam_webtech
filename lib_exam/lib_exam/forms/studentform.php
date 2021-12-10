<?php
require "../php/database_connection_test.php";  

?>

<!-- Form for collecting student data -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css"> 
</head>
<body  class="adminbody" >
<div class="containers">
    <div class="container ">  
        <div class="rightinnerdiv"> 
                  <div id="addperson" class="innerright portion" > 
                        <Button class="all_buttons" >Add New Student</Button>
                            <form action="../php/studentdetails.php" method="post" enctype="multipart/form-data" class="row">
                                
                                <label class="col-2">First Name:</label><input class="ins col-4" type="text" name="fname" required/> <br>

                                

                                <label class="col-2">Middle Name:</label><input class="ins col-4" type="text" name="mname" /></br>
                                <label class="col-2">Last Name:</label><input class="ins col-4" type="text" name="lname"/></br>
                                <label class="col-2">Date Of Birth:</label><input class="ins col-4" type="date" name="DOB"/></br>
                                
                                <label class="col-2">Gender:</label>   
                                <select name="gender" class="ins col-4" id="gender">
                                            <option value="male" name="male">Male</option>
                                            <option value="female" name="female">Female</option>                                    
                                </select>
                                
                                <label class="col-2">Year Group:</label><input class="ins col-4" type="number" name="ygroup" required/></br>  
                                <label class="col-2">Major:</label> 
                                <select name="major" class="ins col-4" id="major">
                                            <option value="CE" name="CE">CE</option>
                                            <option value="ME" name="ME">ME</option>
                                            <option value="EE" name="EE">EE</option>
                                            <option value="BA" name="BA">BA</option>                                    
                                            <option value="CS" name="CS">CS</option>                               
                                </select>
                                    <label class="col-2">Hostel name:</label><input class="ins col-4" type="text" name="hostelname" required/></br>  
                                                                        
                                </select>
                                <label class="col-2">Contact:</label><input class="ins col-4" type="number" name="contact" required/></br>  
                                <label class="col-2">Nationality:</label><input class="ins col-4" type="text" name="nationality"/></br>
                                <label class="col-2">Email:</label><input class="ins col-4" type="text" name="email"/></br>
                                <!-- <div class="form-group col-6"> -->
                                <label class="col-2">Default Password: </label> <input type="pasword" class="form-control col align-self-end" name="pasword" placeholder="Password" id="pasword1" required="required">
                                <!-- </div> -->
                                    <input type="submit" class="ins add col-3 " name="submitstudent" value="ADD"/>    
                                
                            </form>
                  </div>
            </div> 
    
        </div>
</div>       
</body>
</html>