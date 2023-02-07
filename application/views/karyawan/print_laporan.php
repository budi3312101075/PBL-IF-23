<!DOCTYPE html>
<html>

<head>
    <title>print Laporan</title>
</head>

<body onload="window.print()">
    <center>
        <font size="5">POLITEKNIK NEGERI BATAM </font><br>
        <font size="2">Jl. Ahmad Yani, Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461 </font><br>
        <font size="2">Telepon +62 778 469856 - 469860 Faksimile +62 778 463620 </font><br>
        <font size="2">Laman: www.polibatam.ac.id, Surel: info@polibatam.ac.id </font><br>
    </center>
    <hr size="2" color="black">

    <center>
        <font size="5">Laporan Dana Amal Polibatam </font>
    </center>
    <br>
    <br>
    <font size="3"><?php echo $title ?></font><br>
    <font size="3"><?php echo $subtitle ?></font><br>
    <br>
    <center>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>tanggal</th>
                    <th>nominal</th>
                    <th>jenis bantuan</th>
                    <th>status</th>
                    <th>deskripsi status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($datafilter as $row) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->tanggal; ?></td>
                        <td><?php echo $row->nominal; ?></td>
                        <td><?php echo $row->jenis_bantuan; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td><?php echo $row->deskripsi_status; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div style="width:200px;float:right" align="right">
        Batam, .............................2022<br>
        <p>
            <center>Mengetahui</center><br />Ketua Dana Amal Polibatam
        </p>
        <br>
        <br>
        <br>
        <br>
        <p>(...............................................)</p>
    </div>
</body>

</html>