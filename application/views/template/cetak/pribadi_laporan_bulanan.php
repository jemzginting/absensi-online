<table width="100%" border="1">
    <tr align="center">
        <td width="30">N0</td>
        <?php if ($status_kepegawaian == "pns") { ?>
            <td width="270">NAMA/NIP/GOLONGAN</td>
        <?php
    } else { ?>
            <td width="270">NAMA/NIK</td>
        <?php
    } ?>
        <td width="190">JABATAN</td>
        <td width="80">JUMLAH HARI KERJA</td>
        <td width="80">JUMLAH KEHADIRAN</td>
        <td width="60">JUMLAH TELAT</td>
        <td width="60">PULANG CEPAT</td>
        <td width="40">SAKIT</td>
        <td width="40">IZIN</td>
        <td width="40">CUTI</td>
        <td width="40">TL</td>
        <td width="40">TK</td>
        <td width="60">JUMLAH (HARI %)</td>
        <td width="60">POTONGAN (%)</td>

    </tr>
    <?php
    $ade = 0;
    foreach ($data->result_array() as $key => $row) {
        $ade = $key;

        if ($row['sakit'] == 0) {
            $row['sakit'] = "-";
        }
        if ($row['izin'] == 0) {
            $row['izin'] = "-";
        }
        if ($row['cuti'] == 0) {
            $row['cuti'] = "-";
        }
        if ($row['tk'] == 0) {
            $row['tk'] = "-";
        }
        if ($row['tl'] == 0) {
            $row['tl'] = "-";
        } ?>
        <tr>
            <td width="30" align="center"><?= $ade + 1; ?></td>
            <?php if ($status_kepegawaian == "pns") { ?>
                <td width="270">&nbsp;<?= $row['nama_pegawai'] . ' / ' . $row['nip'] . ' / ' . $row['nama_golongan']; ?><br /></td>
            <?php
        } else { ?>
                <td width="270">&nbsp;<?= $row['nama_pegawai'] . ' / ' . $row['nip']; ?></td>
            <?php
        } ?>
            <td width="190">&nbsp;<?= $row['nama_jabatan'] ?><br /><br /></td>
            <td width="80" align="center">&nbsp;<?= $row['jumlah_hari'] ?></td>
            <td width="80" align="center">&nbsp;<?= $row['jumlah_hadir'] ?></td>
            <td width="60" align="center">&nbsp;<?= $row['jlh_telat'] ?></td>
            <td width="60" align="center">&nbsp;<?= $row['pulang_cepat'] ?></td>
            <td width="40" align="center">&nbsp;<?= $row['sakit'] ?></td>
            <td width="40" align="center">&nbsp;<?= $row['izin'] ?></td>
            <td width="40" align="center">&nbsp;<?= $row['cuti'] ?></td>
            <td width="40" align="center">&nbsp;<?= $row['tl'] ?></td>
            <td width="40" align="center">&nbsp;<?= $row['tk'] ?></td>
            <td width="60" align="center">&nbsp;<?= $row['persen_hadir'] . ' %' ?></td>
            <td width="60" align="center">&nbsp;<?= $row['persen_potongan'] . ' %' ?></td>
        </tr>
    <?php
}

?>
    <?php
    if ($status_kepegawaian == "pns") {
        foreach ($non_ese->result_array() as $key => $row) {

            if ($row['sakit'] == 0) {
                $row['sakit'] = "-";
            }
            if ($row['izin'] == 0) {
                $row['izin'] = "-";
            }
            if ($row['cuti'] == 0) {
                $row['cuti'] = "-";
            }
            if ($row['tk'] == 0) {
                $row['tk'] = "-";
            }
            if ($row['tl'] == 0) {
                $row['tl'] = "-";
            } ?>
            <tr>
                <td width="30" align="center"><?= $ade + $key + 1; ?></td>
                <?php if ($status_kepegawaian == "pns") { ?>
                    <td width="270">&nbsp;<?= $row['nama_pegawai'] . ' / ' . $row['nip'] . ' / ' . $row['nama_golongan']; ?><br /></td>
                <?php
            } else { ?>
                    <td width="270">&nbsp;<?= $row['nama_pegawai'] . ' / ' . $row['nip']; ?></td>
                <?php
            } ?>

                <td width="190">&nbsp;<?= $row['nama_jabatan'] ?><br /><br /></td>
                <td width="80" align="center">&nbsp;<?= $row['jumlah_hari'] ?></td>
                <td width="80" align="center">&nbsp;<?= $row['jumlah_hadir'] ?></td>
                <td width="60" align="center">&nbsp;<?= $row['jlh_telat'] ?></td>
                <td width="60" align="center">&nbsp;<?= $row['pulang_cepat'] ?></td>
                <td width="40" align="center">&nbsp;<?= $row['sakit'] ?></td>
                <td width="40" align="center">&nbsp;<?= $row['izin'] ?></td>
                <td width="40" align="center">&nbsp;<?= $row['cuti'] ?></td>
                <td width="40" align="center">&nbsp;<?= $row['tl'] ?></td>
                <td width="40" align="center">&nbsp;<?= $row['tk'] ?></td>
                <td width="60" align="center">&nbsp;<?= $row['persen_hadir'] . ' %' ?></td>
                <td width="60" align="center">&nbsp;<?= $row['persen_potongan'] . ' %' ?></td>
            </tr>
        <?php
    }
}

?>

</table>