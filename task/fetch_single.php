<?php
include('../database/database.php');
include('function.php');
if(isset($_POST["item_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM tbl_item 
  WHERE id = '".$_POST["item_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["name"] = $row["name"];
  $output["stock"] = $row["stock"];
  $output["price"] = $row["price"];
  $output["warehouse_id"] = $row["warehouse_id"];
  $output["description"] = $row["description"];
  if($row["image"] != '')
  {
   $output['item_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="50" /><input type="hidden" name="hidden_item_image" value="'.$row["image"].'" />';
  }
  else
  {
   $output['item_image'] = '<input type="hidden" name="hidden_item_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>