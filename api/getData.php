<?php
  require 'config.php';

  $sqlTotal = "SELECT * FROM employees";
  $result = $mysqli->query($sqlTotal);
  while($row = $result->fetch_assoc()){
      $json[] = $row;
  }
  $data['data'] = $json;
  echo json_encode($data);
?>