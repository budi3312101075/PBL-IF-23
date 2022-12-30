<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
    <div class="container">
        <center>
            <h1>Kriteria Bantuan</h1>
        </center>
    </div>
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                    <table>
                        <a href="<?= base_url('superadmin/tambahkriteria/'); ?>">
                            <button type="button" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"></path>
                                </svg>
                                TAMBAH KRITERIA
                            </button>
                        </a>
                        <br />
                        <br />

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">JENIS BANTUAN</th>
                                <th scope="col">STANDAR BANTUAN(Rp)</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">KELENGKAPAN DOKUMEN</th>
                                <th scope="col">AKSI</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($superadmin as $superadmin) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $superadmin->jenis_bantuan ?></td>
                                    <td><?php echo $superadmin->nominal ?></td>
                                    <td><?php echo $superadmin->keterangan ?></td>
                                    <td><?php echo $superadmin->dokumen ?></td>
                                    <td>
                                        <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
                                        <a href="<?= base_url('superadmin/editkriteria/' . $superadmin->id_kriteria); ?>">Ubah</a>
                                        <hr>
                                        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i>
                                        <a href="<?= base_url('superadmin/hapuskriteria/' . $superadmin->id_kriteria); ?>">Hapus</a>
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