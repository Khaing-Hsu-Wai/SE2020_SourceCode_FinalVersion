<?php

include('../database/database.php');
include("function.php");

if(isset($_POST["item_id"]))
{
 $image = get_image_name($_POST["item_id"]);
 if($image != '')
 {
  unlink("../upload/" . $image);
 }
 $statement = $connection->prepare(
  "DELETE FROM tbl_item WHERE id = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["item_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>