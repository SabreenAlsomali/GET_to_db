<?php 
if(isset($_GET['name'])){
    $servername = "localhost";
    $username = "root";  // default XAMPP username, change if different
    $password = "";      // default XAMPP password, change if different
    $dbname = "get_to_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
        // Extract task details from the POST data
        $name = $_GET['name'];
        
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO get_values  (name  ) VALUES (?)");
        $stmt->bind_param("s", $name);
        // Execute the statement
        if ($stmt->execute()) {
            echo '<h1>Value Saved</h1><br></hr></br>';
        }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET to DB</title>
</head>
<body>
    <style>
        .button {
  background-color: #008CBA; /* Blue */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin:10px;
  border-radius: 25px;
  border:2px #008CBA solid
}
.button_grey {
  background-color: #e7e7e7; /* Blue */
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin:10px;
  border-radius: 25px;
  border:2px #008CBA solid
}
.button_transparent {
  background-color: transparent; /* Blue */
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin:10px;
  border-radius: 25px;
  border:2px transparent solid
}
.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  margin-top:5vh;
}

.button:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}
 
    </style>
    <div  >
        <center>
            <a href="History.php" class="button" >History</a>
            <a href="index.php"  class="button">Get Saver</a>


        </center>
    </div>
    <div >
 
<form action="index.php" method="GET">
 
<input type="text" name="name" id="name" required placeholder="Type text Here">
<button type="submit">Save</button>
</form>

 
</div>

</body>
</html>