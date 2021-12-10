
<!-- Esther Dzifa Mensah 
Final Exam 
Web Technology
2022 -->

<!-- Setting up a connection  -->
<?php  
require __DIR__ ."/credentials.php";

    
    $conn = new mysqli(servername,username,password,dbname);
    
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
        echo "Connection failed";
    }
  

?>