
<?php
foreach($towerfive as $rows ) : 
?>
<?= $this->session->flashdata('messageSuksesInsertTowerFour');?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <form id="form-insert" method="POST" autocomplete="off" role="form" action="<?php echo base_url('towerFive/saveUpdateTowerFive')?>">
  
                <div class="form-group row">
                                <label  class="col-sm-2 col-form-label"> Name Unit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nama Unit" value="<?php echo $rows['lantai'];?>" name="nmUnit">
                                <small class="text-danger"><?php echo form_error('nmUnit'); ?></small>  
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Type" value="<?php echo $rows['type_unit'];?>" name="nmType">
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">SQM</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="SQM" value="<?php echo $rows['sqm_unit'];?>"  name="nmSqm">
        
                            </div>
                            </div>

                       


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Pemilik </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nama Pemilik" name="nmPemilik" value="<?php echo $rows['pemilik'];?>">
                            <small class="text-danger"><?php echo form_error('nmPemilik'); ?></small> 
                            </div>
                            </div>

                            
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                            <textarea type="text" class="form-control" placeholder="Alamat pemilik" name="nmAddress" ><?php echo $rows['address_pemilik'];?></textarea>
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Email" name="nmEmail" value="<?php echo $rows['email'];?>">
                            <small class="text-danger"><?php echo form_error('nmEmail'); ?></small> 
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Undangan (1-2-3) & STO</label>
                            <div class="col-sm-10">
                            <?php 
                                if($rows['undangan'] != '0000-00-00') {
                                    $undangan=date_create($rows['undangan']);
                                    date_add($undangan,date_interval_create_from_date_string("14 days"));
                                    $dateundangan1 = date_format($undangan,"Y-m-d");
                                } else {
                                    $dateundangan1 = '';
                                }
                        
                        
                                if($rows['undangan'] != '0000-00-00') {
                                    $undangan1=date_create($dateundangan1);
                                    date_add($undangan1,date_interval_create_from_date_string("14 days"));
                                    $dateundangan2 = date_format($undangan1,"Y-m-d");
                                } else {
                                    $dateundangan2 = '';
                                }
                        
                        
                                if($rows['undangan'] != '0000-00-00') {
                                    $sto=date_create($dateundangan2);
                                    date_add($sto,date_interval_create_from_date_string("3 days"));
                                    $sto= date_format($sto,"Y-m-d");
                                } else {
                                    $sto = '';
                                }
                             ?>
                            <input type="date" id="undangan"  name="nmUndangan" value="<?php echo $rows['undangan'];?>">
                            <small class="text-danger"><?php echo form_error('nmUndangan1'); ?></small>
                            <input type="date" id="undangan2"  name="nmUndangan2" readonly value="<?php echo $dateundangan1;?>">
                            <small class="text-danger"><?php echo form_error('nmUndangan2'); ?></small> 
                            <input type="date" id="undangan3"  readonly name="nmUndangan3" value="<?php echo $dateundangan2;?>">
                            <small class="text-danger"><?php echo form_error('nmUndangan3'); ?></small>  
                            <input type="date" id="sto"  readonly name="nmSto" value="<?php echo $sto;?>">
                            <small class="text-danger"><?php echo form_error('nmSto'); ?></small>  
                            </div>
                            </div>

                           

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Status Unit</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmStatus">
                                <option value=''>--Pilih Status--</option>    
                                <?php 
                                foreach ($status as $status) :

                                ?>
                                <option value="<?php echo $status['id_status'];?>" <?php if (!(strcmp($status['id_status'], $rows['status']))) {echo "selected=\"selected\"";} ?>><?php echo $status['status'];?></option>
                               
                                <?php 
                                endforeach;
                                ?>
                                </select>
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Tanggal Serah Terima</label>
                            <div class="col-sm-10">
                            <input type="date" id="dateHO" data-date-format="dd/MM/YY"  name="nmDateHO" value="<?php echo $rows['tanggal_ho'];?>">
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">PIC HO</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmPicHO">
                                <option value=''>--Pilih pic ho--</option>
                                <?php
                                      foreach (Array('Budi', 'Andi', 'sulaiman') as $picho) { ?>
                                        <option value="<?php echo $picho;?>"<?php if (!(strcmp($picho, $rows['pic_ho']))) {echo "selected=\"selected\"";} ?>><?php echo $picho?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Send EMail</label>
                            <div class="col-sm-10">
                                    <input class="form-check-input" type="checkbox" name='sendEmail' value="send">
                                    <span class="form-check-sign"></span>
                                    SendEmail
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Defect List</label>
                            <div class="col-sm-10">
                            <a href="<?php echo base_url('listDefect/'.$rows['lantai'])?>">View Detail</a>       
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Payment Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmPaystatus">
                                <option value=''>--Pilih status payment unit--</option>
                                <?php 
                                foreach ($payStatus as $statusPay) :

                                ?>
                                <option value="<?php echo $statusPay['id_status_unit'];?>"<?php if (!(strcmp($statusPay['id_status_unit'], $rows['id_status_unit']))) {echo "selected=\"selected\"";} ?>><?php echo $statusPay['nama_status_unit'];?></option>
                                <?php 
                                endforeach;
                                ?>
                                </select>
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">No. Seri KWH Listrik</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="No. Seri KWH Listrik" name="nmNoSeriKWHMeter" value="<?php echo $rows['no_seri_kwh_meter'];?>">
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Daya Terpasang</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Daya Terpasang" name="nmDayaTerpasang" value="<?php echo $rows['daya_terpasang'];?>">
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Start Awal Listrik </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Start Awal Listrik" name="nmStartKwhListrik" value="<?php echo $rows['start_awal_listrik'];?>">
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">No. Seri Water Meter </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="No. Seri Water Meter" name="nmNoSeriWaterMeter" value="<?php echo $rows['no_seri_water_meter'];?>">
                            </div>
                            </div>



                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Start Awal Air</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Stat Awal Air" name="nmStartAwalAir" value="<?php echo $rows['start_awal_air'];?>">
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Tanggal serah terima ke POM</label>
                            <div class="col-sm-10">
                            <input type="date" id="dateToPOM" data-date-format="dd/MM/YY"  name="nmDateToPom" value="<?php echo $rows['serah_terima_pom'];?>">
                            </div>
                            </div>

                            


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Remote</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Remote" name="nmRemote" value="<?php echo $rows['remote'];?>">
                            </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Kunci</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="kunci" name="nmKunci"  value="<?php echo $rows['kunci'];?>">
                            </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Kondisi Unit</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmKondisiUnit">
                                <option value=''>--Pilih kondisi unit--</option>
                                <?php
                                      foreach (Array('Sudah siap serah terima', 'Belum siap Serah terima') as $kondisi) { ?>
                                       <option value="<?php echo $kondisi;?>"<?php if (!(strcmp($kondisi, $rows['ready_ho']))) {echo "selected=\"selected\"";} ?>><?php echo $kondisi?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                            <textarea type="text" class="form-control" placeholder="Description" name="nmDesc"  ><?php echo $rows['keterangan'];?></textarea>
                            </div>
                            </div>        
                            
                    <div class="modal-footer">
                        <input type="hidden" name="idTowerFive" value="<?php echo $rows['id_ste'];?>" />
                        <a href="<?php echo $back;?>"><button type="button" class="btn btn-secondary" >Back</button></a>
                        <button type="submit" class="btn btn-primary" id="btn-insert">Save</button>
                    </div>
                            
                </form>
        </div>
    </div>
</div>
<?php
endforeach;
?>