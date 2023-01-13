<div class="container my-5">
    <?php if($this->session->flashdata('res_success') != ""):?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('res_success');?>
    </div>
    <?php endif ?>
    <?php if($this->session->flashdata('error') != ""):?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error');?>
    </div>
    <?php endif ?>
    <!-- area text -->
    <div class="text-center">
        <h4>Kelola Restoran</h4>
    </div> <br><br>
    <div class="row">
        <!-- area button tambah -->
        <nav class="col-md-6">
            <button id="btn-add" name="btn-add" class="btn btn-secondary mb-3" onclick="return tambahDatresto()"><i class="fas fa-plus mr-1 "></i>Tambah restoran</button> 
        </nav>    
        <!-- area cari restoran -->
        <div class="col-md-6">
                <input class="form-control mb-3" id="myInput" type="text" placeholder="Cari ..." style="width:70%;">
            </div>          
        <div class="col-md-12">            
            <table class="table table-striped table-responsive table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Restoran</th>
                        <th>Email</th>
                        <th>Kontak</th>
                        <th>Website</th>
                        <th>Open Hrs</th>
                        <th>Close Hrs</th>
                        <th>Open Days</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($stores)) { ?>
                    <?php foreach($stores as $store) { ?>
                    <tr>
                        <td><?php echo $store['resto_id']; ?></td>
                        <td><?php echo $store['nama_resto']; ?></td>
                        <td><?php echo $store['email']; ?></td>
                        <td><?php echo $store['phone']; ?></td>
                        <td><?php echo $store['url']; ?></td>
                        <td><?php echo $store['open_hr']; ?></td>
                        <td><?php echo $store['close_hr']; ?></td>
                        <td><?php echo $store['open_days']; ?></td>
                        <td><?php echo $store['alamat']; ?></td>
                        <td>
                            <a href="<?php echo base_url().'admin/store/edit/'.$store['resto_id']?>"
                                class="btn btn-info mb-1"><i class="fas fa-edit mr-1"></i>Edit</a>

                            <a href="javascript:void(0);" onclick="deleteStore(<?php echo $store['resto_id']; ?>)"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                        <!-- <center>
                                <td><img class="img-responsive radius" 
                                src=" //echo base_url();?>public/admin/img/res.jpg"
                                style="min-width:150px; min-height: 100px;"></td>
                            </center> -->
                    </tr>
                    <?php } ?>
                    <?php } else {?>
                    <tr>
                        <td colspan="10">Records not found</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
function tambahDatresto()
        {
            location.href="<?php echo base_url().'admin/store/create_restaurant';?>"
        }

function deleteStore(id) {
    if (confirm("Are you sure you want to delete store?")) {
        window.location.href = '<?php echo base_url().'admin/store/delete/';?>' + id;
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