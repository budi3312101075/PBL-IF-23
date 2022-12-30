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

                    <?php foreach ($superadmin as $superadmin) { ?>

                        <form action="<?php echo base_url() . 'superadmin/block'; ?>" method="post">
                            <div class="form-row">
                            </div>
                            <div class="form-group">
                                <label>username</label>
                                <input type="hidden" name="id_users" class="form-control" id="id_users" value="<?php echo $superadmin->id_users ?>">
                                <input type="text" name="username" class="form-control" id="username" value="<?php echo $superadmin->username ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama</label><input type="text" name="nama" class="form-control" id="nama" value="<?php echo $superadmin->nama ?>">
                            </div>
                            <div class="form-group">
                                <label>Telpon</label><input type="text" name="no_telp" class="form-control" id="no_telp" value="<?php echo $superadmin->no_telp ?>">
                            </div>
                            <div class="form-group">
                                <label for="level">Blok/Unblock</label>
                                <select id="level" name="level">
                                    <option value="BLOCK">BLOCK</option>
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

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>