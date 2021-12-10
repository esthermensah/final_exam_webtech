<!-- Form for collectimg book data -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
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
                        <Button class="all_buttons" >Borrow Book</Button>
                        <form  class="row container m-auto" action="../php/fines.php" method="post" enctype="multipart/form-data">
                            <label class="col-2">Book Title:</label> <input class="ins col-4" type="text" name="title"/> 

                            <label class="col-2">Student Name</label><input class="ins col-4" type="text" name="author"/>

                            <label class="col-2">Author: </label><input class="ins col-4" type="text" name="author"/>

                            <label class="col-2">ISBN:</label><input class="ins col-4" type="text" name="ISBN"/>
                            <label class="col-2">Year Group:</label><input class="ins col-4" type="number" name="ISBN"/>

                            <label class="col-2"> Date Borrowed:</label><input class="ins col-4" type="date" name="pubdate"/>
                            

                            <label class="col-2">Publisher: </label><input class="ins col-4" type="text" name="pub"/>


                            <label class="col-2">Genre Type:</label>
                                <select name="gtype" class="ins col-4" id="genre">
                                    <option value="love" name="love">Love</option>
                                    <option value="tragedy" name="tragedy">tragedy</option>
                                    <option value="comedy" name="comedy">Comedy</option>
                                    <option value="sci-fi" name>Science Fiction</option>
                                </select>
                            <label class="col-2">Genre Category:</label><input class="ins col-4" type="number" name="gcat"/>                  
                            <label class="col-2">Number of copies:</label><input class="ins col-4" type="number" name="number"/>                                
                            <input type="submit" class="ins add col-3" name="submitbook" value="Borrow"/>                       
                            
                        </form>
                    </div>
                </div>
            </div>   
        </div>        
    </body>
</html>