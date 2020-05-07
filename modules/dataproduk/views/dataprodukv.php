
<div class="content-wrapper">
    <div class="container-pills">
        <div id="list" class="w3-container pills">
            <!-- Content Header (Page header) --> 
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Semua Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                            <button class="btn bg-warning btn-sm" onclick="openPills('add')"><i class="fas fa-plus"></i> Tambah Produk</button>
                            </li>
                        </ol>
                    </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header card-warning card-outline">
                        <div class="card-title col-md-12">
                            <div class="row col-md-12">
                                <h4 class="row col-md-8">Daftar Produk</h4>
                                <div class="row col-md-4">
                                    <form action="<?php base_url('dataproduk');?>" method="post">
                                        <div class="ml-5 input-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Search" autocomplete="off" autofocus>
                                            <div class="input-group-append">
                                                <input class="btn btn-warning" type="submit" name="submit" value="Cari">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <h5 class="font-weight-light font-italic text-gray" style="font-size:15px;">Jumlah : <?php echo $total_rows;?> Produk</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive">
                            <thead class="bg-warning">
                                <tr>
                                    <th class="text-center" style="width: 1%">
                                        NO
                                    </th>
                                    <th class="text-center" style="width: 1%">
                                        Foto
                                    </th>
                                    <th class="text-center">
                                        Nama
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Harga
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Kategori
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Vendor
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Stok
                                    </th>
                                    <th class="text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <?php if(empty($products)) : ?>
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-light" role="alert">
                                        <center><strong class="text-danger">Data tidak ditemukan!</strong> periksa kembali data pencarian anda.</center>
                                    </div>
                                </td>
                            </tr>
                            <?php endif;?>
                            <?php 
                            $no=1;
                            foreach($products as $p){ ?>
                            <tbody>
                                
                                <tr>
                                <td class="text-center">
                                    <?php echo ++$start ?>
                                </td>
                                <td class="text-center">
                                    <img class="brand-image rounded" width="100px" src="<?= base_url()?>gambar/<?php echo $p['prod_img'];?>" alt="foto">
                                </td>
                                <td>
                                    <a href="#" style="font-size:20px;"><b><?php echo $p['prod_name']; ?></b></a>
                                    <br/>
                                    <small>
                                        <?php echo $p['prod_desc']; ?>
                                    </small>
                                </td>
                                <td class="text-left">
                                    <span class="text-left"><h6 class="font-italic" style="font-size:16px; margin-bottom:-6px;">Jual</h6></span>
                                    Rp. <?php echo number_format($p['prod_price']) ?>
                                    <span class="text-left"><h6 class="font-italic" style="font-size:16px; margin-bottom:-6px;">Beli</h6></span>
                                    Rp. <?php echo number_format($p['hargabeli']) ?>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success"><?php echo $p['cat_name']; ?></span>
                                </td>
                                <td class="text-center">
                                    <?php echo $p['vend_id']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $p['quantity']; ?>
                                </td>
                                <td class="project-actions text-center">
                                    <a href="<?php echo base_url('dataproduk/edit/'), $p['prod_id'] ?>" class="mb-2 btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="mb-2 btn btn-danger btn-sm" href="<?php echo base_url('dataproduk/hapus/'.$p['prod_id'])?>" onclick="return confirm('Yakin untuk menghapus data produk ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr><?php } ?>
                            </tbody>
                        </table>
                        <?php echo $this->pagination->create_links();?>
                    </div>
                </div>
            </section>
        </div>


        <div id="add" class="w3-container pills" style="display:none;"> 
            <!-- Content Header (Page header) --> 
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                            <button class="btn bg-warning btn-sm" onclick="openPills('list')"><i class="fas fa-undo"></i> Kembali</button>
                            </li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title">Tambah Produk Baru</h3>
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('dataproduk/tambah_aksi');?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ID Vendor</label>
                                <div class="col-sm-2">
                                    <input type="text" name="vend_id" class="form-control" placeholder="ID Vendor">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-5">
                                    <input type="text" name="prod_name" class="form-control" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Harga Beli</label>
                                <div class="col-sm-3">
                                    <input type="text" name="hargabeli" class="form-control" placeholder="Harga Beli" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Harga Produk</label>
                                <div class="col-sm-3">
                                    <input type="text" name="prod_price" class="form-control" placeholder="Harga Produk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-3">
                                    <input type="text" name="quantity" class="form-control" placeholder="Stok" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-3">
                                <select class="form-control" name="cat_id" id="cat_id">
                                    <option disabled selected>- Pilih -</option>
                                    <?php foreach($category as $c){?>
                                        <option value="<?php echo $c['cat_id']; ?>"><?php echo $c['cat_name']; ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="prod_desc" class="form-control" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-3">
                                    <input type="file" id="userfile" name="userfile" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <input class="btn btn-danger" type="submit" value="Tambah Produk">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">K⍜PIKU © 2020 - by Noor Faizin</div>
                </div>
            </section>
        </div>
    </div>
</div>