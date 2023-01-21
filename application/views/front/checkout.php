<div class="container">
    
    <div class="row">
        <div class="col-md-8">
        <h2 class="mt-3">Order Preview</h2>
            <div class="table-responsive-sm">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if($this->cart->total_items() > 0) { 
                    foreach($cartItems as $item) { ?>
                        <tr>
                            <td>
                                <?php $image = $item['image'];?>
                                <img class="" width="100"
                                    src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$image; ?>">
                            </td>
                            <td><?php echo $item['nama_menu']; ?></td>
                            <td><?php echo 'Rp '.$item['harga']; ?></td>
                            <td><?php echo $item['qty']; ?></td>
                            <td><?php echo 'Rp '.$item['subtotal']; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="5">
                                <p>Tidak Ada Item Menu Di Keranjang Anda!!</p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <?php  if($this->cart->total_items() > 0) { ?>
                            <td class="text-left">Total: <b><?php echo 'Rp '.$this->cart->total();?></b></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <form action="<?php echo base_url().'checkout/index';?>" method="POST"
                class="form-container  shadow-container" style="width:80%">
                <h3 class="mt-3">Rincian pengiriman</h3><hr>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" type="text" style="height:70px;"
                        class="form-control
                    <?php echo (form_error('alamat') != "") ? 'is-invalid' : '';?>"><?php echo set_value('alamat', $user['alamat']);?></textarea>
                    <?php echo form_error('alamat'); ?>
                </div>
                <p class="lead mb-0">Bayar di tempat</p>
                <div class="container p-2 mb-3" style="background: #e5e5e5;">
                    Bayar di tempat
                </div>
                <div>
                    <a href="<?php echo base_url().'cart'; ?>" class="btn btn-warning"><i class="fas fa-angle-left"></i>
                        Back to cart</a>
                    <button type="submit" name="placeOrder" class="btn btn-success">Place Order <i
                            class="fas fa-angle-right"></i></button>
                </div>
                </from>
        </div>
    </div>
</div>