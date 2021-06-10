<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tower F</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tower F</li>
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
                <h3 class="card-title">Tower F</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Unit</th>
                    <th>Owner</th>
                    <th>Tgl. Transaksi</th>
                    <th>Tgl. Ho</th>
                    <th>Grace periode</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                        foreach($towersix as $row ) : 
                            
                            if($row['undangan'] != '0000-00-00') {
                                $undangan=date_create($row['undangan']);
                                date_add($undangan,date_interval_create_from_date_string("14 days"));
                                $dateundangan1 = date_format($undangan,"Y-m-d");
                            } else {
                                $dateundangan1 = '';
                            }


                            if($row['undangan'] != '0000-00-00') {
                                $undangan1=date_create($dateundangan1);
                                date_add($undangan1,date_interval_create_from_date_string("14 days"));
                                $dateundangan2 = date_format($undangan1,"Y-m-d");
                            } else {
                                $dateundangan2 = '';
                            }


                            if($row['undangan'] != '0000-00-00') {
                                $sto=date_create($dateundangan2);
                                date_add($sto,date_interval_create_from_date_string("3 days"));
                                $sto= date_format($sto,"Y-m-d");
                            } else {
                                $sto = '';
                            }
                        
                  ?>
                  <tr>
                    <td><?php echo ++$start; ?>. </td>
                    <td><?php echo $row['lantai']; ?>  </td>
                    <td><?php echo $row['pemilik']; ?>  </td>
                    <td><?php echo $row['tgl_transaksi']; ?>  </td>
                    <td><?php echo $row['tgl_ho_seharusnya']; ?>  </td>
                    <td><?php echo $row['grace_periode']; ?>  </td>
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