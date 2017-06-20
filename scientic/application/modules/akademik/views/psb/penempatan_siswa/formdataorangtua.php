<div class="col-md-6">
	<div class="form-group form-group-sm">
		<label for="namaayah" class="control-label col-sm-4">Nama Ayah</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="namaayah" placeholder="" name="namaayah">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="statusayah" class="control-label col-sm-4">Status Ayah</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="statusayah" placeholder="" name="statusayah">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="tmplahirayah" class="control-label col-sm-4">Tmp. Lahir Ayah</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="tmplahirayah" placeholder="" name="tmplahirayah">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="tgllahirayah" class="control-label col-sm-4">Tgl. Lahir Ayah</label>
		<div class="col-sm-8">
			<input type="date" class="form-control" id="tgllahirayah" placeholder="" name="tgllahirayah">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="pendidikanayah" class="control-label col-sm-4">Pendidikan Ayah</label>
		<div class="col-sm-8">
			<select name="pendidikanayah" class="form-control" id="pendidikanayah" required>
				<option value=""> -- Pilih Pendidikan --</option>
					<?php
					$this->db->where("ref_grup",77);
					foreach($this->db->get("referensi")->result() as $row)
					{
						echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
					}
					?>
			</select>
			
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="pekerjaanayah" class="control-label col-sm-4">Pekerjaan Ayah</label>
		<div class="col-sm-8">
			<select name="pekerjaanayah" class="form-control" id="pekerjaanayah" required>
				<option value=""> -- Pilih Pekerjaan --</option>
					<?php
					$this->db->where("ref_grup",55);
					foreach($this->db->get("referensi")->result() as $row)
					{
						echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
					}
					?>
			</select>
			
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="penghasilanayah" class="control-label col-sm-4">Penghasilan Ayah</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="penghasilanayah" placeholder="" name="penghasilanayah">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="emailayah" class="control-label col-sm-4">Email Ayah</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="emailayah" placeholder="" name="emailayah">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="almayah" class="control-label col-sm-4">Alm. Ayah</label>
		<div class="col-sm-8">
			<input type="radio" name="almayah" value="1">Ya &nbsp;
			<input type="radio"  name="almayah" value="0">Tidak
			
		</div>
	</div>
		
</div>

<div class="col-md-6">

	<div class="form-group form-group-sm">
		<label for="namaibu" class="control-label col-sm-4">Nama Ibu</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="namaibu" placeholder="" name="namaibu">
		</div>
	</div>

	<div class="form-group form-group-sm">
		<label for="statusibu" class="control-label col-sm-4">Status Ibu</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="statusibu" placeholder="" name="statusibu">
		</div>
	</div>

	<div class="form-group form-group-sm">
		<label for="tmplahiribu" class="control-label col-sm-4">Tmp. Lahir Ibu</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="tmplahiribu" placeholder="" name="tmplahiribu">
		</div>
	</div>

	<div class="form-group form-group-sm">
		<label for="tgllahiribu" class="control-label col-sm-4">Tgl. Lahir Ibu</label>
		<div class="col-sm-8">
			<input type="date" class="form-control" id="tgllahiribu" placeholder="" name="tgllahiribu">
		</div>
	</div>
	
	
	<div class="form-group form-group-sm">
		<label for="pendidikanibu" class="control-label col-sm-4">Pendidikan Ibu</label>
		<div class="col-sm-8">
			<select name="pendidikanibu" class="form-control" id="pendidikanibu" required>
				<option value=""> -- Pilih Pendidikan --</option>
					<?php
					$this->db->where("ref_grup",77);
					foreach($this->db->get("referensi")->result() as $row)
					{
						echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
					}
					?>
			</select>
			
		</div>
	</div>

	<div class="form-group form-group-sm">
		<label for="pekerjaanibu" class="control-label col-sm-4">Pekerjaan Ibu</label>
		<div class="col-sm-8">
			<select name="pekerjaanibu" class="form-control" id="pekerjaanibu" required>
				<option value=""> -- Pilih Pekerjaan --</option>
					<?php
					$this->db->where("ref_grup",55);
					foreach($this->db->get("referensi")->result() as $row)
					{
						echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
					}
					?>
			</select>
			
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="penghasilanibu" class="control-label col-sm-4">Penghasilanibu</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="penghasilanibu" placeholder="" name="penghasilanibu">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="almibu" class="control-label col-sm-4">Alm. Ibu</label>
		<div class="col-sm-8">
			<input type="radio" name="almibu" value="1">Ya &nbsp;
			<input type="radio"  name="almibu" value="0">Tidak
			
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="emailibu" class="control-label col-sm-4">Email Ibu</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="emailibu" placeholder="" name="emailibu">
		</div>
	</div>
</div>
<div class="col-md-12">
<hr/>
</div>
<div class="col-md-6">

<div class="form-group form-group-sm">
		<label for="wali" class="control-label col-sm-4">Nama Wali</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="wali" placeholder="" name="wali">
		</div>
	</div>


	<div class="form-group form-group-sm">
		<label for="alamatortu" class="control-label col-sm-4">Alamat Ortu</label>
		<div class="col-sm-8">
			<textarea class="form-control" name="alamatortu">
			</textarea>
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="telponortu" class="control-label col-sm-4">Telepon Ortu</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="telponortu" placeholder="" name="telponortu">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="hportu" class="control-label col-sm-4">Nomor Hp Ortu</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="hportu" placeholder="" name="hportu">
		</div>
	</div>

	<div class="form-group form-group-sm">
		<label for="alamatsurat" class="control-label col-sm-4">Alamatsurat</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="alamatsurat" placeholder="" name="alamatsurat">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="keterangan" class="control-label col-sm-4">Keterangan</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="keterangan" placeholder="" name="keterangan">
		</div>
	</div>
	<div class="form-group form-group-sm">
		<label for="hobi" class="control-label col-sm-4">Hobi</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="hobi" placeholder="" name="hobi">
		</div>
	</div>
</div>