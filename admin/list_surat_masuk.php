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
        <th>Waktu Entry</th>
        <th>Aksi</th>
	</tr>
</thead>
	<tbody>
        <?php
			$no=0; //variable no
			if(isset($_GET['tanggal']) OR isset($_GET['cari'])){
				$tgl = $_GET['tanggal'];
				$cari = $_GET['cari'];
				$querysuratmasuk = mysqli_query($connect,"SELECT * FROM tbl_suratmasuk WHERE tanggal_terima='$tgl' OR nomor_surat LIKE '%".$cari."%'");
			}else{
				$querysuratmasuk = mysqli_query($connect,"SELECT * FROM tbl_suratmasuk ORDER BY tanggal_terima DESC ");
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
					<td>$suratmasuk[waktuentry]</td>
					<td>
						<a href='surat_masuk_modal_edit.php?id_surat=$suratmasuk[id_surat]' class='open_modal btn btn-warning'>Edit</a> 
						<a href='#' class='btn btn-danger' onClick='confirm_delete(\"surat_masuk_delete.php?id_surat=$suratmasuk[id_surat]\")'>Delete</a>
						<a href='surat_masuk_detail.php?id_surat=$suratmasuk[id_surat]' class='btn btn-info'>Detail</a>
					</td>
				</tr>";
			}
		?>
	</tbody>