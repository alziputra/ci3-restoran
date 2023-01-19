<div class="container mt-3">
    <div class="container shadow-container mt-3">
        <?php if($this->session->flashdata('cat_success') != ""):?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('cat_success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>
        <div class="container">
            <h2>Semua Kategori Restoran</h2>
            <div class="d-flex justify-content-between align-items-center">
                <!-- area button tambah -->
                <nav class="col-md-6">
                    <button id="btn-add" name="btn-add" class="btn btn-secondary mb-3" onclick="return tambahKategori()"><i class="fas fa-plus mr-1 "></i>Tambah restoran</button> 
                </nav>  

                <input class="form-control mb-3" id="myInput" type="text" placeholder="Cari ..." style="width:50%;">
            </div>
            <div class="table-responsive-sm">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if(!empty($cats)) { ?>
                        <?php foreach($cats as $cat) {?>
                        <tr>
                            <td><?php echo $cat['kategori_id']; ?></td>
                            <td><?php echo $cat['kategori_nama']; ?></td>
                            <td>
                                <a href="<?php echo base_url().'admin/category/edit/'.$cat['kategori_id']?>"
                                    class="btn btn-info mb-1"><i
                                        class="fas fa-edit mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" onclick="deleteCat(<?php echo $cat['kategori_id']; ?>)"
                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>

                            </td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="4">Records Not found</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
function tambahKategori()
        {
            location.href="<?php echo base_url().'admin/category/create_category';?>"
        }
function deleteCat(id) {
    if (confirm("Are you sure you want to delete category?")) {
        window.location.href = '<?php echo base_url().'admin/category/delete/';?>' + id;
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