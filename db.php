<?php
    $servername='localhost';
    $username='nabiljaf_jcc';
    $password='Verbatim659@';
    $dbname = "nabiljaf_jcc";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>