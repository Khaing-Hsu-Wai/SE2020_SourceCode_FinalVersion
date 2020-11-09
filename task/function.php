<?php

function upload_image()
{
 if(isset($_FILES["item_image"]))
 {
  $extension = explode('.', $_FILES['item_image']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../upload/' . $new_name;
  move_uploaded_file($_FILES['item_image']['tmp_name'], $destination);
  return $new_name;
 }
}

function get_image_name($item_id)
{
 include('../database/database.php');
 $statement = $connection->prepare("SELECT image FROM tbl_item WHERE id = '$item_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["image"];
 }
}

function get_total_all_records()
{
 include('../database/database.php');
 $statement = $connection->prepare("SELECT * FROM tbl_item");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

?>
   