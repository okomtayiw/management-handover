<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <p> <?php echo $this->session->flashdata('message') ;?></p>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hand Over </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <div class="text-center">
      <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Hand Over</h3><br>
              </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="viewDataTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>No.Transaksi</th>
                    <th>Unit</th>
                    <th>Owner</th>
                    <th>Tgl. Ho</th>
                    <th>Status</th>
                    <th>Status Defect</th>
                    <th>Tot Defect</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $start = 0;
                    foreach($report as $row ) :    
                  ?>
                  <tr>
                    <td><?php echo ++$start; ?>.</td>
                    <td><?php echo $row['number_trans']; ?></td>
                    <td><?php echo $row['lantai']; ?></td>
                    <td><?php echo $row['pemilik']; ?></td>
                    <td><?php echo $row['tgl_hand_over']; ?></td> 
                    <td><?php echo $row['status']; ?></td> 
                    <td><?php echo $row['status_defect']; ?></td> 
                    <td><?php echo $row['tot_defect']; ?></td> 
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
    $(document).ready(function(){
        $(".spinner-border").show(function(){
          
           $(this).hide(2000);

        })
        $(".content").hide(function(){
          
          $(this).show(2000);

       })
    });
 </script>


  