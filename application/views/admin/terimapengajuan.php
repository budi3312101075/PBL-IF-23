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

                    <?php foreach ($admin as $adm) { ?>

                        <form action="<?php echo base_url() . 'admin/terima'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                            </div>
                            <div class="form-group">
                                <label>username</label>
                                <input type="hidden" name="id_pengajuan" class="form-control" id="id_pengajuan" value="<?php echo $adm->id_pengajuan ?>">
                                <input type="text" name="username" class="form-control" id="username" value="<?php echo $adm->username ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>tanggal</label><input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php echo $adm->tanggal ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>deskripsi</label><input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?php echo $adm->deskripsi ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>nominal</label><input type="text" name="nominal" class="form-control" id="nominal" value="<?php echo $adm->nominal ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>telepon</label><input type="text" name="telepon" class="form-control" id="telepon" value="<?php echo $adm->telepon ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>jenis bantuan</label><input type="text" name="jenis_bantuan" class="form-control" id="jenis_bantuan" value="<?php echo $adm->jenis_bantuan ?>" readonly>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control" value="<?php echo $adm->status ?>">
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Status</label><input type="text" name="deskripsi_status" class="form-control" id="deskripsi_status" value="<?php echo $adm->deskripsi_status ?>">
                                </div>
                                <div class="form-group">
                                    <label>bukti transfer</label> <input type="file" name="bukti_transfer" class="form-control" id="bukti_transfer" placeholder="bukti_transfer">
                                    Lampiran Dokumen bisa berupa jpg atau png tidak boleh dari 10MB.
                                    <br>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                </div>
                        </form>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>