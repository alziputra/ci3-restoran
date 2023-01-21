<div class="conatiner">
    <form id="myForm" action="<?php echo base_url().'admin/menu/edit/'.$dish['menu_id'];?>" method="POST"
        class="form-container mx-auto  shadow-container" style="width:80%" enctype="multipart/form-data">
        <h3 class="mb-3 text-center">Edit Menu Restoran "<?php echo $dish['nama_menu']; ?>"</h3>
        <div class="form-group">
            <label class="control-label">Pilih Restoran</label>
            <select name="namarestoran" id="resname"
                class="form-control <?php echo (form_error('namarestoran') != "") ? 'is-invalid' : '';?>">
                <option>--Pilih Restoran--</option>
                <?php 
                if (!empty($stores)) { 
                    foreach($stores as $store) {
                        ?>
                <option value="<?php echo $store['resto_id'];?>">
                    <?php echo set_select('resname', $store['nama_resto']);?>
                    <?php echo $store['nama_resto'];?>
                </option>
                <?php }
                }
                ?>
            </select>
            <span></span>
            <?php echo form_error('namarestoran');?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_menu">Nama Menu</label>
                    <input type="text" class="form-control my-2 
                    <?php echo (form_error('nama_menu') != "") ? 'is-invalid' : '';?>" name="nama_menu" id="nama_menu"
                        placeholder="Enter nama menu" value="<?php echo set_value('nama_menu', $dish['nama_menu']); ?>">
                    <span></span>
                    <?php echo form_error('nama_menu'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="harga" class="form-control my-2
                    <?php echo (form_error('harga') != "") ? 'is-invalid' : '';?>" id="harga" name="harga"
                        placeholder="Enter harga" value="<?php echo set_value('harga', $dish['harga']); ?>">
                    <span></span>
                    <?php echo form_error('harga'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control my-2
                    <?php echo (form_error('deskripsi') != "") ? 'is-invalid' : '';?>" id="deskripsi" name="deskripsi"
                        placeholder="deskripsi" value="<?php echo set_value('deskripsi', $dish['deskripsi']); ?>">
                    <span></span>
                    <?php echo form_error('deskripsi'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="img">Foto Menu Restoran</label>
                    <input type="file" id="image" name="image" placeholder="Enter Image" class="form-control my-2
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>

                    <?php if($dish['img'] != "" && file_exists('./public/uploads/dishesh/thumb/'.$dish['img'])) { ?>

                    <img src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$dish['img'];?>">

                    <?php } else { ?>
                    <img width="300" src="<?php echo base_url().'public/uploads/no-image.png'?>">
                    <?php } ?>
                    <span></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-2">Make Changes</button>
        <a href="<?php echo base_url().'admin/menu/index'?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<script>
const form = document.getElementById('myForm');
const resname = document.getElementById("resname");
const nama_menu = document.getElementById("nama_menu");
const harga = document.getElementById("harga");
const deskripsi = document.getElementById("deskripsi");
const image = document.getElementById("image");

form.addEventListener('submit', (event) => {
    event.preventDefault();
    validate();
})

const sendData = (sRate, count) => {
    if (sRate === count) {
        event.currentTarget.submit();
    }
}

const successMsg = () => {
    let formCon = document.getElementsByClassName('form-control');
    var count = formCon.length - 2;
    for (var i = 0; i < formCon.length; i++) {
        if (formCon[i].className === "form-control my-2 success") {
            var sRate = 0 + i;
            sendData(sRate, count);
        } else {
            return false;
        }
    }
}

const validate = () => {
    const resnameVal = resname.value.trim();
    const nama_menuVal = nama_menu.value.trim();
    const hargaVal = harga.value.trim();
    const deskripsiVal = deskripsi.value.trim();
    const imageVal = image.value.trim();

    if (resnameVal === "--Pilih Restoran--") {
        setErrorMsg(resname, 'pilih nama restoran');
    } else {
        setSuccessMsg(resname);
    }
    if (nama_menuVal === "") {
        setErrorMsg(nama_menu, 'nama menu tidak boleh kosong');
    } else {
        setSuccessMsg(nama_menu);
    }
    if (hargaVal === "") {
        setErrorMsg(harga, 'harga tidak boleh kosong');
    } else {
        setSuccessMsg(harga);
    }
    if (deskripsiVal === "") {
        setErrorMsg(deskripsi, 'deskripsi tidak boleh kosong');
    } else {
        setSuccessMsg(deskripsi);
    }

    successMsg();

}

function setErrorMsg(ele, errormsgs) {
    const formCon = ele.parentElement;
    const formInput = formCon.querySelector('.form-control');
    const span = formCon.querySelector('span');
    span.innerText = errormsgs;
    formInput.className = "form-control my-2 is-invalid";
    span.className = "invalid-feedback font-weight-bold";
}

function setSuccessMsg(ele) {
    const formGroup = ele.parentElement;
    const formInput = formGroup.querySelector('.form-control');
    formInput.className = "form-control my-2 success";
}
</script>