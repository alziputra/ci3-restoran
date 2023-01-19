<div class="container table-responsive m-t-20">
    <h2 class="py-3 text-center">Pesanan User</h2>
    <table id="myTable" class="table table-bordered table-hover table-striped dataTable">
        <tbody>
            <tr>
                <td><strong>Dipesan Oleh:</strong></td>
                <td><?php echo $order['username'] ?></td>
            </tr>
            <tr>
                <td><strong>Menu Item:</strong></td>
                <td><?php echo $order['nama_menu'] ?></td>
            </tr>
            <tr>
                <td><strong>Quantity:</strong></td>
                <td><?php echo $order['quantity'] ?></td>
            </tr>
            <tr>
                <td><strong>Harga:</strong></td>
                <td><?php echo "Rp ".$order['harga'] ?></td>
            </tr>
            <tr>
                <td><strong>Alamat:</strong></td>
                <td><?php echo $order['alamat'] ?></td>
            </tr>
            <tr>
                <td><strong>Tanggal order:</strong></td>
                <td><?php echo $order['date'] ?></td>
            </tr>
            <form method="post" action="<?php echo base_url().'admin/orders/updateOrder/'.$order['order_id']; ?>">
                <tr>
                    <td><strong>Status pesanan:</strong></td>
                    <td>
                        <select class="form-control" name="status"
                            class="<?php echo (form_error('status') != "") ? 'is-invalid' : '';?>">
                            <option>Pilih status</option>
                            <option value="dalam proses">Dalam proses</option>
                            <option value="terkirim">Terkirim</option>
                            <option value="dibatalkan">Dibatalkan</option>
                        </select>
                        <?php echo form_error('status');?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-primary btn-block" type="submit">Submit</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>