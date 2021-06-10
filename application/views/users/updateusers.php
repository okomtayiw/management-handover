
<?php
foreach($users as $rows ) : 
?>
<?= $this->session->flashdata('messageSuksesUpdateUser');?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <form id="form-insert" method="POST" autocomplete="off" role="form" action="<?php echo base_url('user/saveUpdateUser')?>">
                
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label"> Name Unit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nama Unit" value="<?php echo $rows['username'];?>" name="nmUser">
                                <small class="text-danger"><?php echo form_error('nmUser'); ?></small>  
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
                                <label  class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmStatusUser">
                                <option value=''>--Pilih Status User--</option>
                                <?php
                                      foreach (Array('Active', 'No active') as $kondisi) { ?>
                                       <option value="<?php echo $kondisi;?>"<?php if (!(strcmp($kondisi, $rows['status']))) {echo "selected=\"selected\"";} ?>><?php echo $kondisi?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="nmLevel">
                                <option value=''>--Pilih level User--</option>
                                <?php
                                      foreach (Array('Superadmin', 'Admin', 'User') as $level) { ?>
                                       <option value="<?php echo $level;?>"<?php if (!(strcmp($level, $rows['role_id']))) {echo "selected=\"selected\"";} ?>><?php echo $level?></option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>


                        
                            
                    <div class="modal-footer">
                        <input type="hidden" name="idUser" value="<?php echo $rows['id_users'];?>" />
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