<?= $this->session->flashdata('messageSuksesInsertTowerOne');?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <form id="form-insert" method="POST" autocomplete="off" role="form" action="<?php echo base_url('listdataqc/savedataqc')?>">                         
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Nama Tower</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmTower" id="selecttower">
                                <option value=''>--Pilih Nama Tower--</option>
                                <option value="TA"> TOWER A </option>
                                <option value="TB"> TOWER B </option>
                                <option value="TC"> TOWER C </option>
                                <option value="TD"> TOWER D </option>
                                <option value="TH"> TOWNHOUSE </option>
                                </select>
                            </div>
                            </div>       

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Status Unit</label>
                            <div class="col-sm-10">
                           
                            <select class="form-control" name="unit" id="unit">
                                <option></option>
                            </select>
                        

                            </div>
                            </div>
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Tanggal open QC</label>
                            <div class="col-sm-10">
                            <input type="date" id="dateOpenQc" data-date-format="dd/MM/YY"  name="dateOpenQc" >
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Tim QC</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmTimQc">
                                <option value=''>--Tim Open QC--</option>
                                <?php
                                      foreach (Array('Asset Management', 'Pak Remco') as $tim) { ?>
                                      <option value="<?php echo $tim;?>"><?php echo $tim;?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>

                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Tahap 1</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmTahap">
                                <option value=''>--Tahap--</option>
                                <?php
                                      foreach (Array('Tahap 1', 'Tahap 2') as $tahap) { ?>
                                      <option value="<?php echo $tahap;?>"><?php echo $tahap;?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                            <textarea type="text" class="form-control" placeholder="Description" name="nmKeterangan"  ></textarea>
                            </div>
                            </div>
                       
                            
                    <div class="modal-footer">
                        <a href="<?php echo $back;?>"><button type="button" class="btn btn-secondary" >Back</button></a>
                        <button type="submit" class="btn btn-primary" id="btn-insert">Save</button>
                    </div>
                            
                </form>
              
        </div>
    </div>
</div>
<script type="text/javascript">


$(document).ready(function(){


    $('#dateOpenQc').focus(function(){
        $(this).val('');
    })


    
    $('#selecttower').on('change', function(e){
        var idnmTower = $(this).val();

        if(idnmTower == 'TA'){
  
            $.ajax({
                type:'POST',
                dataType: 'html', 
                url:'<?php echo base_url();?>listdataqc/dataunitone',
                data:'idTower='+idnmTower,
                success:function(msg){
                    $('select#unit').html(msg);
                }
            });
        } else if (idnmTower == 'TB'){

            $.ajax({
                type:'POST',
                dataType: 'html', 
                url:'<?php echo base_url();?>listdataqc/dataunittwo',
                data:'idTower='+idnmTower,
                success:function(msg){
                    $('select#unit').html(msg);
                }
            });

        } else if (idnmTower == 'TC') {

            $.ajax({
                type:'POST',
                dataType: 'html', 
                url:'<?php echo base_url();?>listdataqc/dataunittree',
                data:'idTower='+idnmTower,
                success:function(msg){
                    $('select#unit').html(msg);
                }
            });


        } else if (idnmTower == 'TD'){

            $.ajax({
                type:'POST',
                dataType: 'html', 
                url:'<?php echo base_url();?>listdataqc/dataunitfour',
                data:'idTower='+idnmTower,
                success:function(msg){
                    $('select#unit').html(msg);
                }
            });
        } else if (idnmTower == 'TH'){

            $.ajax({
                type:'POST',
                dataType: 'html', 
                url:'<?php echo base_url();?>listdataqc/dataunittw',
                data:'idTower='+idnmTower,
                success:function(msg){
                    $('select#unit').html(msg);
                }
            });
        }
    })
 });

</script>



