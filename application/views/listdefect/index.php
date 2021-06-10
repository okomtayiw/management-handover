<div class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="header">
                <b><?php echo $title; ?></b>
                </div >
                    <div class="header">
                    <a href="#" data-toggle="modal" data-target="#ModalScrollableInsert">
						<span class="glyphicon glyphicon-plus"></span> Add 	
                    </a>
                    <span class="rows_selected" id="select_count">   &nbsp; 0 Selected &nbsp; </span>
                    <button type="button" id="updateDefect"  class="btn btn-primary">Update Defect List</button>
                    </div>
                    
                    
	
	<div class="content table-responsive table-full-width">
	<table class="table table-hover table-striped" id="table_id" >
     <thead>
      <tr>
      <th><input type="checkbox" id="select_all"></th>
	  <th>No.</th>
      <th>Lantai/Unit</th>
      <th>Status</th>
      <th>Jenis defect</th>
      <th>Jml. Defect</th>
      <th>Tgl. Open </th>
      <th>Tgl. Close</th>
      <th>Contoh list defect</th>
      <th>Keterangan</th>
      <th >Action</th>
      </tr>
     </thead>
     <tbody>
	   
       <?php 
       $start = 0;
       if($listdefect > null) {
       foreach($listdefect as $row ) :  
	   ?>
	   <tr id="<?php echo $row['id_transaksi_defect']; ?>">
            <td><input type="checkbox" class="emp_checkbox" data-emp-id="[<?php echo $row['id_transaksi_defect']; ?>]"></td>
	        <td><?php echo ++$start; ?>. </td>
            <td><?php echo $row['name_unit']; ?></td>
            <td><?php echo $row['status_defect'];?></td>
            <td><?php echo $row['jenis_defect'];?></td>
            <td><?php echo $row['tot_defect'];?></td>
            <td><?php echo $row['date_open_defect'];?></td>
            <td><?php echo $row['date_close_defect'];?></td>
            <td><a target="_blank" href="https://checkdeliver.com/report-pdf/09-02-202111:33:084/4">List defect</a></td>
            <td><?php echo $row['keterangan'];?></td>
			<td class="td-actions text-right">
            <button type="button"  class="btn btn-info btn-simple btn-xs" >
            <a href="#" data-toggle="modal" data-target="#edit_defect<?php echo $row['id_transaksi_defect'];?>"><i class="fa fa-edit"></i></a>
            </button>
            <a href="<?php echo base_url('listDefect/deleteDefect/'.$row['id_transaksi_defect'].'/'.$row['name_unit']);?> "><button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
            <i class="fa fa-times" onClick="return confirmDel();"></i>
            </button></a>
            </td>
            
	   </tr>
	  <?php
      endforeach; 
       }else { ?>
       <tr>
        <td colspan="11"><marquee>Data Defect unit <b> <?php echo $unit; ?> </b> Masih Kosong</marquee></td>
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

 <!-- Modal Insert-->
<div class="modal fade" id="ModalScrollableInsert" tabindex="-1" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add defect</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
      </div>
      <div class="modal-body">
      <form id="form-insert" method="POST" action="<?php echo base_url('ListDefect/adddefect')?>">
                   
                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                    <input readonly type="text" class="form-control" placeholder="nmunit"  name="nmunit" value="<?php echo $unit;?>">
                    </div>
                    </div>
		
                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="nmStatusDefect">
                                <option value=''>--Pilih status defect--</option>
                                <?php 
                                foreach ($statusDefect as $defect) :

                                ?>
                                <option value="<?php echo $defect['name_defect'];?>"><?php echo $defect['name_defect'];?></option>
                                <?php 
                                endforeach;
                                ?>
                                </select>
                    </div>
                    </div>

                    <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Jenis defect</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmFaseDefect">
                                <option value=''>--Pilih tahap defect--</option>
                                <?php
                                      foreach (Array('Tahap 1', 'Tahap 2', 'Tahap 3') as $fase) { ?>
                                      <option value="<?php echo $fase;?>"><?php echo $fase;?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>

                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Jml. Defect</label>
                    <div class="col-sm-10">
                                <select class="form-control" name="nmJmlDefect">
                                <option value=''>--Pilih total defect--</option>
                                <?php 
                                for($i=0;$i<100;$i++){ ?>
                                     
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php } ?>
                                </select>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Tgl. Defect</label>
                    <div class="col-sm-10">
                    <input type="date" id="dateClosedDefectOne" data-date-format="dd/MM/YY"  name="nmDateDefect" >
                    </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Note</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" placeholder="Keterangan" name="nmKeterangan" ></textarea>
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

<!-- Modal Edit Spam-->
<?php
foreach($listdefect as $rows ) : 
?>
<div class="modal fade" id="edit_defect<?php echo $rows['id_transaksi_defect'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
      </div>
      <div class="modal-body">
	  <form method="POST" action="<?php echo base_url('ListDefect/updatedefect')?>">
      <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                    <input readonly type="text" class="form-control" placeholder="nmunit"  name="nmunit" value="<?php echo $unit;?>">
                    </div>
                    </div>
		
                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="nmStatusDefect">
                                <option value=''>--Pilih status defect--</option>
                                <?php 
                                foreach ($statusDefect as $defect) :

                                ?>
                                <option value="<?php echo $defect['name_defect'];?>" <?php if (!(strcmp($defect['name_defect'], $rows['status_defect']))) {echo "selected=\"selected\"";} ?>><?php echo $defect['name_defect'];?></option>
                                <?php 
                                endforeach;
                                ?>
                                </select>
                    </div>
                    </div>

                    <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Jenis defect</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmFaseDefect">
                                <option value=''>--Pilih tahap defect--</option>
                                <?php
                                      foreach (Array('Tahap 1', 'Tahap 2', 'Tahap 3') as $fase) { ?>
                                        <option value="<?php echo $fase?>"<?php if (!(strcmp($fase, $rows['jenis_defect']))) {echo "selected=\"selected\"";} ?>><?php echo $fase;?></option>
                              
                                <?php } ?>
                                </select>
                            </div>
                            </div>

                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Jml. Defect</label>
                    <div class="col-sm-10">
                                <select class="form-control" name="nmJmlDefect">
                                <option value=''>--Pilih total defect--</option>
                                <?php 
                                for($i=0;$i<100;$i++){ ?>
                                     
                                     for($i=0;$i<100;$i++){ ?>
                                     <option value="<?php echo $i;?>"<?php if (!(strcmp($i, $rows['tot_defect']))) {echo "selected=\"selected\"";} ?>><?php echo $i;?></option>
                                <?php } ?>

                                </select>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Tgl. Defect</label>
                    <div class="col-sm-10">
                    <input type="date"  data-date-format="dd/MM/YY" value="<?php echo $rows['date_open_defect'];?>"  name="nmDateDefect" >
                    </div>
                    </div>

                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Tgl. Close</label>
                    <div class="col-sm-10">
                    <input type="date"  data-date-format="dd/MM/YY" value="<?php echo $rows['date_close_defect'];?>"  name="nmDateCloseDefect" >
                    </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Note</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" placeholder="Keterangan" value="<?php echo $rows['keterangan'];?>" name="nmKeterangan" ></textarea>
                        </div>
                    </div>
			
			
			<div class="modal-footer">
            <input type="hidden" class="form-control" value="<?php echo $rows['id_transaksi_defect'];?>" name="idTranDefect">	
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

$(document).ready(function(){
    $("#select_count").hide();  
    $("#updateDefect").hide(); 
   

    $(document).on('click', '#select_all', function() {
    $("#select_count").show();  
    $("#updateDefect").show();  
    $(".emp_checkbox").prop("checked", this.checked);
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
    });
    $(document).on('click', '.emp_checkbox', function() {
    $("#select_count").show();  
    $("#updateDefect").show()  
        

    if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) 
    {
        
        $('#select_all').prop('checked', true);
    } else {
    $('#select_all').prop('checked', false);
    }
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
    });


    



    $("#updateDefect").on('click', function(e){


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
                    url: "<?php echo base_url();?>listdefect/updatedefect",
                    data: 'emp_id='+selected_values,
                    success: function(response) {
                        var emp_id = response.split(",");
                        for (var i=0; i < emp_id.length; i++ ) 
                        { 
                            $("#"+emp_id[i]).remove();

                            location.reload();
                        
                        }
                    
                    } 
                }); 
            } 
        } 


    });
});



 </script>










