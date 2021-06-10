<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
						<!-- <h4 class="title">Data Supplier</h4> -->
						<button  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#addComponent">
							Add Data  <span class="glyphicon glyphicon-plus"></span>
    					</button> 		
                    </div>
                    
	
	<div class="content table-responsive table-full-width">
	<table class="table table-hover table-striped" id="table_id" >
     <thead>
      <tr>
	  <?php if($user['role_id'] == 1) { ?>
	  <!-- <th ></th>
	  <th ></th> -->
	  <?php } ?>
	  <th>No.</th>
      <th>Name Component</th>
      <th></th>
      </tr>
     </thead>
     <tbody>
	   
	   <?php 
	   foreach($component as $row ) : 
	  
	   ?>
	   <tr>	
	   		<?php if($user['role_id'] == 1) { ?>
			<?php } ?>
	        <td><?php echo ++$start; ?>. </td>
			<td><?php echo $row['name_component']; ?> </td>
			<td class="td-actions text-right">
			<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs" data-toggle="modal" data-target="#editComponent<?php echo $row['id_component'];?>">
            <i class="fa fa-edit"></i>
            </button>
            <a href="<?php echo base_url('Component/deleteComponent/'.$row['id_component']);?> "><button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
            <i class="fa fa-times" onClick="return confirmDel();"></i>
            </button></a>
            </td>
	   </tr>
	  <?php
	  endforeach; ?>
	 </tbody>
	</table>

	<?php echo $this->pagination->create_links(); ?>
	
  </div>
 </div>
 </div>
 </div>
 </div>
 </div>


<!-- Modal Insert-->
<div class="modal fade" id="addComponent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add Data </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
      </div>
      <div class="modal-body">
      <form id="form-insert" method="POST" action="<?php echo base_url('Component/insertComponent')?>">
			<div class="form-group row">
				<label  class="col-sm-2 col-form-label"> Name Component</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="Name" name="nmComponent">
			</div>
			</div>
			
			
	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-insert">Save</button>
      </div>
			
	  	</form>
      </div>
     
    </div>
  </div>
</div>



<!-- Modal Edit-->
<?php
foreach($component as $rows ) : 
?>
<div class="modal fade" id="editComponent<?php echo $rows['id_component'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Data </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
      </div>
      <div class="modal-body">
      <form id="form-insert" method="POST" action="<?php echo base_url('Component/saveUpdateComponent')?>">
			<div class="form-group row">
				<label  class="col-sm-2 col-form-label"> Name Project</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="Name" name="nmComponent" value="<?php echo $rows['name_component']; ?>">
			</div>
			</div>
			
			
	  <div class="modal-footer">
        <input type="hidden" class="form-control" value="<?php echo $rows['id_component'];?>" name="idComponent">	  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-insert">Save</button>
      </div>
			
	  	</form>
      </div>
     
    </div>
  </div>
</div>
<?php
endforeach;
?>

<script type="text/javascript">
function confirmDel()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>








