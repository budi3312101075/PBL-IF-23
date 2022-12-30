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

                        <form action="<?php echo base_url() . 'admin/edit'; ?>" method="post">
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
                                <label>nominal</label><input type="text" name="nominal" class="form-control" id="nominal" value="<?php echo $adm->nominal ?>">
                            </div>
                            <div class="form-group">
                                <label>telepon</label><input type="text" name="telepon" class="form-control" id="telepon" value="<?php echo $adm->telepon ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jenis Bantuan</label>
                                <select name="jenis_bantuan" class="form-control">
                                    <?php foreach ($datajenis as $key) : ?>
                                        <option value="<?php echo $key->jenis_bantuan ?>"><?php echo $key->jenis_bantuan ?></option>
                                    <?php endforeach ?>
                                </select>
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