
<!-- Esther Dzifa Mensah 
Final Exam 
Web Technology
2022 -->



<?php  
require __DIR__ ."/database_connection_test.php";  
$data=null;
$theID = "";


//updating the details of a book
if(isset($_POST['Okaybutton'])){
    $booktitle=$_POST['title'];
    $ISBN=$_POST['ISBN'];
    $publishDate=$_POST['pubdate'];
    $publisher=$_POST['pub'];
    $noOfCopies=$_POST['number'];
    $genreType=$_POST['gtype'];
    $genreCategory=$_POST['gcat'];
    $author=$_POST['author'];
    $genreID=$_POST['genreID'];
    $bookID=$_POST['bookID'];
    $authorID=$_POST['authorID'];

    $updategenre = "UPDATE `genre` set `genreType`= '$genreType', `genreCategory`= '$genreCategory' where `genreID`='$genreID'";
    $genreinfoupdate = mysqli_query($conn,$updategenre);
    // if($genreinfoupdate){
    //     echo "success";
    // }else{
    //     echo "genre error".mysqli_error($conn);
    // }

    $updatebook = "UPDATE `book` set `booktitle`= '$booktitle', `ISBN`= '$ISBN', `publisher`= '$publisher', `publishDate`= '$publishDate', `noOfCopies`= '$noOfCopies' where `bookID`='$bookID'";
    $bookinfoupdate = mysqli_query($conn,$updatebook);
    // if($bookinfoupdate){
    //     echo "success";
    // }else{
    //     echo "book error".mysqli_error($conn);
    // }

    $updateauthor = "UPDATE `author` set `fname`= '$author' where `authorID`='$authorID'";
    $authorinfoupdate = mysqli_query($conn,$updateauthor);
    // if($authorinfoupdate){
    //     echo "success";
    // }else{
    //     echo "author error".mysqli_error($conn);
    // }


}

 //function to delete a student from the database
// ID from form
$deleteresult ="";
if(isset($_POST['Delete'])){
    $theID=$_POST['ID'];
    $deleteresult =  delete($theID, $conn);

}

function delete($theID, $conn){
// deletes from a table in the database 
    $sql2="delete from `book` where `bookID`='$theID'";
    $q=mysqli_query($conn,$sql2);
    echo mysqli_error($conn); 
}

function listing($conn){
    $bookinfo = mysqli_query($conn, "SELECT concat(A.fname, ' ', A.middlename, ' ', A.lname) as author, G.genreType, 
    B.bookID, B.publisher, G.genreCategory, B.booktitle, Sh.*
    from Shelf as Sh Inner Join Genre as G on Sh.shelfno=G.genreID
    Inner Join Book as B on B.bookID=G.genreID
    Inner Join BookAuthor as BA on BA.baID=B.bookID
    Inner Join Author as A on A.authorID=BA.authID
    order by Sh.shelfno asc");
    $data=mysqli_fetch_all($bookinfo,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;
}
 $data=(listing($conn));

//searching for a book
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
    //selects from  a database based on student ID
    $theword =trim($theword);
    $sql2 = mysqli_query($conn, "SELECT b.booktitle from `book` as b where b.booktitle LIKE '%$theword%'");
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
     <title>Book List</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <link rel="stylesheet" href="../css/styles.css"> 
 </head>
 <body>

 <div class="popup">
    <div class="containers">
        <div class="container">
            <div class="rightinnerdiv">
                <Button class="all_buttons" >Edit Book Entry</Button>
                <form id="popup-form" class="row container m-auto form-background popup-form"  action="book_details.php" method="post">
                
                    <label class="col-2">Book Title:</label> <input class="ins col-4" type="text" name="title"/>
                                            
                    <label class="col-2">Author</label><input class="ins col-4" type="text" name="author"/>
                    <label class="col-2">ISBN:</label><input class="ins col-4" type="text" name="ISBN"/>
                    <label class="col-2">Publication Date</label><input class="ins col-4" type="date" name="pubdate"/>
                    <label class="col-2">Publisher</label><input class="ins col-4" type="text" name="pub"/>


                    <label class="col-2">Genre Type</label>
                        <select name="gtype" class="ins col-4" id="genre">
                            <option value="Love" name="Love">Love</option>
                            <option value="Tragedy" name="Tragedy">Tragedy</option>
                            <option value="comedy" name="comedy">Comedy</option>
                            <option value="Science Fiction" name="Science Fiction">Science Fiction</option>
                            <option value="Action" name="Action">Action</option>
                            <option value="Adventure" name="Adventure">Adventure</option>
                        </select>

                    <label class="col-2">Genre Category</label>
                    <input class="ins col-4" type="number" name="gcat"/></br>

                    <label class="col-2">Number of copies</label>
                    <input class="ins col-4" type="number" name="number"/></br>                              

                    <input type="hidden" name="genreID">
                    <input type="hidden" name="bookID">
                    <input type="hidden" name="authorID">
                    

                    <center>
                        <div class=" col-2 d-flex">
                            <input class="btn edit-color me-2" type="submit"  name="Okaybutton" value="Okay">
                            <button class="ms-2 btn btn-danger" onClick="closePopup(event)">Cancel</button>
                        </div>
                    </center>

                </form>
            </div>
        </div>
    </div>

  </div>
     
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
                <a class="nav-link active barsbars" href="../forms/bookform.php">Add Book</a>
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
            <th>Book Title </th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Genre Type</th>
            <th>Category</th>
          
        </tr>


        <!-- looping through rows to retrieve the boarding house info of students -->
        <?php foreach($data as $q) { ?> 
            <tr>
            <?php if (in_array($q['booktitle'],$searchresult)) { ?>
                    <td class="highlight"><?php echo $q['booktitle'] ?></td>
                    <td class="highlight"><?php echo $q['author'] ?></td>
                    <td class="highlight"><?php echo $q['publisher'] ?></td>
                    <td class="highlight"><?php echo $q['genreType'] ?></td>
                    <td class="highlight"><?php echo $q['genreCategory'] ?></td>
                <?php } else { ?>
                    <td><?php echo $q['booktitle'] ?></td>
                    <td><?php echo $q['author'] ?></td>
                    <td><?php echo $q['publisher'] ?></td>
                    <td><?php echo $q['genreType'] ?></td>
                    <td><?php echo $q['genreCategory'] ?></td>
                <?php } ?>
                
                <td>
                    <form action="" method="post" class="form-submit" onSubmit="onEdit(event)">
                        <input class="btn edit-color" type = "submit" name="Edit"  value="Edit"/>
                        <input type="text" name="ID" value="<?php echo $q["bookID"] ?>" hidden/>  
                    </form>
                </td>
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
    <script src="../javascript/book_details.js"></script>
 </body>
 </html>

