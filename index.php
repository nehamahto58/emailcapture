<?php
$insert = false;
if(isset($_POST['name'])){
     $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "  INSERT INTO `formdb`.`formdb` ( `name`, `email`, `dt`) VALUES ('$name', '$email', CURRENT_TIMESTAMP);";
    // echo $sql;
     // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <section id="contact" class="py-5 mb-2">
        <div class="contact-bg">
         <h2 class="pb-2 text-center font-weight-bold contact-title" style="color: #3036CC;">Coming Soon....Stay Tuned.</h2>
         <?php
          if($insert == true){
            echo "<p class='submitMsg' style = 'color: #E13B63;'>Thanks for submitting.</p>";
            }
        ?>
         <form action="index.php" method="POST">
         <input type="text" placeholder="Name" name="name" required>
         <input type="email" placeholder="Email" name="email" required>
         <button type="submit" class="submitbtn">Submit</button>
        </form>
     </div>
     </section>
   
</body>
</html>