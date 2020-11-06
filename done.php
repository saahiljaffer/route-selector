<?php
    include('db.php');
    $status = '';
    if (!empty($_POST['routes'])){
        if (is_array($_POST['routes'])) {
            $status = "<strong>You selected the below route:</strong><br />";
            foreach($_POST['routes'] as $route_id){
            $query = mysqli_query
                (
                $conn,
                "SELECT * FROM routes WHERE `route_id`='$route_id'"
                );
                $row = mysqli_fetch_assoc($query);
                $status .= $row['route_name'] . "<br />";
   } 
  } 
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&amp;display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">

    <title>Completed Arbaeen Routes</title>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
        <div class="container">
            <div class="row">
                        <h2>Done Routes</h2>
                    <p>Please fill this form and click submit after you're done your route</p>
                    <form action="complete.php" method="post">
 
                        <div class="row">
                            <label>First and Last Name:</label>
                        </div>
                        <div class="row">
                            <input type="text" name="driver" class="form-control" required="true">
                        </div>
                        
                        <div class = "row">
                        <label for="routes">Select your route:</label>
                        </div>
                        <div class = "row"></div>
                    <select id="route" name="route" required="true">
                      <?php
                        $count = 0;
                        $query = mysqli_query($conn,"SELECT * FROM routes");
                    foreach($query as $row){
                  $count++;
                    echo '<option value ="';
                     echo $row["id"];
                     echo '">';
                     echo $row["id"];
                        echo '</option>';
                }
            ?>
</select>
</br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <script>
        var hashParams = window.location.hash.substr(1); // substr(1) to remove the `#`
        document.getElementById('route').value = decodeURIComponent(hashParams);
// for(var i = 0; i < hashParams.length; i++){
//     var p = hashParams[i].split('=');
//     document.getElementById(p[0]).value = decodeURIComponent(p[1]);;
// }
    </script>
</body>
</html>