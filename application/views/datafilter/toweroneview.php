<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="header">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">
				 <span class="glyphicon glyphicon-filter"></span> Filter 
                </a>
                        <form id="form-search"  method="POST" action="<?php echo base_url('towerOneFilter/'.$nmfilter);?>">
			
                            <div class="form-group row">
                            <div class="col-sm-10">
                                        <select  name="scount" onchange="this.form.submit()">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="1000000">All</option>
                                        </select>
                            </div>
                            
                            </div>
                        </form>
                        
                        
                    </div>
				
                    
	
	<div class="content table-responsive table-full-width">
	<table class="table table-hover table-striped" id="table_id" >
     <thead>
      <tr>
	  <th>No.</th>
      <th>Lantai/Unit</th>
      <th>Pemilik</th>
      <th>Status</th>
      <th>Tanggal HO</th>
      <th>undangan1</th>
      <th>undangan2</th>
      <th>undangan3</th>
      <th>Open QC</th>
      <th>Close QC</th>
      <th>Barter</th>
      <th>Collection</th>
      </tr>
     </thead>
     <tbody>
	   
	   <?php 
	   foreach($towerone as $row ) : 
	  
	   ?>
	   <tr id="<?php echo $row['id_cta']; ?>">	
	   		<?php if($user['role_id'] == 1) { ?>
			<?php } ?>
	        <td><?php echo ++$start; ?>. </td>
            <td><?php echo $row['lantai']; ?>  </td>
            <td><?php echo $row['pemilik']; ?>  </td>
            
            
            <?php

            $undangan1;
            $undangan2;
            $undangan3;
            $tanggalho;
            $openQC;
            $closeQC;
            $status;
            $collection;


                    if ($row['undangan'] == '0000-00-00'){
                        $undangan1 = '';
                    }else {  
                        $undangan1 = mediumdate_indo($row['undangan']); 
                    } 

                    if ($row['undangan2'] == '0000-00-00'){
                        $undangan2 = '';
                    } else {  
                        $undangan2 = mediumdate_indo($row['undangan2']); 
                    } 

                    if ($row['undangan3'] == '0000-00-00'){
                        $undangan3 = '';
                    }else {  
                        $undangan3 = mediumdate_indo($row['undangan3']); 
                    } 

                    if ($row['tanggal_ho'] == '0000-00-00'){
                    $tanggalho = ''; 
                    } else {

                        $tanggalho = mediumdate_indo($row['tanggal_ho']);
                    } 
                    
                    if ($row['date_openQC'] == '0000-00-00'){
                        $openQC = ''; 
                    } else {
        
                        $openQC = mediumdate_indo($row['date_openQC']);
                    }

                    if ($row['date_closeQC'] == '0000-00-00'){
                            $closeQC = ''; 
                        } else {
            
                            $closeQC = mediumdate_indo($row['date_closeQC']);
                        }
                        if ($row['nameStatus'] == ''){
                            $status = 'Belum BAST'; 
                        } else {
            
                            $status = $row['nameStatus'];
                        }


                        if ($row['penerimaan'] == 0  && $row['ready_ho'] == ''){
                            $collection = ''; 
                        } else if ($row['penerimaan'] < 4  && $row['ready_ho'] != '') {
            
                            $collection = 'Tidak lolos';
                        } else if ($row['penerimaan']  > 4 ) {
            
                            $collection = 'Lolos';
                        }


            ?>
            <td><?php echo $status; ?>  </td>
            <td><?php echo $tanggalho; ?>  </td>
            <td><?php echo $undangan1; ?>  </td>
           
            <td><?php echo $undangan2; ?>  </td>
            <td><?php echo $undangan3; ?>  </td>
            <td><?php echo $openQC; ?>  </td>
            <td><?php echo $closeQC; ?>  </td>
            <td><?php echo $row['status_unit_barter']; ?>  </td>
            <td><?php echo $collection; ?>  </td>
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
	  <form id="form-search" method="POST"  action="<?php echo base_url('towerOneFilter/'.$nmfilter)?>">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1">Short nama pemilik A-Z</label>
        </div>

        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="checkbox1">
        <label class="custom-control-label" for="customCheck1">Undangan 1</label>
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
$(document).ready(function() {
  $("#checkbox1 :checkbox").click(function(){
    alert("clicked");
    if (this.checked){
        //$(this + " input").attr("checked") = "checked";
    } else {
        //$(this + " input").attr("checked") = "";
    }
  });
});

</script>











