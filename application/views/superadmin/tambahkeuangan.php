<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
    <div class="container">
        <center>
            <h1>Form Keuangan</h1>
        </center>
    </div>
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3><i class="fas fa-user-graduate mr-2"></i>Tambah data Rwiyat Keuangan</h3>
                    <hr>
                    <form action="<?php echo base_url() . 'superadmin/tambahdatakeuangan'; ?>" method="post">
                        <div class="form-row">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="status" class="form-control" id="status" value="Pemasukan">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label><input type="date" name="tanggal" class="form-control" id="tanggal">
                        </div>
                        <div class="form-group">
                            <label>Nominal</label><input type="text" name="nominal" class="form-control" id="nominal">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label><input type="text" name="keterangan" class="form-control" id="keterangan">
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