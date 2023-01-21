<div class="container mt-3">
    <div class="container shadow-container">
        <?php if($this->session->flashdata('dish_success') != ""):?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('dish_success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>
        <div class="btn-group">
            <h2>Semua Menu Restoran</h2>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <!-- area button tambah -->
            <nav>
                <button id="btn-add" name="btn-add" class="btn btn-secondary mb-3" onclick="return tambahMenu()"><i class="fas fa-plus mr-1 "></i>Tambah Menu</button> 
            </nav>
            <input class="form-control mb-3" id="myInput" type="text" placeholder="Cari ..." style="width:50%;">
        </div>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover table-striped table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($dishesh)) { ?>
                    <?php foreach($dishesh as $dish) {?>
                    <tr>
                        <td><?php echo $dish['resto_id']; ?></td>
                        <td><?php echo $dish['nama_menu']; ?></td>
                        <td><?php echo $dish['deskripsi']; ?></td>
                        <td><?php echo "Rp ".$dish['harga']; ?></td>
                        <td>
                            <a href="<?php echo base_url().'admin/menu/edit/'.$dish['menu_id']; ?>"
                                class="btn btn-info mb-1"><i
                                    class="fas fa-edit mr-1"></i>Edit</a>

                            <a href="javascript:void(0);" onclick="deleteMenu(<?php echo $dish['menu_id']; ?>)"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>

                        </td>
                    </tr>
                    <?php } ?>
                    <?php } else { ?>
                    <tr>
                        <td colspan="4">Data tidak ditemukan</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
function tambahMenu()
        {
            location.href="<?php echo base_url().'admin/menu/create_menu';?>"
        }

function deleteMenu(id) {
    if (confirm("Are you sure you want to delete dish?")) {
        window.location.href = '<?php echo base_url().'admin/menu/delete/';?>' + id;
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