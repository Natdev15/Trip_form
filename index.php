<?php 
$insert = false;
if(isset($_POST['name'])){

// Connection to Database:     
$con = mysqli_connect("localhost", "root", "", "travel_trip");


if($con){
    // echo "connected";
}
else{
    die("connection to this database failed due to". mysqli_connect_error()) ;
}

// Fetching data from html Form: 
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$number = $_POST['number'];
$email = $_POST['email'];
$address = $_POST['address'];
$des = $_POST['des'];

// Inserting Data into "travel_trip" database's table = "trip"
$sql = "INSERT INTO `trip` ( `name`, `age`, `gender`, `number`, `email`, `address`, `des`, `date`) VALUES ('$name', '$age', '$gender', '$number', '$email', '$address', '$des', current_timestamp());" ;

if($con->query($sql) == true ){
    // echo "successfully inserted..!";
    $insert = true;
}
else{
    echo "Error: $sql <br> $con->error ";
    // not_insert = true; 
}
    $con->close() ;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel-Agency</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to Nat Travel Trip Form</h2>
        <p>Below Enter your details to confirmation about your trip</p>

        <!-- Alert msg after submit form  -->
        <?php
        if($insert == true){
        echo "<p class='subMsg'>Thanks for submitting your form. We are happy to see u on trip</p>";
        }
        ?>

        <form action="index.php" method="post">

        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="text" name="age" placeholder="Enter your age" required>
        <input type="text" name="gender" placeholder="Enter your gender" required> 
        <input type="number" name="number" placeholder="Enter your mobile number" required>
        <input type="email" name="email" placeholder="Enter your email address" >
        <input type="type" name="address" placeholder="Enter your home address" required>
        <textarea name="des" id="des" cols="30" rows="8" placeholder="Enter description more about trip"></textarea>
        <button class="btn">Submit</button>
        </form>
        
    </div>
    
    


    <script src="app.js"></script>
</body>
</html>