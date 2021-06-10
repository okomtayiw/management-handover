<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                    <form id="form-search"  method="POST" action="<?php echo base_url('towerTreeFilter/'.$nmfilter);?>">
			
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
	   foreach($towertree as $row ) : 
	  
	   ?>
	   <tr id="<?php echo $row['id_stc']; ?>">	
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











