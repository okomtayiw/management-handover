<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                    
                        <form id="form-search"  method="POST" action="<?php echo base_url('listundangan')?>">
			
                            <div class="form-group row">
                            <div class="col-sm-10">
                                        <select  name="scount" onchange="this.form.submit()">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        </select>
                            </div>
                            <!-- <input class="browser-default custom-input" id="mySearch" type="text" placeholder="Search.."> -->
                            </div>
                        </form>

                        <span class="rows_selected" id="select_count">   &nbsp; 0 Selected &nbsp; </span>
                        <button type="button" id="sendUndangan"  class="btn btn-primary">Kirim undangan</button>
                    </div>
                    
                    
	
	<div class="content table-responsive table-full-width">
	<table class="table table-hover table-striped" id="table_id" >
     <thead>
      <tr>
      <th><input type="checkbox" id="select_all"></th>
	  <th>No.</th>
      <th>Lantai/Unit</th>
      <th>Pemilik</th>
      <th>undangan1</th>
      <th>Jenis Undangan</th>
      <th>Status</th>
      <th >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Action</th>
      </tr>
     </thead>
     <tbody>
	   
       <?php 
       if($listundangan > null) {
       foreach($listundangan as $row ) : 
        
         if($row['date_undangan'] != '0000-00-00') {
            $undangan=date_create($row['date_undangan']);
            date_add($undangan,date_interval_create_from_date_string("14 days"));
            $dateundangan1 = date_format($undangan,"Y-m-d");
         } else {
            $dateundangan1 = '';
         }


         if($row['date_undangan'] != '0000-00-00') {
            $undangan1=date_create($dateundangan1);
            date_add($undangan1,date_interval_create_from_date_string("14 days"));
            $dateundangan2 = date_format($undangan1,"Y-m-d");
         } else {
            $dateundangan2 = '';
         }


         if($row['date_undangan'] != '0000-00-00') {
            $sto=date_create($dateundangan2);
            date_add($sto,date_interval_create_from_date_string("3 days"));
            $sto= date_format($sto,"Y-m-d");
         } else {
            $sto = '';
         }
	  
	   ?>
	   <tr id="<?php echo $row['id_transaksi']; ?>">
            <td><input type="checkbox" class="emp_checkbox" data-emp-id="[<?php echo $row['id_transaksi']; ?>]"></td>
	        <td><?php echo ++$start; ?>. </td>
            <td><?php echo $row['nama_unit']; ?></td>
            <td><?php echo $row['pemilik'];?></td>
            <td><?php echo $row['date_undangan'];?></td>
            <td><?php echo 'undangan ke-'.$row['jenis_undangan'];?></td>
            <?php if($row['status_undangan'] == '') { 
                   $statusundangan = 'belum dikirim';
            } else {
                $statusundangan = $row['status_undangan'];
            } ?>
            <td><?php echo $statusundangan;?></td>
			<td class="td-actions text-right">
            <button  type="button" rel="tooltip" title="Print undangan <?php echo $row['nama_unit']; ?> no <?php echo $row['nomor_undangan']; ?>" class="btn btn-info btn-simple btn-xs" >
            <a target="_blank" href="<?php echo base_url('reportundangan/'.$row['nama_unit']);?>"><i class="fa fa-print"></i></a>
            </button>
			<!-- <button type="button" rel="tooltip" title="Edit <?php echo $row['lantai']; ?>" class="btn btn-info btn-simple btn-xs" >
            <a href="<?php echo base_url('towerone/updatetowerone/'.$row['id_transaksi']);?>"><i class="fa fa-edit"></i></a>
            </button>
            <a href="<?php echo base_url('towerone/deletetowerone/'.$row['id_transaksi']);?> "><button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
            <i class="fa fa-times" onClick="return confirmDel();"></i>
            </button></a> -->
            </td>
            
	   </tr>
	  <?php
      endforeach; 
       }else { ?>
       <tr>
        <td colspan="8"><marquee>Data Transaksi Undangan Masih Kosong</marquee></td>
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
    $("#select_count").hide();  
    $("#sendUndangan").hide(); 
   

    $(document).on('click', '#select_all', function() {
    $("#select_count").show();  
    $("#sendUndangan").show();  
    $(".emp_checkbox").prop("checked", this.checked);
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
    });
    $(document).on('click', '.emp_checkbox', function() {
    $("#select_count").show();  
    $("#sendUndangan").show()  
        

    if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) 
    {
        
        $('#select_all').prop('checked', true);
    } else {
    $('#select_all').prop('checked', false);
    }
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
    });


    



    $("#sendUndangan").on('click', function(e){


        var towerOne = [];

        $(".emp_checkbox:checked").each(function() {
        towerOne.push($(this).data('emp-id'));


        });
        if(towerOne.length <=0) { alert("Please select records."); 
        } else { WRN_PROFILE_DELETE = "Apakah anda akan mengirim undangan?";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
        var selected_values = towerOne.join();
                    $.ajax({
                    method: "POST",
                    url: "<?php echo base_url();?>listUndangan/updatestatusundangan",
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










