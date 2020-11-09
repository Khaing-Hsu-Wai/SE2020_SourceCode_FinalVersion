<?php  

require 'class/link.php';
include 'class/navbar.php';
include 'class/sidebar.php';

?>

<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Item</h3>
					<div class="panel panel-headline">
						<!-- Button trigger modal -->
						<button type="button" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
						  Register Items
						</button>
					
						<div class="panel-body">
							
							<div class="table">
								<table id="item_data" class="table table-bordered">
									<thead>
										<tr>
											<th>Name</th>
											<th>Photo</th>
											<th>Stock Balance</th>
											<th>Price</th>
											<th>Warehouse</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
<div id="addModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="item_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Register Items</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
											<label for="name">Name</label>
											<input type="text" name="name" required="" id="name" class="form-control">
										</div>

										<div class="form-group">
											<label for="item_image">Photo</label><p id="output"></p>
											<input type="file" name="item_image" required="" accept="image/*" id="item_image" class="form-control">
											<span id="item_uploaded_image"></span>
										</div>

										<div class="form-group">
											<label for="stock">Stock Balance</label>
											<input type="number" name="stock" required="" id="stock" class="form-control">
										</div>

										<div class="form-group">
											<label for="price">Price<p id="output"></p></label>
											<input type="number" name="price" required="" id="price" class="form-control">
										</div>
                    

										<div class="form-group">
											<label for="warehouse_id">Warehouse</label>
											<select class="form-control" name="warehouse_id" id="warehouse_id">
												<option value="">Choose</option>
												<option value="1">A</option>
												<option value="2">B</option>
											</select>
										</div>								

										<div class="form-group">
											<label for="description">Description</label>
											<textarea id="description" name="description" required="" class="form-control"></textarea>
										</div>

										<div class="form-group">
											<input type="hidden" name="item_id" id="item_id" />
     										<input type="hidden" name="operation" id="operation" />
											<input type="submit" class="btn btn-success" name="action" id="action">
											<button type="reset" id="hide" class="btn btn-danger">Reset</button>
										</div>
    </div>
   </div>
  </form>
 </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#item_form')[0].reset();
  $('.modal-title').text("Register Items");
  $('#action').val("Save");
  $('#operation').val("Save");
  $('#item_uploaded_image').html('');
 });
 
 var dataTable = $('#item_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"task/fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#item_form', function(event){
  event.preventDefault();
  var name = $('#name').val();
  var extension = $('#item_image').val().split('.').pop().toLowerCase();
  var stock = $('#stock').val();
  var price = $('#price').val();
  var warehouse_id = $('#warehouse_id').val();
  var description = $('#description').val();
  if(extension != '')
  {
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#item_image').val('');
    return false;
   }
  } 
  if(name != '' && price != '' && stock != '' && warehouse_id != '' && description != '')
  {
   $.ajax({
    url:"task/insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#item_form')[0].reset();
     $('#addModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("Fields are Required");
  }
 });

 $(document).on('click', '.detail', function(){
  var item_id = $(this).attr("id");
  $.ajax({
   url:"task/fetch_single.php",
   method:"POST",
   data:{item_id:item_id},
   dataType:"json",
   success:function(data)
   {
    $('#addModal').modal('show');
    $('#name').val(data.name);
    $('#stock').val(data.stock);
    $('#price').val(data.price);
    $('#warehouse_id').val(data.warehouse_id);
    $('#description').val(data.description);

    $('.modal-title').text("Detail Items");
    $('#item_id').val(item_id);
    $('#item_uploaded_image').html(data.item_image);
    $('#hide').hide();
    $('#action').hide();
   }
  })
 });
 
 $(document).on('click', '.update', function(){
  var item_id = $(this).attr("id");
  $.ajax({
   url:"task/fetch_single.php",
   method:"POST",
   data:{item_id:item_id},
   dataType:"json",
   success:function(data)
   {
    $('#addModal').modal('show');
    $('#name').val(data.name);
    $('#stock').val(data.stock);
    $('#price').val(data.price);
    $('#warehouse_id').val(data.warehouse_id);
    $('#description').val(data.description);

    $('.modal-title').text("Update Items");
    $('#item_id').val(item_id);
    $('#item_uploaded_image').html(data.item_image);
    $('#action').val("Update");
    $('#operation').val("Update");
    $('#hide').hide();
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var item_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete?"))
  {
   $.ajax({
    url:"task/delete.php",
    method:"POST",
    data:{item_id:item_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });

 $('#item_image').on('change', function() { 
  
            const size =  
               (this.files[0].size / 1024 ).toFixed(1); 
  
            if (size > 1 || size < 0) { 
                alert("File must be between the size of 1-2 MB"); 
            } else { 
                $("#output").html("This file size is: " + size + " MB"); 
            } 
        }); 
 
});
</script>

<?php  

include 'class/footer.php';

?>