<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
    <div class="container">
        <center>
            <h1>Kriteria penerima</h1>
        </center>
    </div>
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">JENIS BANTUAN</th>
                            <th scope="col">STANDAR BANTUAN(Rp)</th>
                            <th scope="col">KETERANGAN</th>
                            <th scope="col">KELENGKAPAN DOKUMEN</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($superadmin as $superadmin) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $superadmin->jenis_bantuan ?></td>
                                <td><?php echo $superadmin->nominal ?></td>
                                <td><?php echo $superadmin->keterangan ?></td>
                                <td><?php echo $superadmin->dokumen ?></td>
                            </tr>

                        <?php endforeach; ?>
                        </thead>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>