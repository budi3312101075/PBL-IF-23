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

                        <form action="<?php echo base_url() . 'admin/update1'; ?>" method="post">
                            <div class="form-row">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id_keuangan" class="form-control" id="id_keuangan" value="<?php echo $adm->id_keuangan ?>">
                                <input type="hidden" name="username" class="form-control" id="username" value="<?php echo $adm->username ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="status" class="form-control" id="status" value="<?php echo $adm->status ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label><input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $adm->tanggal ?>">
                            </div>
                            <div class="form-group">
                                <label>nominal</label><input type="text" name="nominal" class="form-control" id="nominal" value="<?php echo $adm->nominal ?>">
                            </div>
                            <div class="form-group">
                                <label>keterangan</label><input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $adm->keterangan ?>">
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