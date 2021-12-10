
<!-- Esther Dzifa Mensah 
Final Exam 
Web Technology
2022 -->



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
    $sql2="delete from `librarystaff` where `bookID`='$theID'";
    $q=mysqli_query($conn,$sql2);
    echo mysqli_error($conn); 

}

 // Funtion  to calculate the fines 
    $fine= "";
    function fines($conn){
        $studentreport = mysqli_query($conn, "SELECT concat(P.fname, ' ', P.middlename, ' ', P.lname) as Fullname, S.yeargroup,
        S.major, P.contact, P.email, SB.dateborrowed, bk.bookID,
        SB.submissiondate, SB.dateReturned, SB.noofborrowedBooks, bk.booktitle,
        case
        when SB.dateReturned>SB.submissiondate then concat(P.fname, ' owes ', 'Ghs', 50*SB.noofborrowedBooks)
        when SB.submissiondate>=SB.dateReturned then concat(P.fname, ' does not owe')
        when SB.dateReturned is null then concat(P.fname, ' has not returned book yet')
        end as Fines
        from Person as P Inner Join Student as S on P.personID=S.studentID
        Inner Join StudentBook as SB on SB.SID=S.studentID 
        Inner Join book as bk on bk.bookID=SB.BID ");
        $fine=mysqli_fetch_all($studentreport,MYSQLI_ASSOC);
        echo mysqli_error($conn);
        return $fine;
    }
     $fine=(fines($conn));



?>
<!-- This page  displays a list of students and their fines based on book borrowed  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fines</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css"> 
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
                <a href="admin.php" class="nav-link active barsbars" aria-current="page" >Home</a>
            </li>
            <li class="nav-item">
                <a href="../forms/borrowbook.php" class="nav-link active barsbars" aria-current="page" >Borrow</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active barsbars" href="">About</a>
            </li>
        </ul>
    </div>
    </div>
</nav>
    <!-- Creating a table -->
<table class="table table-striped table-responsive">
         <tr>
            <th>FullName</th>
            <th>Year Group</th>
            <th>Major</th>
            <th>Book Title</th>
            <th>Date Borrowed</th>
            <th>Submission Date</th>
            <th>Date Returned</th>
            <th>Number Borrowed</th>
            <th>Fines</th> 
        </tr>


        <!-- looping through rows to display list of people -->
        <?php foreach($fine as $q) { ?> 
            <tr>
                <td><?php echo $q['Fullname'] ?></td>
                <td><?php echo $q['yeargroup'] ?></td>
                <td><?php echo $q['major'] ?></td>
                <td><?php echo $q['booktitle'] ?></td>
                <td><?php echo $q['dateborrowed'] ?></td>
                <td><?php echo $q['submissiondate'] ?></td>
                <td><?php echo $q['dateReturned'] ?></td>
                <td><?php echo $q['noofborrowedBooks'] ?></td>
                <td><?php echo $q['Fines'] ?></td>

  
                <td>
                    <form action="" method="post" onSubmit="onDelete(event)">
                        <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                        <input type="text" name="ID" value="<?php echo $q["bookID"] ?>" hidden/>  
                    </form>
                </td> 
                
            </tr>
        <?php } ?>

    </table>
    <script src="../javascript/delete.js"></script>
    


</body>
</html>