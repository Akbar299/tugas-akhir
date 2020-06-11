<thead>
	<tr>
		<th>No</th>
        <th>Nomor Surat</th>
		<th>Asal Surat</th>
        <th>Tanggal Terima</th>
        <th>Tanggal Surat</th>
        <th>Perihal</th>
        <th>Keterangan</th>
        <th>Ditujukan</th>
        <th>Aksi</th>
	</tr>
</thead>
	<tbody>
                    <?php
                        $no=0; //variable no
						$querysuratmasuk = mysqli_query ($connect, "SELECT id_surat, nomor_surat, asal_surat, tanggal_terima, tanggal_surat, perihal, keterangan, ditujukan, status, oleh, file_suratmasuk FROM tbl_suratmasuk");
						if($querysuratmasuk == false){
							die ("Terjadi Kesalahan : ". mysqli_error($connect));
						}
						while ($suratmasuk = mysqli_fetch_array ($querysuratmasuk)){
                            $no++;
							
							echo "
                                <tr>
                                    <td>$no</td>
									<td>$suratmasuk[nomor_surat]</td>
									<td>$suratmasuk[asal_surat]</td>
									<td>$suratmasuk[tanggal_terima]</td>
									<td>$suratmasuk[tanggal_surat]</td>
									<td>$suratmasuk[perihal]</td>
									<td>$suratmasuk[keterangan]</td>
									<td>$suratmasuk[ditujukan]</td>

									<td>
										<a href='surat_masuk_delete.php?id_surat=$suratmasuk[id_surat] class='btn btn-danger>Delete</a>
										<a href='surat_masuk_detail.php?id_surat=$suratmasuk[id_surat]' class='btn btn-info'>Detail</a>
										
									</td>

								</tr>";
						}
					?>
	</tbody>