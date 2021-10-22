<?php

	// $name = trim(strip_tags($_POST['name']));
  // $email = trim(strip_tags($_POST['email']));
  // $message = trim(strip_tags($_POST['message']));
  



// validation
  if (!$_POST) exit('No direct script access allowed');
  if (!empty(trim($_POST["name"])) && empty(trim($_POST["email"]))) {
    exit('2');
  }
  
  if (empty(trim($_POST["name"])) && !empty(trim($_POST["email"]))) {
    exit('3');
  }

  if (empty(trim($_POST["name"])) && empty(trim($_POST["email"]))) {
    exit('4');
  }

  if (!empty(trim($_POST["name"])) && !empty(trim($_POST["email"]))) {
    // DB create
    $name_db = 'ajax1';
    $conn = new mysqli("localhost", "root", "root");
    $name = $conn->real_escape_string(htmlspecialchars($_POST["name"]));
    $email = $conn->real_escape_string(htmlspecialchars($_POST["email"]));
    $message = $conn->real_escape_string(htmlspecialchars($_POST["message"]));
    $create_db = "CREATE DATABASE IF NOT EXISTS ".$name_db;
    $create_table = "CREATE TABLE IF NOT EXISTS Users (id INTEGER AUTO_INCREMENT PRIMARY KEY, name text, email text, message text)";
    $conn->query($create_db);
    $conn->query("USE ". $name_db);
    $conn->query($create_table);  

    $insert_info = "INSERT INTO Users (name, email, message) VALUES ('$name', '$email', '$message')";
 
    $conn->query($insert_info);

    $last_block_id = $conn->insert_id;

    $get_info = "SELECT * FROM Users WHERE id=$last_block_id";
    $result = $conn->query($get_info);

    foreach($result as $row){
      $new_block = '<div class="col-12 col-lg-4">
      <div class="card">
        <div class="card__header center">
          <span>'.htmlspecialchars($row["name"]).'</span>
        </div>
        <div class="card__body">
          <span>'.htmlspecialchars($row["email"]).'</span>
          <p>'.htmlspecialchars($row["message"]).'</p>
        </div>
      </div>
    </div>';

    }
    
    echo $new_block;
    mysqli_free_result($result);
    $conn->close();

  }


 // TRUNCATE TABLE Users





  ?>
