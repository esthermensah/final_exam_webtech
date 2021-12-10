<!-- Form for collectimg book data -->
<?php
require "../php/database_connection_test.php";

if(isset($_POST["submitbook"])) {
    $booktitle=$_POST['title'];
    $ISBN=$_POST['ISBN'];
    $publishDate=$_POST['pubdate'];
    $publisher=$_POST['pub'];
    $noOfCopies=$_POST['number'];
    $genreType=$_POST['gtype'];
    $genreCategory=$_POST['gcat'];
    $author=$_POST['author'];

    $insertgenre1= "INSERT INTO `genre` (`genreType`,`genreCategory`) VALUES (";
    $insertgenre2=" '$genreType', '$genreCategory')";
    $insertgenre = $insertgenre1.$insertgenre2;
    $genrequery= mysqli_query($conn,$insertgenre);
    echo mysqli_error($conn);  

    $genreID=null;
    if($genrequery){
            $genreID=mysqli_insert_id($conn);
            echo "success";
    }else{
            echo "genre error".mysqli_error($conn);
    }

    $insertbook1 ="INSERT INTO `book` (`bookID`,`booktitle`,`ISBN`, `publishDate`, `publisher`, `noOfCopies`) VALUES (";
    $insertbook2=" '$genreID', '$booktitle', '$ISBN', '$publishDate', '$publisher', '$noOfCopies')";
    $insertbook1 = $insertbook1.$insertbook2;
    $bookquery= mysqli_query($conn,$insertbook1);
    echo mysqli_error($conn);  

    $insertshelf ="INSERT INTO `shelf` (`shelfNo`) VALUES (";
    $insertshelf2=" '$genreID')";
    $insertshelf = $insertshelf.$insertshelf2;
    $shelfquery= mysqli_query($conn,$insertshelf);
    echo mysqli_error($conn);

    $insertauthor1 ="INSERT INTO `author` (`fname`) VALUES (";
    $insertauthor2=" '$author')";
    $insertauthor1 = $insertauthor1.$insertauthor2;
    $authorquery= mysqli_query($conn,$insertauthor1);
    echo mysqli_error($conn);

    $authorID=null;
    if($authorquery){
            $authorID=mysqli_insert_id($conn);
            echo "success";
    }else{
            echo "author error".mysqli_error($conn);
    }

    $insertbkauthor1 ="INSERT INTO `bookauthor` (`baID`,`authID`) VALUES (";
    $insertbkauthor2=" '$genreID','$authorID')";
    $insertbkauthor1 = $insertbkauthor1.$insertbkauthor2;
    $bkauthorquery= mysqli_query($conn,$insertbkauthor1);
    echo mysqli_error($conn);

}

?>



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
                    <div id="addbook" class="innerright portion">
                        <Button class="all_buttons" >Add New Book</Button>
                        <form  class="row container m-auto" action="bookform.php" method="post" enctype="multipart/form-data">
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
                            <input type="submit" class="ins add col-3" name="submitbook" value="ADD"/>                       
                            
                        </form>
                    </div>
                </div>
            </div>   
        </div>        
    </body>
</html>