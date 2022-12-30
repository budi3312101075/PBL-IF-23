    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
        <div class="container">
            <center>
                <h1>Data pengajuan</h1>
            </center>
        </div>
        <div class="about_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3><i class="fas fa-user-graduate mr-2"></i> Data Konfirmasi pengajuan Karyawan</h3>
                        <hr>
                        <table>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Jenis Bantuan</th>
                                    <th scope="col">Bukti</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Deskripsi Status</th>
                                    <th colspan="3" scope="col">Konfirmasi</th>
                                </tr>

                                <?php

                                $no = 1;
                                foreach ($admin as $adm) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $adm->username ?></td>
                                        <td><?php echo $adm->tanggal ?></td>
                                        <td><?php echo $adm->deskripsi ?></td>
                                        <td><?php echo $adm->nominal ?></td>
                                        <td><?php echo $adm->telepon ?></td>
                                        <td><?php echo $adm->jenis_bantuan ?></td>
                                        <td><img src="<?php echo base_url() . 'assets/image/' . $adm->bukti; ?>" width="150"></td>
                                        <td><?php echo $adm->status ?></td>
                                        <td><?php echo $adm->deskripsi_status ?></td>
                                        <td>
                                            <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
                                            <a href="<?= base_url('admin/editpengajuan/' . $adm->id_pengajuan); ?>">Ubah</a>
                                            <hr>
                                            <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
                                            <a href="<?= base_url('admin/statuspengajuan/' . $adm->id_pengajuan); ?>">Status</a>
                                            <hr>
                                            <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
                                            <a href="<?= base_url('admin/terimapengajuan/' . $adm->id_pengajuan); ?>">Terima</a>
                                            <hr>
                                            <i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i>
                                            <a href="<?= base_url('admin/tolakpengajuan/' . $adm->id_pengajuan); ?>">Hapus</a>
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