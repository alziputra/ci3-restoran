<div class="container">
    <div class="container shadow-container">
        <?php if($this->session->flashdata('success') != ""):?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <h2>User yang tersedia</h2>
            </div>
            <input class="form-control mb-3" id="myInput" type="text" placeholder="Cari ..." style="width:50%;">
        </div><br>
        <!-- area button tambah -->
        <nav>
            <button id="btn-add" name="btn-add" class="btn btn-secondary mb-1" onclick="return tambahDatauser()"><i class="fas fa-plus mr-1"></i>Tambah user</button>        
        </nav><br>

        <div class="table-responsive-sm">
            <table class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($users)) {?>
                    <?php foreach($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['nama_user']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['no_hp']; ?></td>
                        <td><?php echo $user['alamat']; ?></td>
                        <td>
                            <a href="<?php echo base_url().'admin/user/edit/'.$user['user_id'];?>"
                                class="btn btn-info mb-1"><i
                                    class="fas fa-edit mr-1"></i>Edit</a>
                            <a href="javascript:void(0);" onclick="deleteUser(<?php echo $user['user_id']; ?>)"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } else {?>
                    <tr>
                        <td colspan="8">Data tidak ditemukan</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
function tambahDatauser()
        {
            location.href="<?php echo base_url().'admin/user/create_user';?>"
        }

function deleteUser(id) {
    if (confirm("Apakah Anda yakin ingin menghapus user?")) {
        window.location.href = '<?php echo base_url().'admin/user/delete/';?>' + id;
    }
}

$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>