<?php
include('../database/database.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Save")
 {
  $image = '';
  if($_FILES["item_image"]["name"] != '')
  {
      $image = upload_image();
    }
  $statement = $connection->prepare("
   INSERT INTO tbl_item (name, image, stock, price, warehouse_id, description) 
   VALUES (:name, :image, :stock, :price, :warehouse_id, :description)
  ");
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"],
    ':image'  => $image,
    ':stock' => $_POST["stock"],
    ':price' => $_POST["price"],
    ':warehouse_id' => $_POST["warehouse_id"],
    ':description' => $_POST["description"],
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Update")
 {
  $image = '';
  if($_FILES["item_image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_item_image"];
  }
  $statement = $connection->prepare(
   "UPDATE tbl_item 
   SET name = :name, image = :image, stock = :stock, price = :price, warehouse_id = :warehouse_id, description = :description  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':id'   => $_POST["item_id"],
    ':name' => $_POST["name"],
    ':image'  => $image,
    ':stock' => $_POST["stock"],
    ':price' => $_POST["price"],
    ':warehouse_id' => $_POST["warehouse_id"],
    ':description' => $_POST["description"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
   