<div class="conatiner">
    <form action="<?php echo base_url().'admin/store/edit/'.$store['resto_id'];?>" method="POST"
        class="form-container mx-auto  shadow-container" style="width:90%" enctype="multipart/form-data">
        <h3 class="mb-3 p-2 text-center mb-3">Edit "<?php echo $store['nama_resto'] ?>" Details</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Nama Restoran</label>
                    <input type="text" name="res_name"  class="form-control
                    <?php echo (form_error('res_name') != "") ? 'is-invalid' : '';?>" placeholder="nama restoran"
                        value="<?php echo set_value('res_name', $store['nama_resto']);?>">
                    <?php echo form_error('res_name'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">E-mail Bisnis</label>
                    <input type="text" name="email" class="form-control form-control-danger
                    <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" placeholder="example@gmail.com"
                        value="<?php echo set_value('email', $store['email']);?>">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Kontak</label>
                    <input type="text" name="phone" class="form-control
                    <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>" placeholder="no. tlp / no. hp"
                        value="<?php echo set_value('phone', $store['phone']);?>">
                        <?php echo form_error('phone'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Website URL</label>
                    <input type="text" name="url" class="form-control form-control-danger
                    <?php echo (form_error('url') != "") ? 'is-invalid' : '';?>" placeholder=" http://example.com"
                        value="<?php echo set_value('url', $store['url']);?>">
                    <?php echo form_error('url'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Jam Buka Restoran</label>
                    <select name="open_hr" id="open_hr" class="form-control
                    <?php echo (form_error('open_hr') != "") ? 'is-invalid' : '';?>" data-placeholder="Choose a Category">
                        <option value="">--Pilih jam--</option>
                        <option value="08.00 <?php echo $store['open_hr'] == "08.00" ? "selected" : "";?>">08.00</option>
                        <option value="09.00" <?php echo $store['open_hr'] == "09.00" ? "selected" : "";?>>09.00</option>
                        <option value="10.00" <?php echo $store['open_hr'] == "10.00" ? "selected" : "";?>>10.00</option>
                        <option value="11.00" <?php echo $store['open_hr'] == "11.00" ? "selected" : "";?>>11.00</option>
                    </select>
                    <?php echo form_error('open_hr'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Jam Tutup Restoran</label>
                    <select name="close_hr" id="close_hr" class="form-control
                    <?php echo (form_error('close_hr') != "") ? 'is-invalid' : '';?>" data-placeholder="Choose a Category">
                        <option value="">--Pilih jam--</option>
                        <option value="17.00 <?php echo $store['close_hr'] == "17.00" ? "selected" : "";?>">17.00</option>
                        <option value="18.00 <?php echo $store['close_hr'] == "18.00" ? "selected" : "";?>">18.00</option>
                        <option value="19.00 <?php echo $store['close_hr'] == "19.00" ? "selected" : "";?>">19.00</option>
                        <option value="20.00 <?php echo $store['close_hr'] == "20.00" ? "selected" : "";?>">20.00</option>
                        <option value="21.00 <?php echo $store['close_hr'] == "21.00" ? "selected" : "";?>">21.00</option>
                    </select>
                    <?php echo form_error('close_hr'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Hari Buka Restoran</label>
                    <select name="open_days" id="open_days" class="form-control 
                    <?php echo (form_error('open_days') != "") ? 'is-invalid' : '';?>" data-placeholder="Choose a Category"
                        tabindex="1">
                        <option value="">--Pilih hari--</option>
                        <option value="senin-jumat <?php echo $store['open_days'] == "senin-jumat" ? "selected" : "";?>">senin-jumat</option>
                        <option value="senin-sabtu <?php echo $store['open_days'] == "senin-sabtu" ? "selected" : "";?>">senin-sabtu</option>
                        <option value="setiap hari <?php echo $store['open_days'] == "setiap hari" ? "selected" : "";?>">setiap hari</option>
                    </select>
                    <?php echo form_error('open_days'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-danger">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control 
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <br>
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>

                    <?php if($store['img'] != '' && file_exists('./public/uploads/restaurant/thumb/'.$store['img'])) { ?>
                    <img class="mt-1" src="<?php echo base_url().'public/uploads/restaurant/thumb/'.$store['img']; ?>">
                    <?php } else {?>
                    <img width="300" src="<?php echo base_url().'public/uploads/no-image.png'?>">
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Kategori Restoran</label>
                    <select name="kategori_nama" id="kategori_nama"
                        class="form-control <?php echo (form_error('kategori_nama') != "") ? 'is-invalid' : '';?>">
                        <option value="">--Pilih kategori--</option>
                        <?php 
                if (!empty($cats)) { 
                    foreach($cats as $cat) {
                        ?>
                        <option value="<?php echo $cat['kategori_id'];?>">
                            <?php echo $cat['kategori_nama'];?>
                        </option>
                        <?php }
                }
                ?>
                    </select>
                    <?php echo form_error('kategori_nama');?>
                </div>
                <h3 class="box-title m-t-40">Alamat</h3>
                <div class="form-group">
                    <textarea name="address" type="text" style="height:70px;"
                        class="form-control
            <?php echo (form_error('alamat') != "") ? 'is-invalid' : '';?>"><?php echo set_value('alamat', $store['alamat']);?></textarea>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" name="submit" class="btn btn-success" value="Simpan perubahan">
            <a href="<?php echo base_url().'admin/store/index'?>" class="btn btn-secondary">Batal</a>
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