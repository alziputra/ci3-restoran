<div class="conatiner">
    <form action="<?php echo base_url().'admin/store/create_restaurant';?>" method="POST"
        class="form-container mx-auto  shadow-container" id="myForm" style="width:90%" enctype="multipart/form-data">
        <h3 class="mb-3 p-2 text-center mb-3">Tambah Data Restoran</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Nama Restoran</label>
                    <input type="text" name="res_name" id="rname" class="form-control
                    <?php echo (form_error('res_name') != "") ? 'is-invalid' : '';?>" placeholder="Nama Restoran"
                    value="<?php echo set_value('res_name');?>">

                    <?php echo form_error('res_name'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label class="control-label">E-mail Bisnis</label>
                    <input type="text" name="email" id="email" class="form-control form-control-danger
                    <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" placeholder="example@gmail.com"
                        value="<?php echo set_value('email');?>">

                        <?php echo form_error('email'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label class="control-label">Kontak</label>
                    <input type="number" name="phone" id="phone" class="form-control
                    <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>" placeholder="No.tlp/No.hp"
                        value="<?php echo set_value('phone');?>">
                        <?php echo form_error('phone'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label class="control-label">Website URL</label>
                    <input type="text" name="url" id="url" class="form-control form-control-danger
                    <?php echo (form_error('url') != "") ? 'is-invalid' : '';?>"
                        placeholder=" http://example.com" value="<?php echo set_value('url');?>">
                        <?php echo form_error('url'); ?>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <label class="control-label">Jam Buka</label>
                    <select name="open_hr" id="open_hr" class="form-control
                    <?php echo (form_error('open_hr') != "") ? 'is-invalid' : '';?>">
                        <option value="">--Pilih jam--</option>
                        <option value="06.00">06.00</option>
                        <option value="07.00">07.00</option>
                        <option value="08.00">08.00</option>
                        <option value="09.00">09.00</option>
                        <option value="10.00">10.00</option>
                        <option value="11.00">11.00</option>
                        <?php echo set_select('open_hr'); ?>
                    </select>
                    <?php echo form_error('open_hr');?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label class="control-label">Jam Tutup</label>
                    <select name="close_hr" id="close_hr" class="form-control
                    <?php echo (form_error('close_hr') != "") ? 'is-invalid' : '';?>">
                        <option value="">--Pilih jam--</option>
                        <option value="15.00">15.00</option>
                        <option value="16.00">16.00</option>
                        <option value="17.00">17.00</option>
                        <option value="18.00">18.00</option>
                        <option value="19.00">19.00</option>
                        <option value="20.00">20.00</option>
                        <option value="21.00">21.00</option>
                        <option value="22.00">22.00</option>
                        <option value="23.00">23.00</option>
                    </select>
                    <?php echo form_error('close_hr');?>
                    <span></span>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Hari Buka</label>
                    <select name="open_days" id="open_days" class="form-control <?php echo (form_error('open_days') != "") ? 'is-invalid' : '';?>">
                        <option value="">--Pilih hari--</option>
                        <option value="senin-rabu">Senin-rabu</option>
                        <option value="senin-kamis">Senin-kamis</option>
                        <option value="senin-jumat">Senin-jumat</option>
                        <option value="senin-jumat">Senin-sabtu</option>
                        <option value="setiap-hari">Setiap hari</option>
                    </select>
                    <?php echo form_error('open_days');?>
                    <span></span>
                </div> 
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control 
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Kategori restoran</label>
            <select name="kategori_nama" id="kategori_nama" class="form-control <?php echo (form_error('kategori_nama') != "") ? 'is-invalid' : '';?>">
                <option value="">--Pilih kategori--</option>
                <?php 
                if (!empty($cats)) { 
                    foreach($cats as $cat) {
                        ?>
                <option value="<?php echo $cat['kategori_id'];?>">
                    <?php echo $cat['kategori_nama'];?>
                    <?php echo set_select('kategori_nama');?>
                </option>
                <?php }
                }
                ?>
            </select>
            <?php echo form_error('kategori_nama');?>
            <span></span>
        </div>
        <h3 class="box-title m-t-40">Alamat</h3>
        <div class="form-group">
            <textarea name="alamat" id="alamat" type="text" style="height:70px;"
                class="form-control
            <?php echo (form_error('alamat') != "") ? 'is-invalid' : '';?>"><?php echo set_value('alamat');?></textarea>
            <?php echo form_error('alamat');?>
            <span></span>
        </div>
        <div class="form-actions">
            <input type="submit" id="btn" name="submit" class="btn btn-success" value="Save">
            <a href="<?php echo base_url().'admin/store/index'?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
<script>
    const open_hr = document.getElementById("open_hr");
    const close_hr = document.getElementById("close_hr");
    const open_days = document.getElementById("open_days");
    const kategori_nama = document.getElementById("kategori_nama");

    open_hr.value = "<?php echo $_POST['open_hr']; ?>";
    close_hr.value = "<?php echo $_POST['close_hr']; ?>";
    open_days.value = "<?php echo $_POST['open_days']; ?>";
    kategori_nama.value = "<?php echo $_POST['kategori_nama']; ?>";
</script>