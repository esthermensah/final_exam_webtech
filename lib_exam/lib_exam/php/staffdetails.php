<?php  
require __DIR__ ."/database_connection_test.php";  
$data=null;
$theID = "";

    //function to delete a student from the database
    // ID from form
    $deleteresult ="";
    if(isset($_POST['Delete'])){
    $theID=$_POST['ID'];
    $deleteresult =  delete($theID, $conn);

    }

function delete($theID, $conn){
    // deletes from a table in the database 
    $sql2="delete from `librarystaff` where `staffID`='$theID'";
    $q=mysqli_query($conn,$sql2);
    echo mysqli_error($conn); 

}

function listing($conn){
    $staffinfo = mysqli_query($conn, "SELECT concat(P.fname, ' ', P.middlename, ' ', P.lname) as FullName, P.*, LS.staffPosition, LS.SSN, LS.salary, LS.staffID
    from LibraryStaff as LS Inner Join Person as P on LS.staffID=P.personID
    order by P.fname asc");
    $data=mysqli_fetch_all($staffinfo,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;
}
 $data=(listing($conn));



    $thereport= "";
    function report($conn){
        $studentreport = mysqli_query($conn, "SELECT concat(P.fname, ' ', P.middlename, ' ', P.lname) as Fullname, S.yeargroup, S.major, B.booktitle, concat(A.fname, ' ', A.middlename, ' ', A.lname) as Author_Name, SB.dateborrowed, 
        SB.submissiondate, SB.dateReturned, SB.noofborrowedBooks
        from Person as P Inner Join Student as S on P.personID=S.studentID
        Inner Join StudentBook as SB on SB.SID=S.studentID
        Inner Join Book as B on B.bookID=SB.BID
        Inner Join BookAuthor as BA on BA.baID=BID
        Inner Join Author as A on BA.baID=A.authorID");
        $thereport=mysqli_fetch_all($studentreport,MYSQLI_ASSOC);
        echo mysqli_error($conn);
        return $thereport;
    }
     $thereport=(report($conn));


     if(isset($_POST["submitstaff"])) {
        $fname=$_POST['fname'];
        $middlename=$_POST['mname'];
        $lname=$_POST['lname'];
        $DOB=$_POST['DOB'];
        $gender=$_POST['gender'];
        $contact=$_POST['contact'];
        $nationality=$_POST['nationality'];
        $email=$_POST['email'];
        $staffposition= $_POST['staffposition'];
        $SSN= $_POST['SSN'];
        $salary = $_POST['salary'];
        $pasword = $_POST['pasword'];

   
        $insertperson1 ="INSERT INTO `person` (`fname`,`middlename`,`lname`, `DOB`, `gender`, `contact`, `nationality`, `email`,`pasword`) VALUES (";
        $insertperson2=" '$fname', '$middlename', '$lname', '$DOB', '$gender', '$contact', '$nationality', '$email', '$pasword')";
        $insertperson = $insertperson1.$insertperson2;
        $personquery= mysqli_query($conn,$insertperson);
        echo mysqli_error($conn);  

        
        $staffID=null;
        if($personquery){
                $staffID=mysqli_insert_id($conn);
                echo "success";
        }else{
            echo "person error".mysqli_error($conn);
        }

        $insertstaff1 ="INSERT INTO `librarystaff` (`staffID`,`StaffPosition`,`SSN`,`salary`) VALUES (";
        $insertstaff2="'$staffID', '$staffposition', '$SSN', '$salary')";
        $insertstaff = $insertstaff1.$insertstaff2;
        $staffquery= mysqli_query($conn,$insertstaff);
        
        // if($staffquery){
        //         echo "success";
        // }else{
        //     echo "staff error".mysqli_error($conn);
        // }
        
}






function adminLogin($t1, $t2) {
    $conn = new mysqli(servername,username,password,dbname);
            if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
            echo "Connection failed";
    }
    else {
            $Email = $_POST["email"];
            $Password=$_POST["pasword"];

            $stmt = $conn -> prepare("select * from person where email=? and pasword=?");
            $stmt -> bind_param("ss",$Email,$Password);
            $user = null;
            $stmt->execute();
            $result = $stmt->get_result();

            if($result -> fetch_all(MYSQLI_ASSOC)) {
                    header( 'Location: admin.php');

            }
            else {
                    $error = " Please Check your credentials and Try again!!";
            }
    }

}



if(isset($_POST["staff_submit"])) {
    $t1= $_POST["email"];
    $t2= $_POST["password"];
    adminLogin($t1, $t2);
}

?>


<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Staff List</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <link rel="stylesheet" href="../css/tables.css"> 
 </head>
<body> 

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
                <a class="nav-link active barsbars" href="">Add Staff</a>
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
            <th>FullName</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Position </th>
            <th>SSN</th>
            <th>Salary</th>
            <th>Contact</th>
            <th>Nationality</th>
            <th>email</th> 
        </tr>


        <!-- looping through rows to display list of people -->
        <?php foreach($data as $q) { ?> 
            <tr>
                <td><?php echo $q['FullName'] ?></td>
                <td><?php echo $q['DOB'] ?></td>
                <td><?php echo $q['gender'] ?></td>
                <td><?php echo $q['staffPosition'] ?></td>
                <td><?php echo $q['SSN'] ?></td>
                <td><?php echo $q['salary'] ?></td>
                <td><?php echo $q['contact'] ?></td>
                <td><?php echo $q['nationality'] ?></td>
                <td><?php echo $q['email'] ?></td>             
                <td>
                    <form action="" method="post" class="form-submit" onSubmit="onEdit(event)">
                        <input class="btn edit-color" type = "submit" name="Edit"  value="Edit"/>
                        <input type="text" name="ID" value="<?php echo $q["staffID"] ?>" hidden/>  
                    </form>
                </td>
                <td>
                    <form action="" method="post" onSubmit="onDelete(event)">
                        <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                        <input type="text" name="ID" value="<?php echo $q["staffID"] ?>" hidden/>  
                    </form>
                </td> 
            </tr>
        <?php } ?>

    </table>
    <script src="../javascript/delete.js"></script>
    
</body>
</html>

