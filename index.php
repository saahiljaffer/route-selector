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
    <title>Arbaeen Routes</title>
    <link rel="stylesheet" href="styles.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">-->
    <style type="text/css">
        /*.wrapper{*/
            /*width: 500px;*/
            /*margin: 0 auto;*/
        /*}*/
    </style>
</head>
<body>
    		<div class="container">
    		    <h2>Arbaeen Routes</h2>
	            <p>Please fill this form and click submit to open Google Maps:</p>
    			<form action="insert.php" method="post">
				<div class = "row">
						<label for "name">First and Last Name:</label>
				</div>
				<div class = "row">
						<input type="text" name="driver" class="form-control" required=true> 
                </div>
                <div class = "row">
						<label for="route">Route Number:</label>
				</div>
				<div class = "row">
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
				</div>
				<!--<div class = "row">-->
				<!--	<label for "outsidecanada">Have you been outside Canada in the last 14 days?</label>-->
				<!--</div>-->
				<!--<div class = "row">-->
				<!--	<label for="outsidecanada">No</label>-->
    <!--                <input type="radio" id="outsidecanada" name="outsidecanada" value="no" required="true">-->
				<!--</div>-->
				<!--<div class = "row">-->
				<!--	<label for "closecontact">Have you been in contact with anyone who has traveled outside of Canada in the past 14 days?</label>-->
				<!--</div>-->
				<!--<div class = "row">-->
				<!--	<label for="closecontact">No</label>-->
    <!--                <input type="radio" id="closecontact" name="closecontact" value="no" required="true">-->
				<!--</div>-->
				<!--<div class = "row">-->
				<!--	<label for "positive">Have you or any of your household members or close contacts tested positive for COVID-19?</label>-->
				<!--</div>-->
				<!--<div class = "row">-->
				<!--	<label for="positive">No</label>-->
    <!--                <input type="radio" id="positive" name="positive" value="no" required="true">-->
				<!--</div>-->
			 <!--   <div class = "row">-->
				<!--	<label for "symptoms">In the last 14 days, have you had any of the following symptoms: fever greater than 100.4F or 38C, cough, chest congestion, sinus congestion that does not respond to allergy medication, new headache, diarrhea, light headedness or confusion, loss of smell or taste?</label>-->
				<!--</div>-->
				<!--<div class = "row">-->
				<!--    <label for="symptoms">No</label>-->
    <!--                <input type="radio" id="symptoms" name="symptoms" value="no" required="true">-->
				<!--</div>-->
				<div class = "row">
                	        <input type="submit" value="Submit" name="submit">
				</div>
            </form>
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