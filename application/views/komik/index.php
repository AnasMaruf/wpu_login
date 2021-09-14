<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-6">
            <a href="<?= base_url('komik/tambahKomik'); ?>" class="btn btn-primary mb-3">Tambah Komik</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($komik as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="<?= base_url('assets/img/komik/') . $k['sampul']; ?>" class="sampul"></td>
                        <td><?= $k['judul']; ?></td>
                        <td>
                            <a href="<?= base_url('komik/detailKomik/') . $k['id']; ?>" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->