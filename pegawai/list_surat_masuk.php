<thead>
	<tr>
		<th>No</th>
        <th>Nomor Surat</th>
		<th>Asal Surat</th>
        <th>Tanggal Terima</th>
        <th>Tanggal Surat</th>
        <th>Perihal</th>
        <th>Ditujukan</th>
        <th>Aksi</th>
	</tr>
</thead>
	<tbody>
                    <?php
                        $no=0; //variable no
						$querysuratmasuk = mysqli_query ($connect, "SELECT * FROM tbl_suratmasuk, tbl_user WHERE ditujukan=ruangan AND username='$_SESSION[username]' ORDER BY ditujukan DESC LIMIT 6");
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
									<td>$suratmasuk[ditujukan]</td>
									<td>$suratmasuk</td>
								</tr>";
						}
					?>
	</tbody>