<body>
    <br>
    <br>
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3><i class="fas fa-user-graduate mr-2"></i> Laporan</h3>
                    <hr>
                    <table border="1" cellpadding="10">
                        <td>Laporan filter Berdasarkan bulan
                            <form action="<?php echo base_url(); ?>karyawan/filter" method="POST" target='_blank'>

                                <input type="hidden" name="nilaifilter" value="2">

                                pilih tahun <br>
                                <select name="tahun1" required="">
                                    <?php foreach ($tahun as $row) :  ?>

                                        <option value="<?php echo $row->tahun ?>"><?php echo $row->tahun ?></option>

                                    <?php endforeach ?>
                                </select>

                                Bulan awal<br>
                                <select name="bulanawal" require="">
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">maret</option>
                                    <option value="4">april</option>
                                    <option value="5">mei</option>
                                    <option value="6">juni</option>
                                    <option value="7">juli</option>
                                    <option value="8">agustus</option>
                                    <option value="9">september</option>
                                    <option value="10">oktober</option>
                                    <option value="11">november</option>
                                    <option value="12">desember</option>
                                </select><br>

                                Bulan akhir<br>
                                <select name="bulanakhir" require="">
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">maret</option>
                                    <option value="4">april</option>
                                    <option value="5">mei</option>
                                    <option value="6">juni</option>
                                    <option value="7">juli</option>
                                    <option value="8">agustus</option>
                                    <option value="9">september</option>
                                    <option value="10">oktober</option>
                                    <option value="11">november</option>
                                    <option value="12">desember</option>
                                </select><br>
                                <br>
                                <input type="submit" value="Print">
                        </td>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>