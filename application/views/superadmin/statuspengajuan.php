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
                    <h3><i class="fas fa-user-graduate mr-2"></i>Update status pengajuan</h3>
                    <hr>

                    <?php foreach ($admin as $adm) { ?>

                        <form action="<?php echo base_url() . 'superadmin/editstatus'; ?>" method="post">
                            <div class="form-row">
                            </div>
                            <div class="form-group">
                                <label>username</label>
                                <input type="hidden" name="id_pengajuan" class="form-control" id="id_pengajuan" value="<?php echo $adm->id_pengajuan ?>">
                                <input type="text" name="username" class="form-control" id="username" value="<?php echo $adm->username ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>nominal</label><input type="text" name="nominal" class="form-control" id="nominal" value="<?php echo $adm->nominal ?>" readonly>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Diproses">Diproses</option>
                                        <option value="Ditangguhkan">Ditangguhkan</option>
                                        <option value="Ditolak">Ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea id="deskripsi_status" name="deskripsi_status" placeholder="deskripsi kenapa di tangguhkan atau di proses sampai kapan " class="form-control col-sm-12"></textarea>
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