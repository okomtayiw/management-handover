<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data <?php echo $title;?></h3><br>
                <p> <?php echo $this->session->flashdata('messageupdate') ;?></p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="viewDataTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Unit</th>
                    <th>Owner</th>
                    <th>Tgl. Transaksi</th>
                    <th>Tgl. Undangan</th>
                    <th>Grace periode</th>
                    <th colspan="1">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $start =1;
                        foreach($towerfour as $row ) :    
                  ?>
                  <tr>
                    <td><?php echo $start++; ?>. </td>
                    <td><?php echo $row['lantai']; ?>  </td>
                    <td><?php echo $row['pemilik']; ?>  </td>
                    <td><?php echo $row['tgl_transaksi']; ?>  </td>
                    <td><?php echo $row['tgl_ho_seharusnya']; ?>  </td>
                    <td><?php echo $row['grace_periode']; ?>  </td>
                    <td><button type="button" rel="tooltip" title="Edit <?php echo $row['lantai']; ?>" class="btn btn-info btn-simple btn-xs" >
                    <a href="<?php echo base_url('TowerTwo/updateTowerTwo/'.$row['id_std']);?>"><i class="fa fa-edit"></i></a>
                    </button>
                    <button type="button" rel="tooltip" title="Remove" data-toggle="modal" data-target="#modalDelete<?php echo $row['id_std'];?>" class="btn btn-danger btn-simple btn-xs">
                    <i class="fa fa-times" onClick="return confirmDel();"></i>
                    </button>
                    </td>
                    
                  </tr>
                  <!-- Modal HTML -->
                  <div id="modalDelete<?php echo $row['id_std'];?>" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                      <div class="modal-content">
                        <div class="modal-header flex-column">
                          <div class="icon-box">
                            <i class="fa fa-times"></i>
                          </div>						
                          <h4 class="modal-title w-100">Are you sure?</h4>	
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <p>Do you really want to delete these records? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-danger"><a href="<?php echo base_url('TowerTwo/deleteTowerTwo/'.$row['id_std']);?>">Delete</a></button>
                        </div>
                      </div>
                    </div>
                  </div>     

                  <?php
	                endforeach;
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  