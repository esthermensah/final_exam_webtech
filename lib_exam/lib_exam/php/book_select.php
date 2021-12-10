<?php
require "../php/database_connection_test.php";

$bookid = $_POST['ID'];

function listing($conn,$bookid){
    $bookinfo = mysqli_query($conn, "SELECT A.fname, G.genreType, G.genreID, Sh.shelfno, BA.baID, A.authorID, BA.authID,
    B.bookID, B.publisher, B.publishDate, G.genreCategory, B.booktitle, B.ISBN, B.noOfCopies, Sh.*
    from Shelf as Sh Inner Join Genre as G on Sh.shelfno=G.genreID
    Inner Join Book as B on B.bookID=G.genreID
    Inner Join BookAuthor as BA on BA.baID=B.bookID
    Inner Join Author as A on A.authorID=BA.authID
    where B.bookID='$bookid'
    order by Sh.shelfno asc");
    echo mysqli_error($conn);
    $data=mysqli_fetch_all($bookinfo,MYSQLI_ASSOC);
    return $data;
}
//  $data=(listing($conn));

echo json_encode(listing($conn,$bookid));


?>