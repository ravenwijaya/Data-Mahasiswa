<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="card" style="   margin-left: 200;
    margin-right: 200;
    margin-bottom: 10px;
	margin-top: 10px;">
	<a class="btn btn-warning" my-2 my-sm-0" href='/mahasiswa' role="button">Back</a>
	<h5 class="card-header" style="text-align:center;">Edit Data Mahasiswa</h5>
	<div class="card-body">

		<form action="/mahasiswa/update/<?= $mahasiswa['id']; ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field(); ?>
			<div class="form-group">
				<label>NIM</label>
				<input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" name="nim" placeholder="Enter Nim" autofocus value="<?= (old('nim')) ? old('nim') : $mahasiswa['nim']; ?>">
				<div class="invalid-feedback">
					<?= $validation->getError('nim'); ?>
				</div>
			</div>
			<input type="hidden" id="id" name="id" value="<?= $mahasiswa['id']; ?>">
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" placeholder="Enter Nama Lengkap" value="<?= (old('nama')) ? old('nama') : $mahasiswa['nama']; ?>">
				<div class="invalid-feedback">
					<?= $validation->getError('nama'); ?>
				</div>
			</div>

			<div class="form-group">
				<label>Kota Asal</label>
				<input type="text" class="form-control <?= ($validation->hasError('kotaasal')) ? 'is-invalid' : ''; ?>" name="kotaasal" placeholder="Enter Kota Asal" value="<?= (old('kotaasal')) ? old('kotaasal') : $mahasiswa['kota_asal']; ?>">
				<div class="invalid-feedback">
					<?= $validation->getError('kotaasal'); ?>
				</div>
			</div>

			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="text" class="form-control <?= ($validation->hasError('tgllahir')) ? 'is-invalid' : ''; ?>" name="tgllahir" placeholder="DD-MM-YYYY" value="<?= (old('tgllahir')) ? old('tgllahir') : $mahasiswa['tgl_lahir']; ?>">
				<div class="invalid-feedback">
					<?= $validation->getError('tgllahir'); ?>
				</div>
			</div>

			<div class="form-group">
				<label>Nama Orang Tua</label>
				<input type="text" class="form-control <?= ($validation->hasError('namaortu')) ? 'is-invalid' : ''; ?>" name="namaortu" placeholder="Enter Nama Orang Tua" value="<?= (old('namaortu')) ? old('namaortu') : $mahasiswa['nama_ortu']; ?>">
				<div class="invalid-feedback">
					<?= $validation->getError('namaortu'); ?>
				</div>
			</div>

			<div class="form-group">
				<label>Alamat Orang Tua</label>
				<input type="text" class="form-control <?= ($validation->hasError('alamatortu')) ? 'is-invalid' : ''; ?>" name="alamatortu" placeholder="Enter Alamat Orang Tua" value="<?= (old('alamatortu')) ? old('alamatortu') : $mahasiswa['alamat_ortu']; ?>">
				<div class="invalid-feedback">
					<?= $validation->getError('alamatortu'); ?>
				</div>
			</div>

			<div class="form-group">
				<label>Kode Pos</label>
				<input type="text" class="form-control <?= ($validation->hasError('kodepos')) ? 'is-invalid' : ''; ?>" name="kodepos" placeholder="Enter Kode Pos" onkeypress='validate(event)' value="<?= (old('kodepos')) ? old('kodepos') : $mahasiswa['kode_pos']; ?>">
				<div class="invalid-feedback">
					<?= $validation->getError('kodepos'); ?>
				</div>
			</div>

			<div class="form-group">
				<label>Nomor Telepon</label>
				<input type="text" name="notelp" class="form-control <?= ($validation->hasError('notelp')) ? 'is-invalid' : ''; ?>" placeholder="Enter No Telp" onkeypress='validate(event)' value="<?= (old('notelp')) ? old('notelp') : $mahasiswa['notelp']; ?>">
				<div class="invalid-feedback">
					<?= $validation->getError('notelp'); ?>
				</div>
			</div>

			<div class="form-group">
				<label>Status </label><br>

				<?php
				$options = array("Tama", "Wreda");
				echo "<select name='status' id='status'>";
				foreach ($options as $option) {

					if ((old('status')) ? old('status') : $mahasiswa['statuss'] == $option) {
						echo "<option selected='selected' value='$option'>$option</option>";
					} else
						echo "<option value='$option'>$option</option>";
				}

				echo "</select>";

				?>

			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
			<input type="reset" name="reset" value="Reset" class="btn btn-secondary">
		</form>
	</div>
</div>
<br><br>



<?= $this->endSection(); ?>