
<div class="container-fluid">
  <div class="row mt-3">
	<div class="col md6">
    <nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Data Status</li>
		</ol>
	</nav>
	<form method="post" action="<?php echo base_url('index.php/status/delete_status') ?>" id="form-delete">
	<table class="table table-striped" >
     <thead>
      <tr>
				<?php if($user['role_id'] == 1) { ?>
				<th scope="col"><input type="checkbox" id="check-all" ></th>
				<?php } ?>
				<th scope="col">No.</th>
				<th scope="col">Desc Status</th>
      </tr>
     </thead>
   <tbody>
	 <?php
	 $number =1;
	 
	 foreach ($status as $row):
	 ?>
	 <tr>
	 <?php if($user['role_id'] == 1) { ?>
	 <td><input type ="checkbox" class="check-item" name="idStatus[]" value = "<?php echo $row['id_status']; ?>" ></td>
	 <?php } ?>
	 <th><?php echo $number;?></th>
	 <td><?php echo $row['nama_status'];?></td>
	 </tr>
	 <?php
	 $number++;
	 endforeach; ?>
	 </tbody>
	 </table>
	 <?php if($user['role_id'] == 1) { ?>
	 <button type="button" id="btn-delete">DELETE</button>
	 <?php } ?>
	 </form>
	 </div>
  </div>
</div>

<script type="text/javascript">
     $(document).ready(function(){
		 
		 $("#check-all").click(function(){
			 if($(this).is(":checked"))
				  $(".check-item").prop("checked",true);
			 
			 else 
				 $(".check-item").prop("checked",false);
			 
			 
		 });
		 
		 

	 
	  $("#btn-delete").click(function(){ 
		var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); 
	  
			if(confirm) 
			$("#form-delete").submit(); 
      	 });
		 
	 });

</script>	

	