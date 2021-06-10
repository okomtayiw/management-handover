<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <a href="<?php echo base_url('PicEmail/addpicemail'); ?>" class="btn btn-primary">
						<span class="glyphicon glyphicon-plus"></span> Add 	
                        </a>
                    
                        <form id="form-search"  method="POST" action="<?php echo base_url('PicEmail')?>">
			
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
    <?php 
    echo $this->session->flashdata('messageupdate');   
    
    ?>
	<table class="table table-hover table-striped" id="table_id" >
     <thead>
      <tr>
	  <th>No.</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Site Project</th>
      <th>Action</th>
      </tr>
     </thead>
     <tbody>
	   
       <?php 
       if($picemail > null) {
       foreach($picemail as $row ) : ?>
	   <tr>
	        <td><?php echo ++$start; ?>. </td>
            <td><?php echo $row['name_pic_project']; ?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['name_tower'];?></td>
			<td class="td-actions text-right">
			<button type="button" rel="tooltip" title="Edit <?php echo $row['id_pic_project']; ?>" class="btn btn-info btn-simple btn-xs" >
            <a href="<?php echo base_url('PicEmail/updatepicproject/'.$row['id_pic_project']);?>"><i class="fa fa-edit"></i></a>
            </button>
            <a href="<?php echo base_url('PicEmail/deletepicproject/'.$row['id_pic_project']);?> "><button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
            <i class="fa fa-times" onClick="return confirmDel();"></i>
            </button></a>
            </td>
            
	   </tr>
	  <?php
      endforeach; 
       }else { ?>
       <tr>
        <td colspan="8"><marquee>Data Pic Project Belum ada</marquee></td>
       </tr> 
       <?php }?>

	 </tbody>
    </table>
    </div>


	<?php echo $this->pagination->create_links(); ?>
	
  </div>
 </div>
 </div>
 </div>
 </div>

 <script type="text/javascript">

$(document).ready(function(){



 </script>










