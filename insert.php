<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $driver = $_POST['driver'];
     $route = $_POST['route'];
    //  $mobile = $_POST['mobile'];
 
 $sql = "INSERT INTO `drivers`(`route`,`driver`,`timeIn`) VALUES ('$route','$driver',now())";
    // $sql = "INSERT INTO `drivers`(`driver`) VALUES ('saahiljaffer')";
 
    // $sql = "INSERT INTO `drivers`(`id`,`driver`,`time_in`) VALUES ($route,'$driver', now())";
    // $sql = "UPDATE `routes` SET `driver`='$driver' WHERE `id` = '$route'";
    $link_sql = "SELECT * FROM `routes` WHERE `id` = '$route'";
    
    //  $sql = "INSERT INTO `assigned`(`id`, `driver`) VALUES ($route,'$driver')";
     
    //  "INSERT INTO assigned (driver,route) VALUES ('$driver','$route')";
 
     if (mysqli_query($conn, $sql)) {
        // echo "New record has been added successfully !";
        // echo("hi");
        
        $result = mysqli_query($conn,$link_sql);
        if($result){
            while($row = $result->fetch_assoc()) {
                $new_link = $row["link"];
            }
            // echo($new_link);
            header("Location: $new_link");
            die();
        } else {
         echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        // $result = $conn->query($link_sql);
        // echo("$result");
        // $user = $result->fetch_assoc();
        
        // echo($user["id"]);
        // echo(mysqli_query($conn, $link_sql));
        // window.open('http://www.yoururl.com', '_blank');
        // echo("$new_link");
        // header("Location: $new_link");
        
        // die();
    } else {
         echo "There's been a mistake! Please speak to a volunteer or call Saahil at 647-761-8415";
         echo "<br>";
        echo "Error: " . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>