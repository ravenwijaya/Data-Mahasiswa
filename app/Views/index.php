<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<a href="/mahasiswa/create" style="position:absolute;top:20; right:50;" class="btn btn-success" my-2 my-sm-0" class="btn btn-warning" role="button">Tambah Data</a>
<?php if (session()->getFlashdata('pesan')) : ?>
	<div class="alert alert-success" role="alert">
		<?= session()->getFlashdata('pesan'); ?>
	</div>
<?php endif; ?>
<table id="table_id" class="display">
	<thead>
		<tr align="center" bgcolor="#FFA600" height="40">
			<th width="5%">No</th>&nbsp;
			<th width="5%">NIM</th>&nbsp;
			<th width="10%">Nama</th>&nbsp;
			<th width="10%">Asal</th>&nbsp;
			<th width="10%">TglLahir</th>&nbsp;
			<th width="10%">Orangtua</th>&nbsp;
			<th width="15%">Alamat Orangtua</th>&nbsp;
			<th width="5%">Kode Pos</th>&nbsp;
			<th width="10%">No Telp</th>&nbsp;
			<th width="5%">Status</th>&nbsp;
			<th width="10%">Action</th> &nbsp;
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
		<?php
		foreach ($mahasiswa as $m) : ?>
			<tr align="center" height="40">
				<td><?= $i++ ?><div align="center"></div>
				</td>
				<td><?= $m['nim'] ?><div align="center"></div>
				</td>
				<td><?= $m['nama'] ?><div align="center"></div>
				</td>
				<td><?= $m['kota_asal'] ?><div align="center"></div>
				</td>
				<td><?= $m['tgl_lahir'] ?><div align="center"></div>
				</td>
				<td><?= $m['nama_ortu'] ?><div align="center"></div>
				</td>
				<td><?= $m['alamat_ortu'] ?><div align="center"></div>
				</td>
				<td><?= $m['kode_pos'] ?><div align="center"></div>
				</td>
				<td><?= $m['notelp'] ?><div align="center"></div>
				</td>
				<td><?= $m['statuss'] ?><div align="center"></div>
				</td>
				<td>
					<form action="/mahasiswa/<?= $m['id']; ?>" method="post" class="d-inline">
						<?= csrf_field(); ?>
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">&#128473;</button>
					</form>
					<a href="/mahasiswa/edit/<?= $m['id']; ?>" class="btn btn-warning" role="button">&#9998;</a>|
					<!-- <a href="/mahasiswa/hapus/<?= $m['id']; ?>" class="btn btn-danger" role="button"></a> -->

				</td>
			</tr>
		<?php endforeach; ?>

	</tbody>
</table>

<?= $this->endSection(); ?>