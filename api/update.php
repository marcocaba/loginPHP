<?php
  require 'config.php';

  $id  = $_POST["id"];
  $post = $_POST;
  $sql = "UPDATE employees SET name = '".$post['name'].
         "',address = '".$post['address'].
         "',salary = '".$post['salary'].
         "' WHERE id = '".$id."'";
  $result = $mysqli->query($sql);
  $sql = "SELECT * FROM employess WHERE id = '".$id."'"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();
  echo json_encode($data);
?>