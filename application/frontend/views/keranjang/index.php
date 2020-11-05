<section class="page-banner-section">
    <div class="container">
        <h1>Keranjang</h1>
        <ul class="page-depth">
            <li><a href="<?= base_url() ?>"><?= $app_name ?></a></li>
            <li><a href="<?= current_url() ?>">Keranjang</a></li>
        </ul>
    </div>
</section>

<section class="cart-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <?php if ($this->session->flashdata("gagal")) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> <?= $this->session->flashdata("sukses") ?>.
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata("sukses")) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> <?= $this->session->flashdata("sukses") ?>.
                    </div>
                <?php endif; ?>

                <div class="cart-box">
                    <table class=" table-responsive">
                        <thead>
                            <tr>
                                <th class="product-remove" style="width: 5%;">&nbsp;</th>
                                <th class="product-thumbnail" style="width: 10%;">&nbsp;</th>
                                <th class="product-name" style="width: 60%;">Produk</th>
                                <th class="product-price" style="width: 25%;">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $asli   = 0;
                            $fix    = 0;
                            $diskon = 0;
                            if (!empty($keranjang)) : ?>
                                <?php
                                foreach ($keranjang as $k) :
                                    $asli   += $k->produk->harga;
                                    $diskon += $k->produk->harga_diskon;
                                    $fix    += $k->produk->harga - $k->produk->harga_diskon;
                                ?>
                                    <tr>
                                        <td class="product-remove">
                                            <a href="<?= base_url("keranjang/hapus/" . urlencode(base64_encode($k->id))) ?>" class="remove"><i class="fa fa-times"></i></a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a target="_blank" href="<?= asset("gambar/" . $k->produk->gambar) ?>"><img src="<?= asset("gambar/" . $k->produk->gambar) ?>" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="<?= base_url("kelas/" . slug($k->produk->nama)) ?>"><?= $k->produk->nama ?></a>
                                        </td>
                                        <td class="product-price">
                                            <?php if ($k->produk->harga_diskon > 0) :  ?>
                                                <del>Rp <?= Rupiah3($k->produk->harga) ?></del> <br>
                                                Rp <?= Rupiah3($k->produk->harga - $k->produk->harga_diskon) ?>
                                            <?php else : ?>
                                                Rp <?= Rupiah3($k->produk->harga) ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada produk di keranjang</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="widget cart-widget">
                        <h2>Total Bayar</h2>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Harga Asli</th>
                                    <td>Rp <?= Rupiah3($asli) ?></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Harga Diskon</th>
                                    <td>Rp <?= Rupiah3($diskon) ?></td>
                                </tr>
                                <tr class="order-total">
                                    <th>TOTAL</th>
                                    <td class="total-price">Rp <?= Rupiah3($fix) ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <form method="POST" action="<?= base_url("keranjang/bayar") ?>">
                            <div class="">
                                <label for="">Catatan</label>
                                <textarea class="form-control mb-2" name="catatan" rows="2"></textarea>
                            </div>                            
                            <button id="btnsubmit" class="btn btn-primary text-center" href="#" style="width: 100%;">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End cart section -->