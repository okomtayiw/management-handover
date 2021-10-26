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
                <!-- File upload form -->
                <div class="col-md-12" id="importFrm" >
                    <form action="<?php echo base_url('MasterData/import'); ?>" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" />
                        <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                    </form>
                </div>
                <p> <?php echo $this->session->flashdata('messageupdate') ;?></p>
                <p> <?php echo $this->session->flashdata('message') ;?></p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="viewDataTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Unit</th>
                    <th>Owner</th>
                    <th>Ppjb</th>
                    <th>Denda</th>
                    <th>Tunggakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $start =1;
                        foreach($masterdata as $row ) :    
                  ?>
                  <tr>
                    <td><?php echo $start++; ?>. </td>
                    <td><?php echo $row['number']; ?>  </td>
                    <td><?php echo $row['name_unit']; ?>  </td>
                    <td><?php echo $row['name_owner']; ?>  </td>
                    <td><?php echo $row['payment']; ?> </td>
                    <td><?php echo $row['denda']; ?> </td>
                    <td><?php echo $row['tunggakan']; ?> </td>
                    </td>
                  </tr>
           
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


  <script>
  
  </script>