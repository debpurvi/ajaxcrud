<?php
/*

error_reporting(E_ALL);

include "config/db_conn.php";


if($_GET["action"]==="insertData"){
    if(!empty($_POST["rirst_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"])
     && !empty($_POST["gender"])  && !empty($_POST["country"]) && $_FILES["image"]["size"]!=0){

$first_name=mysqli_real_escape_string($conn,$_POST["fisrt_name"]);
$last_name=mysqli_real_escape_string($conn,$_POST["last_name"]);
$email=mysqli_real_escape_string($conn,$_POST["email"]);
$gender=mysqli_real_escape_string($conn,$_POST["gender"]);
$country=mysqli_real_escape_string($conn,$_POST["country"]);

$originalname=$_FILES["image"]["name"];
$newname=uniqid() .time() . "." . pathinfo($originalname,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $newname);
$sql = "INSERT INTO `users`(`id`, `first_name`, `last_name`, `email`, `image`, `country`, `gender`) 
VALUES (NULL,'$first_name','$last_name','$email','$new_name','$country','$gender')";

if(mysqli_query($conn,$sql)){
    echo json_encode([
"statusCode"=>200,
"message"=>"Data inserted successfully"
    ]);
}

else{
    echo json_encode([
        "statusCode"=>500,
        "message"=>"Data not inserted successfully"
            ]);
    
}
    }
    else{
        echo json_encode([
            "statusCode" =>400,
            "message" => "Please fill all the required fields 🙏"
          ]);
    }
}
*/
?>

<?php

error_reporting(E_ALL);

include "config/db_conn.php";

// insert data to database
if ($_GET["action"] === "insertData") {
    if (!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"])
     && !empty($_POST["country"]) && !empty($_POST["gender"]) && $_FILES["image"]["size"] != 0) {
      $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
      $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $country = mysqli_real_escape_string($conn, $_POST["country"]);
      $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
  
      // rename the image before saving to database
      $original_name = $_FILES["image"]["name"];
      $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $new_name);
  
      $sql = "INSERT INTO `users`(`id`, `first_name`, `last_name`, `email`, `image`, `country`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$new_name','$country','$gender')";
  
      if (mysqli_query($conn, $sql)) {
        echo json_encode([
          "statusCode" => 200,
          "message" => "Data inserted successfully 😀"
        ]);
      } else {
        echo json_encode([
          "statusCode" => 500,
          "message" => "Failed to insert data 😓"
        ]);
      }
    } else {
      echo json_encode([
        "statusCode" => 400,
        "message" => "Please fill all the required fields 🙏"
      ]);
    }
  }
  // insert data into datsabase end here

?>