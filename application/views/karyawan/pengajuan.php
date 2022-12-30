<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
    <div class="container">
        <center>
            <h1>FORM PENGAJUAN</h1>
        </center>
    </div>
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3><i class="fas fa-user-graduate mr-2"></i> *ajukan klaim disini</h3>
                    <hr>

                    <?php echo form_open_multipart('karyawan/tambah_pengajuan'); ?>
                    <div class="form-group">
                        <input type="hidden" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <input type="text" name="telepon" class="form-control" id="telepon" placeholder="nomor Wa/Telepon">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nominal" class="form-control" id="nominal" placeholder="nominal">
                    </div>
                    <div class="form-group">
                        <textarea id="deskripsi" name="deskripsi" placeholder="deskripsi klaim, misalnya: Telah lahir putra kami di RS Awal Bros ..." class="form-control col-sm-12"></textarea>
                    </div>
                    <div class="form-group">
                        <select name="jenis_bantuan" class="form-control">
                            <?php foreach ($datajenis as $key) : ?>
                                <option value="<?php echo $key->jenis_bantuan ?>"><?php echo $key->jenis_bantuan ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bukti/Struk pembayaran</label><input type="file" name="bukti" class="form-control" id="bukti" placeholder="foto">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ajukan klaim" class="btn btn-primary py-3 px-4">
                    </div>
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</section>