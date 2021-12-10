
<!-- Esther Dzifa Mensah 
Final Exam 
Web Technology
2022 -->


<?php
require __DIR__ ."/database_connection_test.php";  
    $data = null;
    //Function to generate a  report
    $thereport= "";
    function report($conn){
        $studentreport = mysqli_query($conn, "SELECT concat(P.fname, ' ', P.middlename, ' ', P.lname) 
        as Fullname, S.yeargroup, S.major, B.booktitle,
        concat(A.fname, ' ', A.middlename, ' ', A.lname) as Author_Name, SB.dateborrowed, S.studentID,
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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/tables.css"> 
</head>
<body>
</html>
    <!-- This table displays a summary of the borrowed books and other details -->
<table class="table table-striped table-responsive">
         <tr>
            <th>FullName</th>
            <th>yeargroup</th>
            <th>major</th>
            <th>booktitle</th>
            <th>Author Name</th>
            <th>dateborrowed</th>
            <th>submissiondate</th>
            <th>dateReturned</th>
            <th>noofborrowedBooks</th> 
        </tr>


        <!-- looping through rows to display list of people -->
        <?php foreach($thereport as $q) { ?> 
            <tr>
                <td><?php echo $q['Fullname'] ?></td>
                <td><?php echo $q['yeargroup'] ?></td>
                <td><?php echo $q['major'] ?></td>
                <td><?php echo $q['booktitle'] ?></td>
                <td><?php echo $q['Author_Name'] ?></td>
                <td><?php echo $q['dateborrowed'] ?></td>
                <td><?php echo $q['submissiondate'] ?></td>
                <td><?php echo $q['dateReturned'] ?></td>
                <td><?php echo $q['noofborrowedBooks'] ?></td>             
                <td>
                    <form action="" method="post" class="form-submit" onSubmit="onEdit(event)">
                        <input class="btn edit-color" type = "submit" name="Edit"  value="Edit"/>
                        <input type="text" name="ID" value="<?php echo $q["studentID"] ?>" hidden/>  
                    </form>
                </td>
                
            </tr>
        <?php } ?>

    </table>
    <script src="../javascript/delete.js"></script>
    


</body>
</html>