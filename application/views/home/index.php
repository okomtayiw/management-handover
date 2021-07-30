<?php
$resultSetA = Array();
if($totGracePeriodeA != null){
  foreach($totGracePeriodeA as $result) {
     $resultSetA[] = $result['tot'];
  }
}

$resultSetB = Array();
if($totGracePeriodeB != null){
  foreach($totGracePeriodeB as $result) {
     $resultSetB[] = $result['tot'];
  }
}

$resultSetC = Array();
if($totGracePeriodeC != null){
  foreach($totGracePeriodeC as $result) {
     $resultSetC[] = $result['tot'];
  }
}


$resultSetD = Array();
if($totGracePeriodeD != null){
  foreach($totGracePeriodeD as $result) {
     $resultSetD[] = $result['tot'];
  }
}

$resultSetE = Array();
if($totGracePeriodeE != null){
  foreach($totGracePeriodeE as $result) {
     $resultSetE[] = $result['tot'];
  }
}


$resultSetF = Array();
if($totGracePeriodeF != null){
  foreach($totGracePeriodeF as $result) {
     $resultSetF[] = $result['tot'];
  }
}


?>



<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php  
                
                foreach($totDataInProgress as $result) {?>
                  <h3><?php echo $result['totData'];?> </h3>
                <?php  
                }
                ?>
              
                <p>In Progress</p>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-bag"></i>
              </div> -->
              <a href="<?= base_url('HandOver');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               <?php  
                foreach($totDataHandOver as $result) {?>
                  <h3><?php echo $result['totData'];?> </h3>
                <?php  
                }
                ?>

                <p>Hand Over</p>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div> -->
              <a href="<?= base_url('HandOver');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
               <?php  
                foreach($totDataPending as $result) {?>
                  <h3><?php echo $result['totData'];?> </h3>
                <?php  
                }
                ?>

                <p>Pending</p>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-person-add"></i>
              </div> -->
              <a href="<?= base_url('HandOver');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
               <?php  
                foreach($totDataCancel as $result) {?>
                  <h3><?php echo $result['totData'];?> </h3>
                <?php  
                }
                ?>

                <p>Cancel</p>
              </div>
              <!-- <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div> -->
              <a href="<?= base_url('HandOver');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /row -->

        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Grace Periode</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"></span>
                    <span></span>
                  </p>
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 50.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="500"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-center">
                  <span class="mr-4">
                    <i class="fas fa-square text-danger"></i> TR A
                  </span>

                  <span class="mr-4">
                    <i class="fas fa-square text-warning"></i> TR B
                  </span>

                  <span class="mr-4">
                    <i class="fas fa-square text-success"></i> TR C
                  </span>

                  <span class="mr-4">
                    <i class="fas fa-square text-primary"></i> TR D
                  </span>

                  <span class="mr-4">
                    <i class="fas fa-square text-info"></i> TR E
                  </span>

                  <span class="mr-4">
                    <i class="fas fa-square text-secondary"></i> TR F
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <script text="javascript">
     $(document).ready(function(){

      var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true
        var $salesChart = $('#sales-chart')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
          type: 'bar',
          data: {
            labels: ['Sep-21', 'Okt-21', 'Nov-21', 'Des-21'],
            datasets: [
              {
                backgroundColor: '#F63005',
                borderColor: '#007bff',
                data: <?php echo json_encode($resultSetA);?>
              },
              {
                backgroundColor: '#F5EA0A',
                borderColor: '#ced4da',
                data: <?php echo json_encode($resultSetB);?>
              },
              {
                backgroundColor: '#03CC11',
                borderColor: '#ced4da',
                data: <?php echo json_encode($resultSetC);?>
              },
              {
                backgroundColor: '#0E55E6',
                borderColor: '#ced4da',
                data: <?php echo json_encode($resultSetD);?>
              },
              {
                backgroundColor: '#0798B3',
                borderColor: '#ced4da',
                data: <?php echo json_encode($resultSetE);?>
              },

              {
                backgroundColor: '#5C6D70',
                borderColor: '#ced4da',
                data: <?php echo json_encode($resultSetF);?>
              }
              
            ]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                // display: false,
                gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                  beginAtZero: true,

                  // Include a dollar sign in the ticks
                  callback: function (value) {
                    if (value >= 3000) {
                      value /= 100
                      value += ' unit'
                    }

                    return  value
                  }
                }, ticksStyle)
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display: false
                },
                ticks: ticksStyle
              }]
            }
          }
        })
     });

 </script>
