<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
						<!-- <h4 class="title">Data Supplier</h4> -->
					
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">
						            <span class="glyphicon glyphicon-filter"></span> Filter 
                        </a>
                        <?php if ($sesisonstatus != null) { ?>
                        <a href="<?php echo base_url()?>reportpdf/<?php echo $sesisonstatus;?>" target="_blank" class="btn btn-primary" >
						            <span class="glyphicon glyphicon-file"></span> Export PDF
                        </a>

                        <?php } ?>


                        <?php if ($sesisonstatus != null) { ?>
                        <a href="<?php echo base_url()?>exportexcel/export/<?php echo $sesisonstatus;?>" target="_blank" class="btn btn-primary" >
						            <span class="glyphicon glyphicon-file"></span> Export Excel
                        </a>

                        <?php } ?>
                        
                       
      
                        <form id="form-search"  method="POST" action="<?php echo base_url('report')?>">
			
                            <div class="form-group row">
                            <div class="col-sm-10">
                            <select  name="scount" onchange="this.form.submit()">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>          
                            </div>
                            </div>
                        </form>
                        
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
      <th>Defect</th>
      <th>Status</th>
      <th>Type</th>
      <th>Sqm</th>
      <!-- <th></th> -->
      </tr>
     </thead>
     <tbody>
	   
	   <?php 
	   foreach($report as $row ) : 
	  
	   ?>
	   <tr id="<?php echo $row['id_cta']; ?>">	
	   		<?php if($user['role_id'] == 1) { ?>
			<?php } ?>
            <!-- <td><input type="checkbox" class="emp_checkbox" data-emp-id="[<?php echo $row['id_cta']; ?>]"></td> -->
	        <td><?php echo ++$start; ?>. </td>
            <td><?php echo $row['lantai']; ?>  </td>
            <td><?php echo $row['pemilik']; ?>  </td>
            <td><?php echo $row['nameDefect']; ?>  </td>
            <td><?php echo $row['nameStatus']; ?>  </td>
            <td><?php echo $row['type_unit']; ?>  </td>
            <td><?php echo $row['sqm_unit']; ?>  </td>
			<!-- <td class="td-actions text-right">
			<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs" >
            <a href="<?php echo base_url('townhouse/updatetownhouse/'.$row['id_cta']);?>"><i class="fa fa-edit"></i></a>
            </button>
            <a href="<?php echo base_url('townhouse/deletetownhouse/'.$row['id_cta']);?> "><button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
            <i class="fa fa-times" onClick="return confirmDel();"></i>
            </button></a>
			</td> -->
	   </tr>
	  <?php
	  endforeach; ?>
	 </tbody>
    </table>
    </div>


	<?php echo $this->pagination->create_links(); ?>
	
  </div>
 </div>
 </div>
 </div>
 </div>



 <!-- Modal Filter -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="form-search" method="POST"  action="<?php echo base_url('report')?>">
			<!-- component -->
			<div class="form-group row">
			<div class="col-sm-10">

      <select class="form-control" id="nmstatus" name="nmStatus">
      <option value=''>--Pilih Status--</option>
      <?php 
        foreach ($status as $status) :

      ?>                        
      <option value="<?php echo $status['id_status'];?>"><?php echo $status['status'];?></option>
      <?php 
      endforeach;
      ?>
      </select>            
			</div>
			</div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-search" name="submit">Submit</button>
      </div>	
	</form>
  </div>
</div>
</div>
</div>



<script type="text/javascript">
$(document).ready(function(){



});


</script>








