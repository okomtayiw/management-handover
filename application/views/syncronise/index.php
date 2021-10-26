<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        
              <div class="card-body">
              <?php
                 $start =1;
                 foreach($printunit as  $row ) :    ?>
                            
                            <p><?php echo $start++;?>. <?php echo $row['name_unit'];?> berhasil ditambahkan</p>

               <?php  
                 endforeach;
              
              ?>
              
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

  