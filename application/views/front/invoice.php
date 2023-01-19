<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Ordering System CodeIgniter</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>public/front/css/style.css">
</head>

<body>
    <div class="container my-3" style="border: 2px outset green;">
        <header class="mt-1 text-right">
        </header>
        <div class="invoice mb-3">
            <div class="row mb-3 p-3">
                <div class="col-6">
                    <h3 style="color:purple"><b>Sistem Pemesanan Makanan</b></h3>
                </div>
                <div class="col-6">
                    <p class="lead font-weight-bold mb-0"><?php echo $res['name'] ?></p>
                    <p class="mb-0"><?php echo $res['email'] ?></p>
                    <p><?php echo $res['alamat'] ?></p>
                </div>
                <div class="col-6">
                    <h3>INVOICE:</h3>
                    <p class="mb-0"><?php echo $order['nama_user'] ?></p>
                    <p class="mb-0"><?php echo $order['alamat'] ?></p>
                    <p class="mb-0"><?php echo $order['email'] ?></p>
                    <p class="mb-0"><?php echo $order['no_hp'] ?></p>
                </div>
                <div class="col-6">
                    <br><br>
                    <p class="mb-0"><b>Nomor pesanan:</b> <?php echo "#".$order['order_id']; ?></p>
                    <?php $cDate = strtotime($order['success-date']); ?>
                    <p class="mb-0"><b>Tanggal pesan:</b> <?php echo date('d-M-Y',$cDate); ?></p>
                    <p class="mb-0"><b>Metode Pembayaran:</b> Bayar ditempat</p>
                </div>
                
                <div class="col-12">
                <hr>
                    <table class="table responsive">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Restoran</th>
                                <th>Menu</th>
                                <th>Quantity</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $res['name']; ?></td>
                                <td><?php echo $order['nama_menu']; ?></td>
                                <td><?php echo $order['quantity']; ?></td>
                                <td><?php echo 'Rp '.$dish['Harga']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td class="font-weight-bold">Total</td>
                                <td class="font-weight-bold"><?php echo 'Rp '.$order['harga'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <footer class="text-center">
            <p class="mb-0">Terima Kasih Atas Pesanan Anda dan Memilih Kami!</p>
            <p>Kami Berharap Untuk Melihat Anda Lagi</p>
            <p>Untuk syarat & ketentuan silahkan kunjungi www.website.com</p>
        </footer>
    </div>
    <div class="container text-center">
        <a href="<?php echo base_url().'orders' ?>" class="btn btn-sm btn-warning p-2"><i class="fas fa-angle-left"></i>
            Kembali ke pesanan</a>
    </div>

</body>

</html>