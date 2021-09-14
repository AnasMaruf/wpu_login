<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/komik/') . $komik['sampul']; ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $komik['judul']; ?></h5>
                        <p class="card-text"><b>Penulis : </b><?= $komik['penulis']; ?></p>
                        <p class="card-text"><small class="text-muted"><b>Penerbit : </b><?= $komik['penerbit']; ?></small></p>

                        <a href="<?= base_url('komik/editKomik/') . $komik['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('komik/deleteKomik/') . $komik['id']; ?>" class="btn btn-danger">Delete</a>
                        <br><br>
                        <a href="<?= base_url('komik'); ?>">Back to the daftar komik</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->