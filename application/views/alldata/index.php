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
                <input type="text" id="nmTower" value="<?php echo $nTower;?>"  hidden>
                <input type="text" id="nmMonth" value="<?php echo $nMonth;?>" hidden>
                <input type="text" id="nmYear" value="<?php echo $nYear;?>" hidden>
                <button type="button" id="btn-csv-export"  class="btn btn-info btn-simple btn-xs">ExportXSL</i>
                </button>
                <button type="button"   data-toggle="modal" data-target="#modal-filter-data" class="btn btn-info btn-simple btn-xs" >Filter</i>
                </button>
                <br>
                <p> <?php echo $this->session->flashdata('messageupdate') ;?></p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="viewDataTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Lantai</th>
                    <th >unit</th>
                    <th>Jumlah Unit</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <tr>
                    <?php 
                        if($listDataUnitLevel5 != null) { ?>

                    <td>5</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel5 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                      
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel5 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel6 != null) { ?>
                    <td>6</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel6 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel6 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel7 != null) { ?>
                    <td> 7 </td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel7 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel7 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel8 != null) { ?>
                    <td>8</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel8 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel8 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel9 != null) { ?>
                    <td>9</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel9 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel9 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel10 != null) { ?>
                    <td>10</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel10 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel10 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel11 != null) { ?>
                    <td>11</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel11 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel11 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel12 != null) { ?>
                    <td>12</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel12 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel12 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


              

                  <tr>
                  <?php 
                    if($listDataUnitLevel15 != null) { ?>
                    <td>15</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel15 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel15 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel6 != null) { ?>
                    <td>16</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel16 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel16 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 



                  <tr>
                  <?php 
                    if($listDataUnitLevel7 != null) { ?>
                    <td>17</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel17 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel17 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel18 != null) { ?>
                    <td>18</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel18 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel18 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel19 != null) { ?>
                    <td>19</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel19 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel19 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel20 != null) { ?>
                    <td>20</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel20 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel20 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel21 != null) { ?>
                    <td>21</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel21 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 

                    <td>
                    <?php 
                        foreach($listDataUnitLevel21 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel22 != null) { ?>
                    <td>22</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel22 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel22 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel23 != null) { ?> 
                    <td>23</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel23 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel23 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel24 != null) { ?>
                    <td>24</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel24 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel24 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel25 != null) { ?>
                    <td>25</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel25 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel25 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel26 != null) { ?>
                    <td>26</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel26 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel26 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel27 != null) { ?>
                    <td>27</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel27 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel27 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel28 != null) { ?>
                    <td>28</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel28 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel28 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel29 != null) { ?>
                    <td>29</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel29 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel29 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel30 != null) { ?>
                    <td>30</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel30 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel30 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel31 != null) { ?>
                    <td>31</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel31 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel31 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 



                  <tr>
                  <?php 
                    if($listDataUnitLevel32 != null) { ?> 
                    <td>32</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel32 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel32 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel33 != null) { ?>
                    <td>33</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel33 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel33 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel34 != null) { ?>
                    <td>34</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel34 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel34 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 

                  <tr>
                  <?php 
                    if($listDataUnitLevel35 != null) { ?>
                    <td>35</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel35 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel35 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel36 != null) { ?>
                    <td>36</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel36 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel36 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                    }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel37 != null) { ?>
                    <td>37</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel37 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel37 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel38 != null) { ?>
                    <td>38</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel38 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel38 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  <tr>
                  <?php 
                    if($listDataUnitLevel39 != null) { ?>
                    <td>39</td>
                    <td>
                    <?php 
                        foreach($listDataUnitLevel39 as $row ) :    
                    ?>
                    <?php echo $row['lantai']; ?>  
                    <?php
                    endforeach;
                    ?>
                    </td> 
                    <td>
                    <?php 
                        foreach($listDataUnitLevel39 as $row ) :    
                    ?>
                    <?php echo $row['sumData']; ?>  
                    <?php
                    endforeach;
                  }
                    ?>
                    </td> 
                  </tr> 


                  


                 
                  </tbody>
                  
                </table>
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
          var nmTower =$("#nmTower").val();
     
          $.ajax({
            type: "GET",
            data: {
              "nmMonth" : nmMonth,
              "nmYear" : nmYear,
              "nmTower" : nmTower
            },
            url: "<?= base_url('ExportExcel/export');?>",
            success: function(data){
               window.open(this.url,'_blank');
            }
          });
         
        });

 
    });
  </script>

  