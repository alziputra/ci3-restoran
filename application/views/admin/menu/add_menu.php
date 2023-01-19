<div class="conatiner">
    <form action="<?php echo base_url().'admin/menu/create_menu';?>" method="POST" id="myForm" name="myForm"
        class="form-container mx-auto  shadow-container" style="width:80%" enctype="multipart/form-data">
        <h3 class="mb-3 text-center">Tambah Item Menu</h3>
        <div class="form-group">
            <label class="control-label">Pilih Restoran</label>
            <select name="namaresto" id="resname"
                class="form-control <?php echo (form_error('namaresto') != "") ? 'is-invalid' : '';?>">
                <option>--Select Restaurant--</option>
                <?php 
                if (!empty($stores)) { 
                    foreach($stores as $store) {
                        ?>
                <option value="<?php echo $store['resto_id'];?>">
                    <?php echo set_select('resname');?>
                    <?php echo $store['name'];?>
                </option>
                <?php }
                }
                ?>
            </select>
            <?php echo form_error('namaresto');?>
            <span></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="namamenu">Nama Menu</label>
                    <input type="text" class="form-control my-2 
                    <?php echo (form_error('namamenu') != "") ? 'is-invalid' : '';?>" name="namamenu" id="namamenu"
                        placeholder="Nama Menu" value="<?php echo set_value('namamenu'); ?>">
                    <?php echo form_error('namamenu'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control my-2
                    <?php echo (form_error('harga') != "") ? 'is-invalid' : '';?>" id="harga" name="harga"
                        placeholder="harga Rp " value="<?php echo set_value('harga'); ?>">
                    <?php echo form_error('harga'); ?>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control my-2
                    <?php echo (form_error('deskripsi') != "") ? 'is-invalid' : '';?>" id="deskripsi" name="deskripsi"
                        placeholder="deskripsi" value="<?php echo set_value('deskripsi'); ?>">
                    <?php echo form_error('deskripsi'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="img">Food Image</label>
                    <input type="file" id="image" name="image" placeholder="Image" class="form-control my-2
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <span></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-2">Submit</button>
        <a href="<?php echo base_url().'admin/menu/index'?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<script>
    const form = document.getElementById('myForm');
    const resname = document.getElementById("resname");
    const namamenu = document.getElementById("namamenu");
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

    const isImage = (imageVal) => {
        fType = imageVal.substring(imageVal.indexOf('.') + 1);
        if(fType === "gif" || fType === "jpg" || fType === "png" || fType ==="jpeg") {
            return "pass";   
        } else {
            return "fail";
        }
    }

    const successMsg = () => {
        let formCon = document.getElementsByClassName('form-control');
        var count = formCon.length - 1;
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
        const namamenuVal = namamenu.value.trim();
        const hargaVal = harga.value.trim();
        const deskripsiVal = deskripsi.value.trim();
        const imageVal = image.value.trim();

        if (resnameVal === "--Select Restaurant--") {
            setErrorMsg(resname, 'select restaurant name');
        } else {
            setSuccessMsg(resname);
        }
        if (namamenuVal === "") {
            setErrorMsg(namamenu, 'Nama Menu cannot be blank');
        } else {
            setSuccessMsg(namamenu);
        }
        if (hargaVal === "") {
            setErrorMsg(harga, 'harga cannot be blank');
        } else {
            setSuccessMsg(harga);
        }
        if (deskripsiVal === "") {
            setErrorMsg(deskripsi, 'deskripsi name cannot be empty');
        } else {
            setSuccessMsg(deskripsi);
        }
        if (imageVal == "") {
            setErrorMsg(image, 'select image');
        } else if(isImage(imageVal) === "fail"){
            setErrorMsg(image, 'file format is not valid');
        } else {
            setSuccessMsg(image);
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