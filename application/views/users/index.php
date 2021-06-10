<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
						<!-- <h4 class="title">Data Supplier</h4> -->
						<!-- <a href="<?php echo base_url('user/adduser'); ?>" class="btn btn-primary">
						<span class="glyphicon glyphicon-plus"></span> Add 	
                        </a> -->
                        <!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">
						<span class="glyphicon glyphicon-filter"></span> Filter 
						</a> -->
                        <form id="form-search"  method="POST" action="<?php echo base_url('townhouse')?>">
			
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
      <th><input type="checkbox" id="select_all"></th>
	  <th>No.</th>
      <th>Username</th>
      <th>email</th>
      <th>Active</th>
      <th>Level</th>
      <th></th>
      </tr>
     </thead>
     <tbody>
	   
	   <?php 
	   foreach($users as $row ) : 
	  
	   ?>
	   <tr id="<?php echo $row['id_users']; ?>">	
	   		<?php if($user['role_id'] == 1) { ?>
			<?php } ?>
            <td><input type="checkbox" class="emp_checkbox" data-emp-id="[<?php echo $row['id_users']; ?>]"></td>
	        <td><?php echo ++$start; ?>. </td>
            <td><?php echo $row['username']; ?>  </td>
            <td><?php echo $row['email']; ?>  </td>
            <td><?php echo $row['status']; ?>  </td>
            <td><?php echo $row['role_id']; ?> </td>
			<td class="td-actions text-right">
			<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs" >
            <a href="<?php echo base_url('user/updateuser/'.$row['id_users']);?>"><i class="fa fa-edit"></i></a>
            </button>
            <a href="<?php echo base_url('user/deleteuser/'.$row['id_users']);?> "><button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
            <i class="fa fa-times" onClick="return confirmDel();"></i>
            </button></a>
            </td>
	   </tr>
	  <?php
	  endforeach; ?>
	 </tbody>
    </table>
    <span class="rows_selected" id="select_count">   &nbsp; 0 Selected &nbsp; </span>
    <button type="button" id="delete_records"  class="btn btn-primary">Delete</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="form-search" method="POST" action="<?php echo base_url('towertwo')?>">
			<!-- component -->
			<div class="form-group row">
			<div class="col-sm-10">
                        <select  name="scount">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
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

// document.getElementById("select_count").style.display = "none";
// document.getElementById("delete_records").style.display = "none";



$(document).ready(function(){


    $("#select_count").hide();  
    $("#delete_records").hide(); 
    $("#updateRecorToHO").hide(); 
    $("#updateRecorToPHO").hide(); 
    $("#updateRecorToSTS").hide();


    // $('#selectCount').on('change', function()
    // {
    //         var countSelect = this.value;
    //         $.ajax({
    //             method: "POST",
    //             url: "<?php echo base_url();?>townhouse/index",
    //             data: 'scount='+ countSelect,
    //             success: function(response) {
    //                 location.reload();

    //                 alert(countSelect);
            
    //                 }
            
                
    //             });

    // });

    $(document).on('click', '#select_all', function() {
    $("#select_count").show();  
    $("#delete_records").show();  

    $(".emp_checkbox").prop("checked", this.checked);
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
    });
    $(document).on('click', '.emp_checkbox', function() {
    $("#select_count").show();  
    $("#delete_records").show()  

        

    if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) 
    {
        
        $('#select_all').prop('checked', true);
    } else {
    $('#select_all').prop('checked', false);
    }
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
    });
    

    $("#delete_records").on('click', function(e){


        var towerOne = [];

        $(".emp_checkbox:checked").each(function() {
        towerOne.push($(this).data('emp-id'));


        });
        if(towerOne.length <=0) { alert("Please select records."); 
        } else { WRN_PROFILE_DELETE = "Are you sure you want to delete "+(towerOne.length>1?"these":"this")+" row?";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
        var selected_values = towerOne.join();
                    $.ajax({
                    method: "POST",
                    url: "<?php echo base_url();?>user/deletemultiuser",
                    data: 'emp_id='+selected_values,
                    success: function(response) {
                    // remove deleted employee rows
                    // var x = document.getElementById("demo");
                    // x.innerHTML = selected_values;
                        var emp_id = response.split(",");
                        for (var i=0; i < emp_id.length; i++ ) 
                        { 
                            $("#"+emp_id[i]).remove();

                            location.reload();
                        

                        // $('tr#'+emp_ids[i]+'').css('backgroud-color', '#ccc');
                        // $('tr#'+emp_ids[i]+'').fadeOut('slow');
                        }
                    
                    } 
                }); 
            } 
        } 


    });
  });
</script>








