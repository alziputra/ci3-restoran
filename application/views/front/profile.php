<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css');?>">
<div class="row">
    <div class="col-md-6">
        <div class="wrapper mt-sm-5">
            <?php if($this->session->flashdata('success') != ""):?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success');?>
            </div>
            <?php endif ?>
            <?php $loggedUser = $this->session->userdata('user');?>
            <form action="<?php echo base_url().'profile/edit/'.$loggedUser['user_id']?>" method="POST">
                <h4 class="pb-4 border-bottom">Kelola Akun</h4>
                <div class="py-2">
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username"
                            class="bg-light form-control <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>"
                            value="<?php echo set_value('username', $user['username']);?>">
                        <?php echo form_error('username'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text"
                                class="bg-light form-control <?php echo (form_error('name') != "") ? 'is-invalid' : '';?>"
                                name="name" value="<?php echo set_value('name', $user['nama_user'])?>">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="text"
                                class="bg-light form-control <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>"
                                name="email" value="<?php echo set_value('email', $user['email'])?>">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="col-md-6">
                            <label for="no_hp">Kontak</label>
                            <input type="tel"
                                class="bg-light form-control <?php echo (form_error('no_hp') != "") ? 'is-invalid' : '';?>"
                                name="no_hp" value="<?php echo set_value('no_hp', $user['no_hp'])?>">
                            <?php echo form_error('no_hp'); ?>
                        </div>
                    </div>
                    <div>
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" type="text" style="height:70px;"
                            class="bg-light form-control <?php echo (form_error('alamat') != "") ? 'is-invalid' : '';?>"><?php echo set_value('alamat', $user['alamat']);?></textarea>
                        <?php echo form_error('alamat'); ?>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <button type="submit" class="btn btn-primary mr-3">Save Changes</button>
                        <a href="<?php echo base_url().'home' ?>" class="btn border button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="wrapper mt-sm-5">
            <?php if($this->session->flashdata('pwd_success') != ""):?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('pwd_success');?>
            </div>
            <?php endif ?>
            <?php if($this->session->flashdata('pwd_error') != ""):?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('pwd_error');?>
            </div>
            <?php endif ?>
            <?php $loggedUser = $this->session->userdata('user');?>
            <form action="<?php echo base_url().'profile/editPassword/'.$loggedUser['user_id']?>" method="POST">
                <h4 class="pb-4 border-bottom">Password</h4>
                <div class="py-2">
                    <div>
                        <input type="password"
                            class="bg-light form-control mb-2 <?php echo (form_error('cPassword') != "") ? 'is-invalid' : '';?>"
                            name="cPassword" placeholder="Current Password" value="<?php echo set_value('cPassword')?>">
                        <?php echo form_error('cPassword'); ?>
                    </div>
                    <div>
                        <input type="password"
                            class="bg-light form-control mb-2 <?php echo (form_error('nPassword') != "") ? 'is-invalid' : '';?>"
                            name="nPassword" placeholder="New Password" value="<?php echo set_value('nPassword')?>">
                        <?php echo form_error('nPassword'); ?>
                    </div>
                    <div>
                        <input type="password"
                            class="bg-light form-control mb-2 <?php echo (form_error('nRPassword') != "") ? 'is-invalid' : '';?>"
                            name="nRPassword" placeholder="Confirm Password"
                            value="<?php echo set_value('nRPassword')?>">
                        <?php echo form_error('nRPassword'); ?>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <button type="submit" class="btn btn-primary mr-3 mb-2">Simpan perubahan</button>
                        <a href="<?php echo base_url().'home' ?>" class="btn border button">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>