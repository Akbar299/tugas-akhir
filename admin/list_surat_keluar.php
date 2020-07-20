<thead>
	<tr>
		<th>No</th>
        <th>Nomor Surat</th>
		<th>Tanggal Surat Dibuat</th>
        <th>Tujuan Surat</th>
        <th>Perihal</th>
        <th>Keterangan</th>
        
        <th>Aksi</th>
	</tr>
</thead>
	<tbody>
                    <?php
                        $no=0; //variable no
						$querysuratkeluar = mysqli_query ($connect, "SELECT id_surat, nomor_surat, tanggal_surat_dibuat,
							tujuan_surat, perihal, keterangan, file_suratkeluar FROM tbl_suratkeluar");
						if($querysuratkeluar == false){
							die ("Terjadi Kesalahan : ". mysqli_error($connect));
						}
						while ($suratkeluar = mysqli_fetch_array ($querysuratkeluar)){
                            $no++;
							
							echo "
                                <tr>
                                    <td>$no</td>
									<td>$suratkeluar[nomor_surat]</td>
									<td>$suratkeluar[tanggal_surat_dibuat]</td>
									<td>$suratkeluar[tujuan_surat]</td>
									<td>$suratkeluar[perihal]</td>
									<td>$suratkeluar[keterangan]</td>
								

									<td>
										<a href='#' class='btn btn-danger' onClick='confirm_delete(\"surat_keluar_delete.php?id_surat=$suratkeluar[id_surat]\")'>Delete</a>
										
										<a href='surat_keluar_detail.php?id_surat=$suratkeluar[id_surat]' class='btn btn-info'>Detail</a>
										
									</td>
								</tr>";
						}
					?>
	</tbody>