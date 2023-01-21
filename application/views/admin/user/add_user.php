<div class="conatiner">

    <form action="<?php echo base_url().'admin/user/create_user'; ?>" method="POST"
        class="form-container mx-auto shadow-container" style="width:80%" id="myForm">
        <h3 class="mb-3 p-2 text-center">Informasi Tambah User</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control
                    <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>" name="username" id="userName"
                        placeholder="Masukan Username" value="<?php echo set_value('username')?>">
                    <?php echo form_error('username'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="nama_user">Nama</label>
                    <input type="text" class="form-control
                    <?php echo (form_error('nama_user') != "") ? 'is-invalid' : '';?>" name="nama_user" id="nama_user"
                        placeholder="Masukan Nama" value="<?php echo set_value('nama_user')?>">
                    <?php echo form_error('nama_user'); ?>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control
                    <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" name="email" placeholder="example@gmail.com"
                        id="email" value="<?php echo set_value('email')?>">
                    <?php echo form_error('email'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="no_hp">Kontak</label>
                    <input type="number" class="form-control
                    <?php echo (form_error('no_hp') != "") ? 'is-invalid' : '';?>" name="no_hp" placeholder="ex : 62821xxxxxx"
                        id="no_hp" value="<?php echo set_value('no_hp')?>">
                    <?php echo form_error('no_hp'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control
                    <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" name="password" id="pass"
                        placeholder="Password" value="<?php echo set_value('password')?>">
                    <?php echo form_error('password'); ?>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" type="text" style="height:70px;" id="alamat" class="form-control
            <?php echo (form_error('alamat') != "") ? 'is-invalid' : '';?>"
                value="<?php echo set_value('alamat');?>"></textarea>
            <?php echo form_error('alamat'); ?>
            <span></span>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="<?php echo base_url().'admin/user/index'; ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<script>
const form = document.getElementById('myForm');
const userName = document.getElementById('userName');
const nama_user = document.getElementById('nama_user');
const email = document.getElementById('email');
const pass = document.getElementById('pass');
const no_hp = document.getElementById('no_hp');
const alamat = document.getElementById('alamat');

form.addEventListener('submit', (event) => {
    event.preventDefault();
    validate();
})

const isEmail = (emailVal) => {
    var re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(emailVal)) {
        return "fail";
    }
}

const sendData = (sRate, count) => {
    if (sRate === count) {
        event.currentTarget.submit();
    }
}

const successMsg = () => {
    let formCon = document.getElementsByClassName('form-control');
    var count = formCon.length - 1;
    for (var i = 0; i < formCon.length; i++) {
        if (formCon[i].className === "form-control success") {
            var sRate = 0 + i;
            sendData(sRate, count);
        } else {
            return false;
        }
    }
}

const validate = () => {
    const userNameVal = userName.value.trim();
    const nama_userVal = nama_user.value.trim();
    const emailVal = email.value.trim();
    const passVal = pass.value.trim();
    const no_hpVal = no_hp.value.trim();
    const alamatVal = alamat.value.trim();

    //username validasi
    if (userNameVal === "") {
        setErrorMsg(userName, 'username tidak boleh kosong');
    } else if (userNameVal.length <= 4 || userNameVal.length >= 16) {
        setErrorMsg(userName, 'panjang username harus antara 5 - 15 karakter');
    } else if (!isNaN(userNameVal)) {
        setErrorMsg(userName, 'hanya karakter yang diperbolehkan');
    } else {
        setSuccessMsg(userName);
    }

    //nama user validasi
    if (nama_userVal === "") {
        setErrorMsg(nama_user, 'nama tidak boleh kosong');
    } else if (!isNaN(nama_userVal)) {
        setErrorMsg(nama_user, 'hanya karakter yang diperbolehkan');
    } else {
        setSuccessMsg(nama_user);
    }

    //email validasi
    if (emailVal === "") {
        setErrorMsg(email, 'email tidak boleh kosong');
    } else if (isEmail(emailVal) === "fail") {
        setErrorMsg(email, 'Masukkan email yang valid saja');
    } else {
        setSuccessMsg(email);
    }

    //password validasi
    if (passVal === "") {
        setErrorMsg(pass, 'password tidak boleh kosong');
    } else if (passVal.length <= 7 || passVal.length >= 16) {
        setErrorMsg(pass, 'panjang password harus antara 8 - 15 karakter');
    } else {
        setSuccessMsg(pass);
    }

    //no_hp validasi
    if (no_hpVal === "") {
        setErrorMsg(no_hp, 'kontak tidak boleh kosong');
    } else if (no_hpVal.length != 12) {
        setErrorMsg(no_hp, 'panjang kontak tidak boleh kurang dari 11 karakter');
    } else {
        setSuccessMsg(no_hp);
    }

    //alamat validasi
    if (alamatVal === "") {
        setErrorMsg(alamat, 'alamat tidak boleh kosong');
    } else if (alamatVal.length < 5) {
        setErrorMsg(alamat, "Masukkan alamat yang valid saja");
    } else {
        setSuccessMsg(alamat);
    }

    successMsg();
}

function setErrorMsg(ele, msg) {

    const formCon = ele.parentElement;
    const formInput = formCon.querySelector('.form-control');
    const span = formCon.querySelector('span');
    span.innerText = msg;
    formInput.className = "form-control is-invalid";
    span.className = "invalid-feedback font-weight-bold"
}

function setSuccessMsg(ele) {
    const formCon = ele.parentElement;
    const formInput = formCon.querySelector('.form-control');
    formInput.className = "form-control success";
}
</script>