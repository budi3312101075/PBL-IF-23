<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
    <div class="container">
        <center>
            <h1>Data user</h1>
        </center>
    </div>
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3><i class="fas fa-user-graduate mr-2"></i> Data User</h3>
                    <hr>

                    <?php foreach ($admin as $admin) { ?>

                        <form action="<?php echo base_url() . 'superadmin/updatekeuangan'; ?>" method="post">
                            <div class="form-row">
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label><input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $admin->tanggal ?>">
                            </div>
                            <div class="form-group">
                                <label>Nominal</label><input type="text" name="nominal" class="form-control" id="nominal" value="<?php echo $admin->nominal ?>">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label><input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $admin->keterangan ?>">
                            </div>
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