
<!-- Esther Dzifa Mensah 
Final Exam 
Web Technology
2022 -->



<?php  
    require __DIR__ ."/database_connection_test.php";  
    $data=null;
  $theID = "";

  $deleteresult ="";
  if(isset($_POST['Delete'])){
      $theID=$_POST['ID'];
    $deleteresult =  delete($theID, $conn);

  }

  function delete($theID, $conn){
      // deletes from a table in the database 
        $sql2="delete from `student` where `studentID`='$theID'";
        $q=mysqli_query($conn,$sql2);
        echo mysqli_error($conn); 

  }
//   Collecting data after form is submitted
  if(isset($_POST["submitstudent"])) {
    $fname=$_POST['fname'];
    $middlename=$_POST['mname'];
    $lname=$_POST['lname'];
    $DOB=$_POST['DOB'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $yeargroup=$_POST['ygroup'];
    $major=$_POST['major'];
    $hostelname=$_POST['hostelname'];
    $contact=$_POST['contact'];
    $nationality=$_POST['nationality'];
    $email=$_POST['email'];
    $pasword = $_POST['pasword'];

// Inserting into person table
    $insertperson1 ="INSERT INTO `person` (`fname`,`middlename`,`lname`, `DOB`, `gender`, `contact`, `nationality`, `email`,`pasword`) VALUES (";
    $insertperson2=" '$fname', '$middlename', '$lname', '$DOB', '$gender', '$contact', '$nationality', '$email', '$pasword')";
    $insertperson = $insertperson1.$insertperson2;
    $personquery= mysqli_query($conn,$insertperson);
    echo mysqli_error($conn);  

    
    $studentID=null;
    if($personquery){
            $studentID=mysqli_insert_id($conn);
    }

    // Inserting into student table  
    $insertstudent1 ="INSERT INTO `student` (`studentID`,`yeargroup`,`major`,`hostelname`) VALUES (";
    $insertstudent2="'$studentID', '$yeargroup', '$major', '$hostelname')";
    $insertstudent = $insertstudent1.$insertstudent2;
    $studentquery= mysqli_query($conn,$insertstudent);
    echo mysqli_error($conn);  
}

// Listing the students
    function listing($conn){
        $stuinfo = mysqli_query($conn, "SELECT concat(P.fname, ' ', P.middlename, ' ', P.lname) as FullName, P.*, S.major, 
        S.studentID, S.yeargroup, S.hostelname
        from student as S Inner Join Person as P on S.studentID=P.personID
        order by P.fname asc");
        $data=mysqli_fetch_all($stuinfo,MYSQLI_ASSOC);
        echo mysqli_error($conn);
        return $data;
    }
    $data=(listing($conn));

  //function to delete a student from the database
  // ID from form




  
  $searchresult = [];
  if(isset($_GET['searchbar'])){ 
      $input = $_GET['searchbar'] ;
      $searchresult = array_map("reduceArray", selection($input, $conn));
  } 
  //function to reduce array to a single array
  function reduceArray($array) {
      return $array[0];   
  }
  //function to search for a person
  function selection($theword, $conn){
      //selects from  a database based on student name
      $theword =trim($theword);
      $sql2 = mysqli_query($conn, "SELECT concat(P.fname, ' ', P.middlename, ' ', P.lname) as FullName from `person` as P where concat(P.fname, ' ', P.middlename, ' ', P.lname) LIKE '%$theword%'");
      $searchquery=mysqli_fetch_all($sql2);
      echo mysqli_error($conn);  
      return $searchquery; 
  }


 ?>


<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Student List</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <link rel="stylesheet" href="../css/styles.css"> 
 </head>
 <body >
 </div>
  <!-- navbar design -->
  <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
    <div class="container-fluid">

     <a class="navbar-brand " href="admin.php"><img src="../images/new2.gif" width="150" height="150"></a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse " id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 bars" >
            <form action="" method="get" class="search">
                <li>          
                    <input type="text" name= "searchbar" class="ins"  placeholder="Search..">           
                </li>
            </form>
            <li class="nav-item">
                <a href="admin.php" class="nav-link active barsbars" aria-current="page" >Back</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link active barsbars" href="../forms/studentform.php">Add Student</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link active barsbars" href="">About</a>
            </li>
        </ul>
    </div>
    </div>
</nav> 

       <table class="table table-striped">
         <tr>
            <th>Full Name </th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Major </th>
            <th>Year Group</th>
            <th>Name of Hostel</th>
            <th>Contact</th>
            <th>Nationality</th>
            <th>email</th>

            
        </tr>


        <!-- looping through rows to display list of people -->
        <?php foreach($data as $q) { ?> 
            <tr>
            <?php if (in_array($q['FullName'],$searchresult)) { ?> 
                    <td class="high"><?php echo $q['FullName'] ?></td>
                    <td class="high"><?php echo $q['DOB'] ?></td>
                    <td class="high"><?php echo $q['gender'] ?></td>
                    <td class="high"><?php echo $q['major'] ?></td>
                    <td class="high"><?php echo $q['yeargroup'] ?></td>
                    <td class="high"><?php echo $q['hostelname'] ?></td>
                    <td class="high"><?php echo $q['contact'] ?></td>
                    <td class="high"><?php echo $q['nationality'] ?></td>
                    <td class="high"><?php echo $q['email'] ?></td>
                <?php } else { ?>
                    <td ><?php echo $q['FullName'] ?></td>
                    <td ><?php echo $q['DOB'] ?></td>
                    <td ><?php echo $q['gender'] ?></td>
                    <td ><?php echo $q['major'] ?></td>
                    <td ><?php echo $q['yeargroup'] ?></td>
                    <td ><?php echo $q['hostelname'] ?></td>
                    <td ><?php echo $q['contact'] ?></td>
                    <td ><?php echo $q['nationality'] ?></td>
                    <td ><?php echo $q['email'] ?></td>
                <?php } ?>

           
                 <td>
                    <form action="" method="post" class="form-submit" onSubmit="onEdit(event)">
                        <input class="btn edit-color" type = "submit" name="Edit"  value="Edit"/>
                        <input type="text" name="ID" value="<?php echo $q["studentID"] ?>" hidden/>  
                    </form>
                </td> 
                <td>
                    <form action="" method="post" onSubmit="onDelete(event)">
                        <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                        <input type="text" name="ID" value="<?php echo $q["studentID"] ?>" hidden/>  
                    </form>
                </td> 
            </tr>
        <?php } ?>
    </table>
    <script src="../javascript/delete.js"></script>
 </body>
 </html>

