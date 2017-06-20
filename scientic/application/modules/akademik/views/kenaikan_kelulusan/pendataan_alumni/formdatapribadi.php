<div class="col-md-6">
<input type="hidden" class="form-control" id="replid" placeholder="" name="replid">
<input type="hidden" class="form-control"  placeholder="" name="idkelas">
<div class="form-group form-group-sm">
	<label for="idangkatan" class="control-label col-sm-4">Angkatan</label>
	<div class="col-sm-8">
		<select name="idangkatan" class="form-control" id="idangkatan" required>
			
		</select>
		
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="nama" class="control-label col-sm-4">NIS</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="nis" placeholder="" name="nis" required>
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="nama" class="control-label col-sm-4">NISN</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="nisn" placeholder="" name="nisn" required>
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="nama" class="control-label col-sm-4">Nama</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="nama" placeholder="" name="nama" required>
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="panggilan" class="control-label col-sm-4">Panggilan</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="panggilan" placeholder="" name="panggilan">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="kelamin" class="control-label col-sm-4">Kelamin</label>
	<div class="col-sm-8">
		<input type="radio" name="kelamin" value="1">Laki-Laki &nbsp;
		<input type="radio"  name="kelamin" value="0">Perempuan
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="tmplahir" class="control-label col-sm-4">Tempat Lahir</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="tmplahir" placeholder="" name="tmplahir">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="tgllahir" class="control-label col-sm-4">TGL Lahir</label>
	<div class="col-sm-8">
		<input type="date" class="form-control" id="tgllahir" placeholder="" name="tgllahir">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="agama" class="control-label col-sm-4">Agama</label>
	<div class="col-sm-8">
		<select name="agama" class="form-control" id="agama">
			<option value=""> -- Pilih Agama --</option>
			<?php
			$this->db->where("ref_grup","51");
			foreach($this->db->get("referensi")->result() as $row)
			{
				echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
			}
			?>
		</select>
		
	</div>
</div>


<div class="form-group form-group-sm">
	<label for="suku" class="control-label col-sm-4">Suku</label>
	<div class="col-sm-8">
		<select name="suku" class="form-control" id="suku">
			<option value=""> -- Pilih Suku --</option>
			<?php
			$this->db->where("ref_grup","74");
			foreach($this->db->get("referensi")->result() as $row)
			{
				echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
			}
			?>
		</select>
	</div>
</div>

<div class="form-group form-group-sm">
	<label for="status" class="control-label col-sm-4">Status</label>
	<div class="col-sm-8">
		
		<select name="status" class="form-control" id="status">
			<option value=""> -- Pilih Status --</option>
			<?php
			$this->db->where("ref_grup","64");
			foreach($this->db->get("referensi")->result() as $row)
			{
				echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
			}
			?>
		</select>
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="kondisi" class="control-label col-sm-4">Kondisi</label>
	<div class="col-sm-8">
		<select name="kondisi" class="form-control" id="kondisi">
			<option value=""> -- Pilih Kondisi --</option>
			<?php
			$this->db->where("ref_grup","75");
			foreach($this->db->get("referensi")->result() as $row)
			{
				echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
			}
			?>
		</select>
	</div>
</div>

<div class="form-group form-group-sm">
	<label for="warga" class="control-label col-sm-4">Kewarganegaraan</label>
	<div class="col-sm-8">
		<input type="radio"  placeholder="" name="warga" value="WNI">WNA &nbsp;
		<input type="radio"  placeholder="" name="warga" value="WNA">WNI
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="anakke" class="control-label col-sm-4">Anak ke</label>
	<div class="col-sm-2">
		<input type="text" class="form-control" id="anakke" placeholder="" name="anakke"> 
	</div>
	<div class="col-sm-1">
	Dari
	</div>
	<div class="col-sm-2">
		<input type="text" class="form-control" id="jsaudara" placeholder="" name="jsaudara"> 
	</div>
	<div class="col-sm-2">
	bersaudara
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="statusanak" class="control-label col-sm-4">Status Anak</label>
	<div class="col-sm-8">
		<select name="statusanak" class="form-control" id="kondisi">
			<option value=""> -- Pilih Status --</option>
			<?php
			$this->db->where("ref_grup","76");
			foreach($this->db->get("referensi")->result() as $row)
			{
				echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
			}
			?>
		</select>
		
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="jkandung" class="control-label col-sm-4">Jml. Saudara Kandung</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="jkandung" placeholder="" name="jkandung">
	</div>
	<div class="col-sm-2">
		Orang
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="jtiri" class="control-label col-sm-4">Jml. Saudara Tiri</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="jtiri" placeholder="" name="jtiri">
	</div>
	<div class="col-sm-2">
		Orang
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="bahasa" class="control-label col-sm-4">Bahasa Y/digunakan</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="bahasa" placeholder="" name="bahasa">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="alamatsiswa" class="control-label col-sm-4">Alamat</label>
	<div class="col-sm-8">
		<textarea class="form-control" id="alamatsiswa" name="alamatsiswa">
		</textarea>
		
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="kodepossiswa" class="control-label col-sm-4">Kode POS</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="kodepossiswa" placeholder="" name="kodepossiswa">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="jarak" class="control-label col-sm-4">Jarak ke Sekolah</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="jarak" placeholder="" name="jarak">
	</div>
	<div class="col-sm-2">
		KM
	</div>
</div>

<div class="form-group form-group-sm">
	<label for="telponsiswa" class="control-label col-sm-4">No Telepon</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="telponsiswa" placeholder="" name="telponsiswa">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="hpsiswa" class="control-label col-sm-4">No Handphone</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="hpsiswa" placeholder="" name="hpsiswa">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="emailsiswa" class="control-label col-sm-4">Email</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="emailsiswa" placeholder="" name="emailsiswa">
	</div>
</div>
</div>




<div class="col-md-6">
<div class="form-group form-group-sm">
	<div class="col-sm-12">
		<img src="" class="showfoto" width="120px">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="foto" class="control-label col-sm-4">Foto</label>
	<div class="col-sm-8">
		<input type="file" id="foto" name="foto">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="darah" class="control-label col-sm-4">Gol. Darah</label>
	<div class="col-sm-8">
		<input type="radio"  name="darah" value="A">A &nbsp;
		<input type="radio"  name="darah" value="AB">AB &nbsp;
		<input type="radio"  name="darah" value="B">B &nbsp;
		<input type="radio"  name="darah" value="O">O &nbsp;
		<input type="radio"  name="darah" value="">( Belum Ada )
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="berat" class="control-label col-sm-4">Berat</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="berat" placeholder="" name="berat">
	</div>
	<div class="col-sm-2">
		kg
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="tinggi" class="control-label col-sm-4">Tinggi</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="tinggi" placeholder="" name="tinggi">
	</div>
	<div class="col-sm-2">
		cm
	</div>
</div>

<div class="form-group form-group-sm">
	<label for="kesehatan" class="control-label col-sm-4">Riwayat Kesehatan</label>
	<div class="col-sm-8">
		<textarea name="kesehatan" class="form-control">
		</textarea>
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="tahunmasuk" class="control-label col-sm-4">Tahun Masuk</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="tahunmasuk" placeholder="" name="tahunmasuk" required>
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="asalsekolah" class="control-label col-sm-4">Asal Sekolah</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="asalsekolah" placeholder="" name="asalsekolah">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="nisn" class="control-label col-sm-4">NISN</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="nisn" placeholder="" name="nisn">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="nik" class="control-label col-sm-4">NIK</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="nik" placeholder="" name="nik">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="noun" class="control-label col-sm-4">No UN</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="noun" placeholder="" name="noun">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="noijasah" class="control-label col-sm-4">No Ijasah</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="noijasah" placeholder="" name="noijasah">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="tglijasah" class="control-label col-sm-4">Tgl Ijasah</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="tglijasah" placeholder="" name="tglijasah">
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="ketsekolah" class="control-label col-sm-4">Keterangan Asal Sekolah</label>
	<div class="col-sm-8">
		<textarea class="form-control" id="ketsekolah"  name="ketsekolah">
		</textarea>
		
	</div>
</div>
<div class="form-group form-group-sm">
	<label for="warga" class="control-label col-sm-4">Status</label>
	<div class="col-sm-8">
		<input type="radio"  placeholder="" name="aktif" value="1">Aktif &nbsp;
		<input type="radio"  placeholder="" name="aktif" value="0">Tidak Aktif
	</div>
</div>
</div>