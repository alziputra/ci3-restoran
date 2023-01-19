<div class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Restoran</h1>
        </div>
        <hr>
    </div>
</div>
<div class="container text-center padding dish-card">
    <div class="row container">
        <?php if(!empty($stores)) { ?>
        <?php foreach($stores as $store) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm">
                <?php $image = $store['img'];?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/restaurant/thumb/'.$image; ?>">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $store['nama_resto']; ?></h4>
                    <p class="card-text mb-0"><?php echo $store['kategori_nama']." Restaurant"; ?></p>
                    <p class="card-text mb-0"><?php echo $store['alamat']; ?></p>
                    <hr>
                    <p class="card-text mb-0"></p>
                    <p class="card-text mb-0">JAM BUKA</p>
                    <p class="card-text mb-0"><?php echo $store['open_days']; ?></p>
                    <p class="card-text"><?php echo $store['open_hr']; ?> - <?php echo $store['close_hr']; ?></p>
                    <hr>
                    <a href="<?php echo base_url().'dish/list/'.$store['resto_id']; ?>" class="btn btn-primary">Lihat
                        Menu</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <h1>Data tidak ditemukan</h1>
        <?php } ?>
    </div>
</div>