<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
    <div class="container">
        <center>
            <h1>Data pemasukan</h1>
        </center>
    </div>
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                    <table>
                        <a href="<?= base_url('superadmin/tambahkeuangan/'); ?>">
                            <button type="button" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"></path>
                                </svg>
                                Tambah
                            </button>
                        </a>
                        <br />
                        <br />
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            <?php

                            $no = 1;
                            foreach ($admin as $admin) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $admin->tanggal ?></td>
                                    <td><?php echo $admin->nominal ?></td>
                                    <td><?php echo $admin->keterangan ?></td>
                                    <td>
                                        <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
                                        <a href="<?= base_url('superadmin/updatekeuangan/' . $admin->id_keuangan); ?>">Ubah</a>
                                        <hr>
                                        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i>
                                        <a href="<?= base_url('superadmin/hapuskeuangan/' . $admin->id_keuangan); ?>">Hapus</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                            </thead>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</section>