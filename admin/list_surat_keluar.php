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
			if(isset($_GET['tanggal']) OR isset($_GET['cari'])){
				$tgl = $_GET['tanggal'];
				$cari = $_GET['cari'];
				$querysuratkeluar = mysqli_query($connect,"SELECT * FROM tbl_suratkeluar WHERE tanggal_surat_dibuat='$tgl' AND nomor_surat LIKE '%".$cari."%' ");
			}else{
				$querysuratkeluar = mysqli_query($connect,"SELECT * FROM tbl_suratkeluar ORDER BY tanggal_surat_dibuat DESC ");
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
					<a href='surat_keluar_modal_edit.php?id_surat=$suratkeluar[id_surat]' class='open_modal btn btn-warning'>Edit</a> 
					<a href='#' class='btn btn-danger' onClick='confirm_delete(\"surat_keluar_delete.php?id_surat=$suratkeluar[id_surat]\")'>Delete</a>					
					<a href='surat_keluar_detail.php?id_surat=$suratkeluar[id_surat]' class='btn btn-info'>Detail</a>			
					</td>
				</tr>";
			}
		?>
	</tbody>