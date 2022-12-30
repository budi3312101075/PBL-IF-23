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
                    <h3><i class="fas fa-user-graduate mr-2"></i>Tambah data User/Pengguna</h3>
                    <hr>

                    <form action="<?php echo base_url() . 'superadmin/tambahdatapengguna'; ?>" method="post">
                        <div class="form-row">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label>Nama</label><input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label>Password</label><input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label>Telepon</label><input type="text" name="no_telp" class="form-control" id="no_telp">
                        </div>
                        <div class="form-group">
                            <label>Email</label><input type="text" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="level">Jabatan</label>
                            <select id="level" name="level">
                                <option value="karyawan">karyawan</option>
                                <option value="admin">admin</option>
                                <option value="superadmin">superadmin</option>
                                <option value="manajemen">manajemen</option>
                            </select>
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