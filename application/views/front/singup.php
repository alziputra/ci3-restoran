<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/profile.css');?>">
</head>

<body>
    <div class="wrapper container">

        <h1 class="text-center my-3">Buat Akun</h1>
        <form action="<?php echo base_url().'singup/create_user'; ?>" method="POST" name="myForm" id="myForm"
            class="form-container mx-auto shadow-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Enter Username</label>
                        <input type="text" class="form-control
                <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>" name="username" id="userName"
                            placeholder="Enter Username" value="<?php echo set_value('username')?>">
                        <?php echo form_error('username'); ?>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Enter Name</label>
                        <input type="text" class="form-control
                <?php echo (form_error('name') != "") ? 'is-invalid' : '';?>" name="name" id="Name"
                            placeholder="Enter  Name" value="<?php echo set_value('name')?>">
                        <?php echo form_error('name'); ?>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control
                <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" name="email" placeholder="Email"
                            id="email" value="<?php echo set_value('email')?>">
                        <?php echo form_error('email'); ?>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Kontak</label>
                        <input type="number" class="form-control
                <?php echo (form_error('no_hp') != "") ? 'is-invalid' : '';?>" name="no_hp" placeholder="ex: 62821xxxx"
                            id="no_hp" value="<?php echo set_value('no_hp')?>">
                        <?php echo form_error('no_hp'); ?>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" type="text" style="height:70px;" class="form-control
        <?php echo (form_error('alamat') != "") ? 'is-invalid' : '';?>"
                    value="<?php echo set_value('alamat');?>"></textarea>
                <?php echo form_error('alamat'); ?>
                <span></span>
            </div>
            <div class="status text-center text-danger font-weight-bold my-2"></div>
            <button type="submit" class="btn btn-primary btn-block">Daftar</button><br>
            <p>Sudah punya akun? <a href="<?php echo base_url().'login/index';?>">Login!</a></p>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script>
    const form = document.getElementById('myForm');
    const userName = document.getElementById('userName');
    const Name = document.getElementById('Name');
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
            return "gagal";
        }
    }

    const sendData = (sRate, count) => {
        if(sRate === count) {
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
        const NameVal = Name.value.trim();
        const emailVal = email.value.trim();
        const passVal = pass.value.trim();
        const no_hpVal = no_hp.value.trim();
        const alamatVal = alamat.value.trim();

        //validasi username 
        if (userNameVal === "") {
            setErrorMsg(userName, 'username tidak boleh kosong');
        } else if (userNameVal.length <= 4 || userNameVal.length >= 16) {
            setErrorMsg(userName, 'username length should be between 5 and 15"');
        } else if (!isNaN(userNameVal)) {
            setErrorMsg(userName, 'hanya karakter yang diperbolehkan');
        } else {
            setSuccessMsg(userName);
        }

        // validasi name 
        if (NameVal === "") {
            setErrorMsg(Name, 'nama tidak boleh kosong');
        } else if (!isNaN(NameVal)) {
            setErrorMsg(Name, 'hanya karakter yang diperbolehkan');
        } else {
            setSuccessMsg(Name);
        }

        // validasi email 
        if (emailVal === "") {
            setErrorMsg(email, 'email tidak boleh kosong');
        } else if (isEmail(emailVal) === "gagal") {
            setErrorMsg(email, 'masukkan email yang valid saja');
        } else {
            setSuccessMsg(email);
        }

        //validasi password 
        if (passVal === "") {
            setErrorMsg(pass, 'password tidak boleh kosong');
        } else if (passVal.length <= 7 || passVal.length >= 16) {
            setErrorMsg(pass, 'panjang password harus antara 8-15');
        } else {
            setSuccessMsg(pass);
        }

        // validasi no_hp 
        if (no_hpVal === "") {
            setErrorMsg(no_hp, 'kontak tidak boleh kosong');
        } else if (no_hpVal.length <= 12 || no_hpVal.length >= 17) {
            setErrorMsg(no_hp, 'masukkan kontak yang valid saja');
        } else {
            setSuccessMsg(no_hp);
        }

        // validasi alamat 
        if (alamatVal === "") {
            setErrorMsg(alamat, 'alamat tidak boleh kosong');
        } else if (alamatVal.length < 5) {
            setErrorMsg(alamat, "masukkan alamat yang valid saja");
        } else {
            setSuccessMsg(alamat);
        }

        successMsg();
    }

    // fungsi pesan error
    function setErrorMsg(ele, msg) {

        const formCon = ele.parentElement;
        const formInput = formCon.querySelector('.form-control');
        const span = formCon.querySelector('span');
        span.innerText = msg;
        formInput.className = "form-control is-invalid";
        span.className = "invalid-feedback font-weight-bold"
    }

    // fungsi pesan sukses
    function setSuccessMsg(ele) {
        const formCon = ele.parentElement;
        const formInput = formCon.querySelector('.form-control');
        formInput.className = "form-control success";
    }

    </script>
</body>
</html>