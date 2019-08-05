<table width="100%" border="1">
        <tr align="center">
                <td width="30">N0</td>
                <?php if ($status_kepegawaian == "pns") { ?>
                        <td width="340">NAMA/NIP/GOLONGAN</td>
                        <?php
                } else { ?>
                        <td width="320">NAMA/NIK</td>
                        <?php
                } ?>
                <td width="120">TANGGAL</td>
                <td width="80">MASUK</td>
                <td width="80">PULANG</td>
                <td width="80">TELAT</td>
                <td width="80">PULANG CEPAT</td>
                <td width="220">KETERANGAN</td>
        </tr>
        <?php
                $ade = 0;
                foreach ($data->result_array() as $key => $row) {
                        $ade = $key;
                        ?>
                        <tr>
                                <td width="30" align="center"><?= $ade + 1; ?></td>
                                                <?php if ($status_kepegawaian == "pns") { ?>
                                                        <td colspan="100%" width="340">&nbsp;<?= $row['nama_pegawai'] . ' / ' . $row['nip']; ?><br /></td>
                                                                                                        <?php
                                                } else { ?>
                                                        <td colspan="100%" width="320">&nbsp;<?= $row['nama_pegawai'] . ' / ' . $row['nip']; ?></td>
                                                                                                        <?php
                                                } ?>

                                                <td width="120" align="center">&nbsp;<?= $row['tanggal'] ?><br /><br /></td>
                                                        <td width="80" align="center">&nbsp;<?= $row['masuk'] ?></td>
                                                        <td width="80" align="center">&nbsp;<?= $row['pulang'] ?></td>
                                                        <td width="80" align="center">&nbsp;<?= $row['telat'] ?></td>
                                                        <td width="80" align="center">&nbsp;<?= $row['pulang_cepat'] ?></td>
                                                        <td width="220" align="center">&nbsp;<?= $row['nama_keterangan'] ?></td>
                                                        </tr>
                                                                                                <?php
                                                }

                                                ?>



</table>