<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
						<!-- <h4 class="title">Data Supplier</h4> -->
						<a href="<?php echo base_url('listdataqc/adddataqc'); ?>" class="btn btn-primary">
						<span class="glyphicon glyphicon-plus"></span> Add 	
                        </a>
                        <!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">
						<span class="glyphicon glyphicon-filter"></span> Filter 
						</a> -->
                        <form id="form-search"  method="POST" action="<?php echo base_url('listDataQc')?>">
			
                            <div class="form-group row">
                            <div class="col-sm-10">
                                        <select  name="scount" onchange="this.form.submit()">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="500">500</option>
                                        </select>
                            </div>
                            <!-- <input class="browser-default custom-input" id="mySearch" type="text" placeholder="Search.."> -->
                            </div>
                        </form>

                        <nav class="navbar navbar-light bg-light">
                        <form class="form-inline" method="POST" action="<?= base_url('/listdataqc/search');?>">
                            <input class="form-control mr-sm-2" type="text" id="txtSearch" name="skeyword" placeholder="Search" aria-label="Search">
                            <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownSearch"></ul>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>          
                        </nav>
                        
                        
                    </div>

                    
                    
	
	<div class="content table-responsive table-full-width">
	<table class="table table-hover table-striped" id="table_id" >
     <thead>
      <tr>
	  <?php if($user['role_id'] == 1) { ?>
	  <!-- <th ></th>
	  <th ></th> -->
	  <?php } ?>
      <th><input type="checkbox" id="select_all"></th>
	  <th>No.</th>
      <th>Lantai/Unit</th>
      <th>Tim QC</th>
      <th>Tgl. Open QC Thp1</th>
      <th>Tgl. Close QC Thp1</th>
      <th>Status</th>
      <th>Tgl. Open QC Thp2</th>
      <th>Tgl. Close QC Thp2</th>
      <th>Status</th>
      <th>Keterangan</th>
      <th></th>
      </tr>
     </thead>
     <tbody>
	   
	   <?php 
       foreach($dataallqc as $row ) : 
        
        if ($row['date_qc_thp1'] == '0000-00-00'){
            $dateOpenqc = '';
        }else {  
            $dateOpenqc = mediumdate_indo($row['date_qc_thp1']); 
        } 


        if ($row['date_qc_thp2'] == '0000-00-00'){
            $dateOpenqctwo = '';
        }else {  
            $dateOpenqctwo = mediumdate_indo($row['date_qc_thp2']); 
        } 

        if ($row['date_close_qc_thp1'] == '0000-00-00'){
            $dateCloseqc = '';
        }else {  
            $dateCloseqc = mediumdate_indo($row['date_close_qc_thp2']); 
        } 

        if ($row['date_close_qc_thp2'] == '0000-00-00'){
            $dateCloseqctwo = '';
        }else {  
            $dateCloseqctwo= mediumdate_indo($row['date_close_qc_thp2']); 
        } 
	   ?>
	   <tr id="<?php echo $row['id_qc']; ?>">	
	   		<?php if($user['role_id'] == 1) { ?>
			<?php } ?>
            <td><input type="checkbox" class="emp_checkbox" data-emp-id="[<?php echo $row['id_qc']; ?>]"></td>
	        <td><?php echo ++$start; ?>. </td>
            <td><?php echo $row['name_unit']; ?></td>
            <td><?php echo $row['tim_cek_list'];?></td>
            <td><?php echo $dateOpenqc; ?>  </td>
            <td><?php echo $dateCloseqc; ?> </td>
            <td><?php echo $row['status_qc_thp1']; ?>  </td>
            <td><?php echo $dateOpenqctwo; ?>  </td>
            <td><?php echo $dateCloseqctwo;?></td>
            <td><?php echo $row['status_qc_thp2']; ?>  </td>
            <td><?php  echo $row['keterangan']; ?></td>
			<td class="td-actions text-right">
			<!-- <button type="button" rel="tooltip" title="Edit <?php echo $row['name_unit']; ?>" class="btn btn-info btn-simple btn-xs" >
            <a href="<?php echo base_url('listdataqc/updatetowerone/'.$row['id_qc']);?>"><i class="fa fa-edit"></i></a>
            </button> -->
            <a href="<?php echo base_url('listdataqc/deletedataqc/'.$row['id_qc']);?> "><button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
            <i class="fa fa-times" onClick="return confirmDel();"></i>
            </button></a>
            </td>
	   </tr>
	  <?php
	  endforeach; ?>
	 </tbody>
    </table>
    <span class="rows_selected" id="select_count">   &nbsp; 0 Selected &nbsp; </span>
    <button type="button" id="updateStatusOne"  class="btn btn-primary">Update Status Qc tahap 1</button>
    <button type="button" id="updateStatusTwo"  class="btn btn-primary">Update Status Qc tahap 2</button>

    <p id="demo"></p>
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
        <h5 class="modal-title" id="exampleModalLabel">Silahkan isi data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="formUpdateStatus" method="POST" action="">
			<!-- component -->
            <div class="form-group row">
             <label  class="col-sm-2 col-form-label">Date Closed </label>
            <div class="col-sm-10">
            <input type="date" id="dateClosedQc" data-date-format="dd/MM/YY"  name="nmDateClosedQc"></input>
            </div>
            </div>

            <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
            <select class="form-control" name="status">
            <option value="On Progress">On Progress </option>    
            <option value='Done'>Done</option>
            <option value='Not Done'>Not Done</option>
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
function confirmDel()
     {
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
    }
$(document).ready(function(){


    



    $("#select_count").hide();  
    $("#updateStatusOne").hide();
    $("#updateStatusTwo").hide(); 
  

    $(document).on('click', '#select_all', function() {
           
    $("#select_count").show();  
    $("#updateStatusOne").show();
    $("#updateStatusTwo").show(); 
  
    $(".emp_checkbox").prop("checked", this.checked);
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
    });
    $(document).on('click', '.emp_checkbox', function() {
    $("#select_count").show();  
    $("#delete_records").show()  
    $("#updateRecorToHO").show();
    $("#updateStatusOne").show();
    $("#updateStatusTwo").show(); 
        

    if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) 
    {
        
        $('#select_all').prop('checked', true);
    } else {
    $('#select_all').prop('checked', false);
    }
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
    });
    


    $('#updateStatusOne').on('click', function(e){

    var towerOne = [];

    $(".emp_checkbox:checked").each(function() {
    towerOne.push($(this).data('emp-id'));


    });
    if(towerOne.length <=0) {
        
        alert("Please select records."); 

    } else {
        $('#filterModal').modal('show')
        $("#formUpdateStatus").submit(function(e) {

            var selected_values = towerOne.join();
            var vStatus = document.getElementById('formUpdateStatus').elements['status'].value;
            var dateClose = document.getElementById('formUpdateStatus').elements['nmDateClosedQc'].value;

                $.ajax({
                method: "POST",
                url: "<?php echo base_url();?>listdataqc/updatestatusone",
                data: {'emp_id':selected_values,
                    'status':vStatus,'dateclose':dateClose
                    },
                success: function(response) {
                // remove deleted employee rows
                // var x = document.getElementById("demo");
                // x.innerHTML = selected_values;
                    var emp_id = response.split(",");
                    for (var i=0; i < emp_id.length; i++ ) 
                    { 
                    

                    $('tr#'+emp_id[i]+'').css('backgroud-color', '#ccc');
                    $('tr#'+emp_id[i]+'').fadeOut('slow');
                    location.reload();
            
                    }
                
                } 
            }); 

        });
    } 


    });


    $('#updateStatusTwo').on('click', function(e){

        var towerOne = [];

        $(".emp_checkbox:checked").each(function() {
        towerOne.push($(this).data('emp-id'));
        });

        

        if(towerOne.length <=0) { 
            alert("Please select records."); 
             
        } else { 
            $('#filterModal').modal('show')
            $("#formUpdateStatus").submit(function(e) {

                
                var vStatus = document.getElementById('formUpdateStatus').elements['status'].value;
                var dateClose = document.getElementById('formUpdateStatus').elements['nmDateClosedQc'].value;
                

                // if(!dateClose || !vStatus) {

                //     alert("Tanggal tidak boleh kosong..");
                // } else if (!vStatus){

                //     alert("Status tidak boleh kosong..");
                // }


                var selected_values = towerOne.join();


                $.ajax({
                method: "POST",
                url: "<?php echo base_url();?>listdataqc/updatestatustwo",
                data: {'emp_id':selected_values,'status':vStatus,'dateclose':dateClose
                    },
                success: function(response) {
                // remove deleted employee rows
                // var x = document.getElementById("demo");
                // x.innerHTML = selected_values;
                    var emp_id = response.split(",");
                    for (var i=0; i < emp_id.length; i++ ) 
                    { 
                    $('tr#'+emp_id[i]+'').css('backgroud-color', '#ccc');
                    $('tr#'+emp_id[i]+'').fadeOut('slow');
                    location.reload();
            
                    }
                
                } 
                }); 

            });
      
           
        } 


    });


  
  });
</script>








