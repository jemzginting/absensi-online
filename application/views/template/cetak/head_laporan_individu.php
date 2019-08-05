<?php setlocale(LC_ALL, 'IND');
$tgl = date('d-m-Y');
if ($bulan == 1) {
    $bulan = "JANUARI";
} else if ($bulan == 2) {
    $bulan = "FEBRUARI";
} else if ($bulan == 3) {
    $bulan = "MARET";
} else if ($bulan == 4) {
    $bulan = "APRIL";
} else if ($bulan == 5) {
    $bulan = "MEI";
} else if ($bulan == 6) {
    $bulan = "JUNI";
} else if ($bulan == 7) {
    $bulan = "JULI";
} else if ($bulan == 8) {
    $bulan = "AGUSTUS";
} else if ($bulan == 9) {
    $bulan = "SEPTEMBER";
} else if ($bulan == 10) {
    $bulan = "OKTOBER";
} else if ($bulan == 11) {
    $bulan = "NOVEMBER";
} else if ($bulan == 12) {
    $bulan = "DESEMBER";
}
?>

<table width="670">
    <tr>
        <td width="670" align="center"><b>REKAP BULANAN KEHADIRAN PEGAWAI </b></td>
    </tr>

    <tr>
        <td width="670" align="center"><b><?= $nama ?> KOTA PALEMBANG</b></td>
    </tr>

    <tr>
        <td width="670" align="center"><b>BULAN : <?= $bulan . ' ' . $tahun ?></b></td>
    </tr>
</table>