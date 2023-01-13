<div class="conatiner">

    <form action="<?php echo base_url().'admin/user/edit/'.$user['user_id']; ?>" method="POST"
        class="form-container mx-auto shadow-container" id="myForm" style="width:80%">
        <h3 class="mb-3 p-2 text-center">Edit User "<?php echo $user['username']; ?>"</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="userName" class="form-control
                    <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>" name="username"
                        value="<?php echo set_value('username', $user['username'])?>">
                    <?php echo form_error('username'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="Name" class="form-control
                    <?php echo (form_error('nama_user') != "") ? 'is-invalid' : '';?>" name="name"
                        value="<?php echo set_value('nama_user', $user['nama_user'])?>">
                    <?php echo form_error('nama_user'); ?>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control
                    <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" name="email" placeholder="email"
                        value="<?php echo set_value('email', $user['email'])?>">
                    <?php echo form_error('email'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="no_hp">No. Hp</label>
                    <input type="number" id="no_hp" class="form-control
                    <?php echo (form_error('no_hp') != "") ? 'is-invalid' : '';?>" name="no_hp" placeholder="No. Hp"
                        value="<?php echo set_value('no_hp', $user['no_hp'])?>">
                    <?php echo form_error('no_hp'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="pass" class="form-control
                    <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" name="password"
                        placeholder="Password" value="<?php echo set_value('password', $user['password'])?>">
                    <?php echo form_error('password'); ?>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" type="text" style="height:70px;"
                class="form-control
            <?php echo (form_error('alamat') != "") ? 'is-invalid' : '';?>"><?php echo set_value('alamat', $user['alamat']);?></textarea>
            <?php echo form_error('alamat'); ?>
            <span></span>
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="<?php echo base_url().'admin/user/index'; ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<script>
const form = document.getElementById('myForm');
const userName = document.getElementById('userName');
const Name = document.getElementById('Nama_user');
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
    const NameVal = Name.value.trim();
    const emailVal = email.value.trim();
    const passVal = pass.value.trim();
    const no_hpVal = no_hp.value.trim();
    const alamatVal = alamat.value.trim();

    //username validation
    if (userNameVal === "") {
        setErrorMsg(userName, 'Username tidak boleh kosong');
    } else if (userNameVal.length <= 4 || userNameVal.length >= 16) {
        setErrorMsg(userName, 'panjang username harus antara 5 dan 15"');
    } else if (!isNaN(userNameVal)) {
        setErrorMsg(userName, 'Hanya karakter yang diperbolehkan');
    } else {
        setSuccessMsg(userName);
    }

    //name validation
    if (NameVal === "") {
        setErrorMsg(Name, 'Name tidak boleh kosong');
    } else if (!isNaN(NameVal)) {
        setErrorMsg(Name, 'Hanya karakter yang diperbolehkan');
    } else {
        setSuccessMsg(Name);
    }

    //email validation
    if (emailVal === "") {
        setErrorMsg(email, 'email tidak boleh kosong');
    } else if (isEmail(emailVal) === "gagal") {
        setErrorMsg(email, 'email yang valid saja');
    } else {
        setSuccessMsg(email);
    }

    //password validation
    if (passVal === "") {
        setErrorMsg(pass, 'password tidak boleh kosong');
    } else if (passVal.length <= 7 || passVal.length >= 16) {
        setErrorMsg(pass, 'panjang password harus antara 8 dan 15');
    } else {
        setSuccessMsg(pass);
    }

    //no_hp validation
    if (no_hpVal === "") {
        setErrorMsg(no_hp, 'no_hp tidak boleh kosong');
    } else if (no_hpVal.length != 10) {
        setErrorMsg(no_hp, 'no handphone yang valid saja');
    } else {
        setSuccessMsg(no_hp);
    }

    //alamat validation
    if (alamatVal === "") {
        setErrorMsg(alamat, 'alamat tidak boleh kosong');
    } else if (alamatVal.length < 5) {
        setErrorMsg(alamat, "alamat yang valid saja");
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