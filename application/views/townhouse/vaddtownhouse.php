<?= $this->session->flashdata('messageSuksesInsertTowerFownhouse');?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <form id="form-insert" method="POST" autocomplete="off" role="form" action="<?php echo base_url('towertownhouse/addtowertownhouse')?>">
                
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label"> Name Unit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nama Unit" value="<?= set_value('nmUnit');?>" name="nmUnit">
                                <small class="text-danger"><?php echo form_error('nmUnit'); ?></small>  
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Type"  name="nmType">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">SQM</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="SQM"  name="nmSqm">
        
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Pemilik </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nama Pemilik" name="nmPemilik" value="<?= set_value('nmPemilik');?>">
                            <small class="text-danger"><?php echo form_error('nmPemilik'); ?></small> 
                            </div>
                            </div>


                            <!-- <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                            <textarea type="text" class="form-control" placeholder="Alamat pemilik" name="nmAddress" ></textarea>
                            </div>
                            </div> -->


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Email" name="nmEmail" value="<?= set_value('nmEmail');?>">
                            <small class="text-danger"><?php echo form_error('nmEmail'); ?></small> 
                            </div>
                            </div>
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Undangan</label>
                            <div class="col-sm-10">
                            <input type="date" id="undangan1" data-date-format="YYYY/MM/DD"  name="nmUndangan1" value="">
                            <small class="text-danger"><?php echo form_error('nmUndangan1'); ?></small> 
                            <input type="date" id="undangan2"  name="nmUndangan2" value="">
                            <small class="text-danger"><?php echo form_error('nmUndangan2'); ?></small> 
                            <input type="date" id="undangan3"  name="nmUndangan3" value="">
                            <small class="text-danger"><?php echo form_error('nmUndangan3'); ?></small> 
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
                                <option value="<?php echo $status['id_status'];?>"><?php echo $status['status'];?></option>
                                <?php 
                                endforeach;
                                ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Tanggal Serah Terima</label>
                            <div class="col-sm-10">
                            <input type="date" id="dateHO" data-date-format="dd/MM/YY"  name="nmDateHO" >
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">PIC HO</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmPicHO">
                                <option value=''>--Pilih pic ho--</option>
                                <?php
                                      foreach (Array('Budi', 'Andi', 'sulaiman') as $picho) { ?>
                                      <option value="<?php echo $picho;?>"><?php echo $picho;?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Status Defect tahap 1</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmDefect">
                                <option value=''>--Pilih status defect--</option>
                                <?php 
                                foreach ($sDefect as $defect) :

                                ?>
                                <option value="<?php echo $defect['id_defect'];?>"><?php echo $defect['name_defect'];?></option>
                                <?php 
                                endforeach;
                                ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Total Defect tahap 1</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="totDefect1">
                                <option value=''>--Pilih total defect--</option>
                                <?php 
                                for($i=0;$i<100;$i++){ ?>
                                     
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Date Closed Defect 1 Tenant</label>
                            <div class="col-sm-10">
                            <input type="date" id="dateClosedDefectOne" data-date-format="dd/MM/YY"  name="nmDateCloseDefectOneTenant" >
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Status Defect tahap 2</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmDefect2">
                                <option value=''>--Pilih status defect--</option>
                                <?php 
                                foreach ($sDefect as $defect) :

                                ?>
                                <option value="<?php echo $defect['id_defect'];?>"><?php echo $defect['name_defect'];?></option>
                                <?php 
                                endforeach;
                                ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Total Defect tahap 2</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="totDefect2">
                                <option value=''>--Pilih total defect--</option>
                                <?php 
                                for($i=0;$i<100;$i++){ ?>
                                     
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Date Closed Defect 2 Tenant</label>
                            <div class="col-sm-10">
                            <input type="date" id="dateClosedDefectTwo" data-date-format="dd/MM/YY"  name="nmDateCloseDefectTwoTenant" >
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Status Defect tahap 3</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmDefect3">
                                <option value=''>--Pilih status defect--</option>
                                <?php 
                                foreach ($sDefect as $defect) :

                                ?>
                                <option value="<?php echo $defect['id_defect'];?>"><?php echo $defect['name_defect'];?></option>
                                <?php 
                                endforeach;
                                ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Total Defect tahap 3</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="totDefect3">
                                <option value=''>--Pilih total defect--</option>
                                <?php 
                                for($i=0;$i<100;$i++){ ?>         
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Date Closed Defect 3 Tenant</label>
                            <div class="col-sm-10">
                            <input type="date" id="dateClosedDefectTree" data-date-format="dd/MM/YY"  name="nmDateCloseDefectTreeTenant">
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
                                <option value="<?php echo $statusPay['id_status_unit'];?>"><?php echo $statusPay['nama_status_unit'];?></option>
                                <?php 
                                endforeach;
                                ?>
                                </select>
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">No. Seri KWH Listrik</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="No. Seri KWH Listrik" name="nmNoSeriKWHMeter">
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Daya Terpasang</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Daya Terpasang" name="nmDayaTerpasang">
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Start Awal Listrik </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Start Awal Listrik" name="nmStartKwhListrik">
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">No. Seri Water Meter </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="No. Seri Water Meter" name="nmNoSeriWaterMeter">
                            </div>
                            </div>



                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Start Awal Air</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Stat Awal Air" name="nmStartAwalAir">
                            </div>
                            </div>


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Tanggal serah terima ke POM</label>
                            <div class="col-sm-10">
                            <input type="date" id="dateToPOM" data-date-format="dd/MM/YY"  name="nmDateToPom" >
                            </div>
                            </div>

                            


                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Remote</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Remote" name="nmRemote">
                            </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Kunci</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="kunci" name="nmKunci">
                            </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Kondisi Unit</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmKondisiUnit">
                                <option value=''>--Pilih kondisi unit--</option>
                                <?php
                                      foreach (Array('Sudah siap serah terima', 'Belum siap Serah terima') as $kondisi) { ?>
                                      <option value="<?php echo $kondisi;?>"><?php echo $kondisi;?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                            <textarea type="text" class="form-control" placeholder="Description" name="nmDesc"></textarea>
                            </div>
                            </div>
                            
                            
                    <div class="modal-footer">
                        <a href="<?php echo $back;?>"><button type="button" class="btn btn-secondary" >Back</button></a>
                        <button type="submit" class="btn btn-primary" id="btn-insert">Save</button>
                    </div>
                            
                </form>
        </div>
    </div>
</div>


