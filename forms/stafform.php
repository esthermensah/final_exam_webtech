
<!-- Form for collecting staff data -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                            <Button class="all_buttons" >Add New Staff</Button>
                                
                            <form class="row container m-auto"  action="../php/staffdetails.php" method="post">
                                <div class="col-6 d-flex flex-column">
                                    <label for="fname">First Name:</label>
                                    <input type="text" name="fname" id="fname" onInput="validateFname()"/>
                                    <span id="error"></span>
                                </div>
                                
                                <div class="col-6 d-flex flex-column">
                                    <label for="Mname">Middle Name:</label>
                                    <input type="text" id="Mname" name="Mname"  onInput="validateMname()">
                                    <span id="Merror"></span>
                                </div>
                                
                                <div class="col-6 d-flex flex-column">
                                    <label for="lname">Last name:</label>
                                    <input type="text" id="lname" name="lname"  onInput="validateLname()">
                                    <span id="lerror"></span>
                                </div>
                                
                                <div class="col-6 d-flex flex-column">
                                    <label for="DOB">Date of Birth:</label>
                                    <input type="date" id="DOB" name="DOB" onInput="validateDate()" ><br>
                                    <span id="derror"></span>
                                </div>
                                    
                                <div class="col-12">
                                    <label>Gender:</label>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female">Female</label>
                                </div>
                                    
                                <div class="col-6 d-flex flex-column">
                                        <label for="staffposition">Position:</label>
                                        <input type="text" id="staffposition" name="staffposition" onInput="validatePos()" ><br>
                                        <span id="poserror"></span>
                                </div>       
                                
                                <div class="col-6 d-flex flex-column">
                                    <label for="SSN">SSN:</label>
                                    <input type="number" id="SSN" name="SSN" onInput="validateSSN()"><br>
                                    <span id="ssnerror"></span>
                                </div>
                                
                                <div class="col-6 d-flex flex-column">
                                    <label for="salary">Salary:</label>
                                    <input type="number" id="salary" name="salary" onInput="validateS()"><br>
                                    <span id="Serror"></span>
                                </div>

                                <div class="col-6 d-flex flex-column">
                                    <label for="contact">Contact:</label>
                                    <input type="number" id="contact" name="contact" onInput="validateCon()"><br>
                                    <span id="conerror"></span>
                                </div>
                                    
                                <div class="col-6 d-flex flex-column">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" id="nationality" name="nationality" onInput="validateN()" >
                                    <span id="nerror"></span>
                                </div>    

                                <div class="col-6 d-flex flex-column">
                                    <label for="email">Email:</label>
                                    <input type="text" id="email" name="email" onInput="validateE()"><br>
                                    <span id="crerror"></span>

                                </div>
                                
                                <div class="col-12 d-flex flex-column">
                                    <label for="pasword">Default Password: </label> 
                                    <input type="pasword" name="pasword" placeholder="Password" id="pasword1"></br>
                                </div>
                                
                                <p>
                                    <div class="col-4 d-flex flex-column">
                                        <input class="submit-button" type="submit"  name="submitstaff" value="ADD"/>   
                                    </div>
                                </p>

    
                                
                            </form>
                        </div>
            </div>
        </div></br>
    </div>
    <script src="../javascript/formvalidation.js"></script>
</body>
</html>