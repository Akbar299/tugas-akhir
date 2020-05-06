<thead>
	<tr>
        <th>Nomor Surat</th>
		<th>Asal Surat</th>
        <th>Tanggal Terima</th>
        <th>Tanggal Surat</th>
        <th>Perihal</th>
        <th>Keterangan</th>
        <th>Ditujukan</th>
        <th>File Surat</th>
	</tr>
</thead>
	<tbody>
                    <?php
                        $no=0; //variable no
						$querysuratmasuk = mysqli_query ($connect, "SELECT nomor_surat, asal_surat, tanggal_terima, tanggal_surat, perihal, keterangan, ditujukan, file_suratmasuk FROM tbl_suratmasuk");
						if($querysuratmasuk == false){
							die ("Terjadi Kesalahan : ". mysqli_error($connect));
						}
						while ($dokter = mysqli_fetch_array ($querydokter)){
                            $no++;
							
							echo "
                                <tr>
                                    <td>$no</td>
									<td>$dokter[no_reg]</td>
									<td>$dokter[nama]</td>
									<td>$dokter[spesialist]</td>
								</tr>";
						}
					?>
	</tbody>