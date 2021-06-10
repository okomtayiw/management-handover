<?php
foreach($towerone as $rows ) : 
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <!-- Main content -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
    
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="text-center">
      <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
      </div>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
           <!-- jquery validation -->
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form <small>tenant</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST"  action="<?php echo base_url('towerOne/saveUpdateTowerOne')?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Unit</label>
                    <input type="text" value="<?php echo $rows['lantai'];?>" name="nmUnit" class="form-control"  placeholder="Enter unit">
                  </div>
                  <div class="form-group">
                    <label >Name owner</label>
                    <input type="text"  name="nmOwner" value="<?php echo $rows['pemilik'];?>" class="form-control"  placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label >Date Transaksian</label>
                    <input type="text" name="dateTransaksi" value="<?php echo $rows['tgl_transaksi'];?>" class="form-control"  placeholder="Transaksi" id="datepicker">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <input type="hidden" name="idTowerOne" value="<?php echo $rows['id_cta'];?>" />
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
       
        <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Identitas / Address</h3>

              <div class="card-tools">
                <button type="button" data-toggle="modal" data-target="#modal-add-address" class="btn btn-info" >
                  <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>No. Telephone</th>
                    <th>Alamat</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach($identitas as $rowidentitas) :    
                  ?>     
                  <tr>
                    <td><?php echo $rowidentitas['no_telephone'];?></td>
                    <td><?php echo $rowidentitas['name_address'];?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a  href="#"  data-toggle="modal" data-target="#modal-edit-identitas<?php echo $rowidentitas['id_address'];?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <button  id="<?php echo $rowidentitas['id_address'];?>" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                      </div>
                    </td>
                    <?php
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                   <!-- modal dialog address -->
                   <?php
                  endforeach;
                  ?>

                <?php 
                    foreach($identitas as $rowidentitase) :    
                ?>     

                <div class="modal fade" id="modal-edit-identitas<?php echo $rowidentitase['id_address'];?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </div>  
                        <div class="modal-body">
                          <div class="form-group">
                            <label >No. Unit</label>
                                <input id="nmUnit<?php echo $rowidentitase['id_address'];?>" type="text"  class="form-control" value="<?php echo $rowidentitase['nm_unit'];?>" readonly="true"/>
                            </div>
                          <div class="form-group">
                          <label >No. telephone</label>
                              <input id="noTelp<?php echo $rowidentitase['id_address'];?>" type="text"  class="form-control" value="<?php echo $rowidentitase['no_telephone'];?>"/>
                          </div>
                          <div class="form-group">
                          <label>Address</label>
                          <textarea id="nmAddress<?php echo $rowidentitase['id_address'];?>" type="text" class="form-control" ><?php echo $rowidentitase['name_address'];?></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="<?php echo $rowidentitase['id_address'];?>" class="btn btn-primary btn-save-edit-address">Save</button>
                        </div>  
                    </div>   
                  </div>
                </div>        

                <?php 
                endforeach;
                ?>
                        
            </div>
                 
            </div>
            <!-- /.card-body -->
          </div> 
        </div>
      </div>
 </section>
 </div>


<div class="modal fade" id="modal-add-address">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </div>  
        <div class="modal-body">
          <div class="form-group">
          <label >No. Unit</label>
          <input id="nmUnitAdd" type="text"  class="form-control" value="<?php echo $rows['lantai'];?>" readonly="true"/>
          </div>
          <div class="form-group">
          <label >No. telephone</label>
          <input id="noTelpAdd" type="text"  class="form-control" />
          </div>
          <div class="form-group">
          <label>Address</label>
          <textarea id="nmAddressAdd" type="text" class="form-control" ></textarea>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-save-add-address">Save</button>
          </div>  
        </div>   
    </div>
  </div>  
</div>     

<script>
  $(document).ready(function(){

    $(".spinner-border").show(function(){
          
          $(this).hide(2000);

       })
       $(".content").hide(function(){
         
         $(this).show(2000);

      })


    $(".btn-save-edit-address").click(function(){
          var id = this.id;
          var nmUnit =$("#nmUnit"+id).val();
          var noTelp = $("#noTelp"+id).val();
          var nmAddress = $("#nmAddress"+id).val();
          var idAddress = $("#idAddress"+id).val();
          $.ajax({
            type: "POST",
            data: {
              "nmUnit" : nmUnit,
              "noTelp" : noTelp,
              "nmAddress" : nmAddress,
              "idAddress" : id
            },
            url: "<?= base_url('TowerOne/saveUpdateAddress');?>",
            success: function(data){
              window.location.href= data;
            }
          });
    });

    $(".btn-save-add-address").click(function(){

          var nmUnit =$("#nmUnitAdd").val();
          var noTelp = $("#noTelpAdd").val();
          var nmAddress = $("#nmAddressAdd").val();
          $.ajax({
            type: "POST",
            data: {
              "nmUnit" : nmUnit,
              "noTelp" : noTelp,
              "nmAddress" : nmAddress
            },
            url: "<?= base_url('TowerOne/saveAddAddress');?>",
            success: function(data){
              window.location.href= data;
            }
          });


    });


    $(".btn-delete").click(function(){

      var id = this.id;
      $.ajax({
      url:"<?php echo base_url();?>TowerOne/deleteAddress",
      type: "POST",
      data:{
        'id' : id
      },
      success: function(data) {
        window.location.reload();              
        }
      })

    });




  });
</script>