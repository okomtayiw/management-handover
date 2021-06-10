<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
						             
                    </div>
                    
                    
	
	<div class="content table-responsive table-full-width">
	<table class="table table-hover table-striped" id="table_id" >
     <thead>
      <tr>
	  <?php if($user['role_id'] == 1) { ?>
	  <!-- <th ></th>
	  <th ></th> -->
	  <?php } ?>
      <!-- <th><input type="checkbox" id="select_all"></th> -->
	  <th>No.</th>
      <th>Lantai/Unit</th>
   <th>Pemilik</th>
      <th>Alamat</th>
      <th>Email</th>
      <th>Status</th>
      <th>Type</th>
      <th>Sqm</th>
      <th></th> 
      <th></th> 
      </tr>
     </thead>
     <tbody>
	   
       <?php 
       $start = 0;
	   foreach($searchresult as $row ) : 
	  
	   ?>
	   <tr>	
	   		<?php if($user['role_id'] == 1) { ?>
			<?php } ?>
	        <td><?php echo ++$start; ?>. </td>
            <td><?php echo $row['lantai']; ?>  </td>
            <td><?php echo $row['pemilik']; ?>  </td>
            <td><?php echo $row['address_pemilik'];?></td>
           <td><?php echo $row['email'];?></td>
            <td><?php echo $row['nameStatus']; ?>  </td>
            <td><?php echo $row['type_unit']; ?>  </td>
            <td><?php echo $row['sqm_unit']; ?>  </td>
			<td class="td-actions text-left">
			<button type="button" rel="tooltip" title="Edit data" class="btn btn-info btn-simple btn-xs" >
            <a href="<?php echo base_url($row['link'].'/'.$row['idTower']);?>"><i class="fa fa-edit"></i></a>
            </button>
			</td>
	   </tr>
	  <?php
	  endforeach; ?>
	 </tbody>
    </table>
    </div>

  </div>
 </div>
 </div>
 </div>
 </div>

<script type="text/javascript">
$(document).ready(function(){



});


</script>








