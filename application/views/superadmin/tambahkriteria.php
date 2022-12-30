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
                    <h3><i class="fas fa-user-graduate mr-2"></i>Tambah data kriteria penerima dap</h3>
                    <hr>

                    <form action="<?php echo base_url() . 'superadmin/tambah'; ?>" method="post">
                        <div class="form-row">
                        </div>
                        <div class="form-group">
                            <label>JENIS BANTUAN</label>
                            <input type="text" name="jenis_bantuan" class="form-control" id="jenis_bantuan">
                        </div>
                        <div class="form-group">
                            <label>STANDAR BANTUAN(Rp)</label><input type="text" name="nominal" class="form-control" id="nominal">
                        </div>
                        <div class="form-group">
                            <label>KETERANGAN</label><input type="text" name="keterangan" class="form-control" id="keterangan">
                        </div>
                        <div class="form-group">
                            <label>KELENGKAPAN DOKUMEN</label><input type="text" name="dokumen" class="form-control" id="dokumen">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>