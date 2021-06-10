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
                <h3 class="card-title"><?php echo $title;?></h3><br>
                <input type="text" id="nmMonth" value="<?php echo $nMonth;?>" hidden>
                <input type="text" id="nmYear" value="<?php echo $nYear;?>" hidden>
                <button type="button" id="btn-csv-export"  class="btn btn-info btn-simple btn-xs">Export CSV</i>
                </button>
                <button type="button"   data-toggle="modal" data-target="#modal-filter-data" class="btn btn-info btn-simple btn-xs" >Filter</i>
                </button>
                <br>
                <p> <?php echo $this->session->flashdata('messageupdate') ;?></p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php
                  if($listDataUnitAllTower != null){
                  echo 'Total data : '.count($listDataUnitAllTower); ?> <br>
                  <?php
                  foreach($listDataUnitAllTower as $row ) :?>
                  <?php echo $row['lantai'];?> <br>
                  <?php
	                endforeach;
                  }
                  ?>
  
                <div class="modal fade" id="modal-filter-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <h4 class="modal-title">Grace Periode</h4>
                            </div>
                            <form method="POST" action="<?= base_url('ListAllData');?>" enctype="multipart/form-data" >
                            <div class="modal-body">
                                <!-- select -->

                                <div class="form-group">
                                <label>Tower</label>
                                <select  name="nameTower" class="form-control">
                                    <option value="0">--TOWER--</option>
                                    <?php
                                       
                                       for($x=1;$x<7;$x++){?>
                                        
                                        <option value="<?php echo $x;?>"><?php echo $x;?></option>
                                    <?php } ?>
                                </select>
                                </div>


                                <div class="form-group">
                                <label>Month</label>
                                <select  name="nameMonth" class="form-control">
                                    <?php
                                      $month=array("--PILIH MONTH--","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                      $arrlength=count($month);
                                      
                                      for($x=0;$x<$arrlength;$x++) { ?>
                                     
                                     <option value="<?php echo $x;?>"><?php echo $month[$x]?></option>
                                     <?php  } ?>
                                </select>
                                </div>

                                <div class="form-group">
                                <label>Year</label>
                                <select  name="nameYear" class="form-control">
                                    <option value="0">--PILIH TAHUN--</option>
                                    <?php
                                      foreach (Array('2020', '2021','2022', '2023', '2024','2025','2026','2027','2028','2029','2030') as $year) { ?>
                                        <option value="<?php echo $year;?>"><?php echo $year?></option>
                                    <?php } ?>
                                </select>
                                </div>

                                <div class="form-group">
                                <label>Lantai</label>
                                <select  name="nameLevel" class="form-control">
                                    <option value="0">--PILIH LANTAI--</option>
                                    <?php
                                       $z = 0;
                                       for($x=2;$x<50;$x++){   
                                        if(strlen($x) == 1) {
                                            $xn = $z.''.$x;
                                        } else {
                                            $xn = $x;
                                        }   
                                         ?>
                                    
                                        <option value="<?php echo $xn;?>"><?php echo $xn;?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class="modal-footer">
          
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>                
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                  </div>
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
     
        // save handover
        $("#btn-csv-export").click(function(){

          var nmMonth = $("#nmMonth").val();
          var nmYear =$("#nmYear").val();
        
     
          $.ajax({
            type: "POST",
            data: {
              "nmMonth" : nmMonth,
              "nmYear" : nmYear
            },
            url: "<?= base_url('ListAllData/exportCSV');?>",
            success: function(data){
               window.open(this.url,'_blank');
            }
          });
         
        });

 
    });
  </script>

  