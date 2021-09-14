<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" <?= set_value('judul'); ?> autocomplete="off" autofocus>
                        <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" <?= set_value('penulis'); ?> autocomplete="off">
                        <?= form_error('penulis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" <?= set_value('penerbit'); ?> autocomplete="off">
                        <?= form_error('penerbit', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-2">Sampul</div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="<?= base_url('assets/img/komik/default.jpg'); ?>" class="img-thumbnail">
                            </div>
                            <div class="col-lg-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" value="default.jpg">
                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                    <?= form_error('image', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Komik</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->