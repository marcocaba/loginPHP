<?php
  require 'config.php';
  $post = $_POST;
  $sql = "INSERT INTO employees (name,address,salary) 
	VALUES ('".$post['name']."','".$post['address']."','".$post['salary']."')";
  $result = $mysqli->query($sql);

  $sql = "SELECT * FROM employess Order by id desc LIMIT 1"; 
  $result = $mysqli->query($sql);
  $data = $result->fetch_assoc();
  echo json_encode($data);
?>