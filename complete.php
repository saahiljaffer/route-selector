<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
      $driver = $_POST['driver'];
     $route = $_POST['route'];
    //  $mobile = $_POST['mobile'];

 
    $sql = "INSERT INTO `donedrivers`(`route`,`driver`,`timeOut`) VALUES ('$route','$driver',now())";
    
    // $sql = "UPDATE `routes` SET `driver`='$driver' WHERE `id` = '$route'";
    // $link_sql = "SELECT * FROM `routes` WHERE `id` = '$route'";
    
    //  $sql = "INSERT INTO `assigned`(`id`, `driver`) VALUES ($route,'$driver')";
     
    //  "INSERT INTO assigned (driver,route) VALUES ('$driver','$route')";
 
     if (mysqli_query($conn, $sql)) {
         echo "Thank you";
        // echo "New record has been added successfully !";
        // $result = mysqli_query($conn,$link_sql);
        // $result = $conn->query($link_sql);

        // $user = $result->fetch_assoc();
        // while($row = $result->fetch_assoc()) {
        // $new_link = $row["link"];
//   }
        // echo($user["id"]);
        // echo(mysqli_query($conn, $link_sql));
        // window.open('http://www.yoururl.com', '_blank');
        
        // header("Location: $new_link");
        
        // die();
     } else {
         echo "There's been a mistake! Please speak to a volunteer or call Saahil at 647-761-8415";
        // echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>