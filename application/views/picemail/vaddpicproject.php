<?= $this->session->flashdata('messageSuksesInsertTowerFour');?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <form id="form-insert" method="POST" autocomplete="off" role="form" action="<?php echo base_url('PicEmail/adddatapicemail')?>">
            
                            
                            
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Nama CM Tower</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Name"  name="nmPic">
                            </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Email" name="nmEmail" value="<?= set_value('nmEmail');?>">
                            <small class="text-danger"><?php echo form_error('nmEmail'); ?></small> 
                            </div>
                            </div>

                            
                            <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Nama Tower</label>
                            <div class="col-sm-10">
                            <select class="form-control" name="nmTower">
                                <option value=''>--Pilih Nama Tower--</option>
                                <?php
                                      foreach (Array('TOWER A', 'TOWER B', 'TOWER C', 'TOWER D', 'TOWER E','TOWER F') as $namatower) { ?>
                                      <option value="<?php echo $namatower;?>"><?php echo $namatower;?></option>
                                <?php } ?>
                                </select>
        
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


