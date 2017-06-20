<input type="hidden" name="replid">
<input type="submit" style="display:none">
<div id="jqxNavigationBar">
			<div>
                <div>
                    <div>
                        Identitas Pendidikan dan Tenaga Kependidikan
					</div>
                </div>
            </div>
            <div>
                <div class="col-md-8 pd">
                    <div class="form-group">
                      <div class="col-sm-3">
                        <label for="inputEmail3" class="control-label">Gelar/Nama/Gelar</label>
                      </div>
					  <div class="col-sm-3">
                        <input type="text" name="gelarawal" class="form-control" id="inputEmail3" placeholder="Gelar Akhir" required>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama" required>
                      </div>
					  <div class="col-sm-3">
                        <input type="text" name="gelarakhir" class="form-control" id="inputEmail3" placeholder="Gelar Akhir" required>
                      </div>
                    </div>
					
                    <div class="form-group">
                      <div class="col-sm-3">
                        <label for="inputEmail3" class="control-label">NIK</label>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" name="nik" class="form-control" id="inputEmail3" placeholder="" required>
                      </div>
					  <div class="col-sm-3">
                        *) Wajib Di Isi
                      </div>
                    </div>
					
					 <div class="form-group">
                      <div class="col-sm-3">
                        <label for="inputEmail3" class="control-label">Jenis Kelamin</label>
                      </div>
                      <div class="col-sm-2">
                        <label class="radio">
                          <input type="radio" name="kelamin" id="optionsRadios1" value="L">Pria
                        </label>
                      </div>
                      <div class="col-sm-1">
                        <label class="radio">
                          <input type="radio" name="kelamin" id="optionsRadios1" value="P">Wanita
                        </label>
                      </div>
                    </div>
					
					<div class="form-group">
                      <div class="col-sm-3">
                        <label for="inputEmail3" class="control-label">Tempat, Tgl Lahir</label>
                      </div>
                     <div class="col-sm-3">
							<input type="text" name="tmplahir" class="form-control" id="inputEmail3" placeholder="">
						</div>
						<div class="col-sm-2">
							<div class="tgllahir" name="tgllahir"></div>
						</div>
                    </div>
					
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Nama Ibu Kandung</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="ibu_kandung" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					
				</div>
				<div class="col-md-4 pd">
						<div class="row">
							<div class="gambarup">
								<img src="<?=base_url()?>assets/dosen/default.png" style="width: 50%;" class="imgChangeImage">
								
							</div>	  
								 <div class="input-group-sm pd">
									  <input type="file" name="Foto"><br>
								</div>
							</div>  
					</div>
		</div>		
		
	
		<div>
                <div>
                    <div>
                        DATA PRIBADI
					</div>
                </div>
            </div>
            <div>
				<div class="col-md-8 pd">
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Alamat Tinggal</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="">
						  </div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Dusun</label>
						</div>
						<div class="col-sm-3">
							<input type="text" name="dusun" class="form-control" id="inputEmail3" placeholder="">
						 </div>
						<div class="col-sm-1">
							<label for="inputEmail3" class="control-label">RT</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="rt" class="form-control" id="inputEmail3" placeholder="">
						 </div>
						<div class="col-sm-1">
							<label for="inputEmail3" class="control-label">RW</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="rw" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Kelurahan / Desa</label>
						</div>
						<div class="col-sm-5">
							<input type="text" name="desa" class="form-control" id="inputEmail3" placeholder="">
						 </div>
						<div class="col-sm-2">
							<label for="inputEmail3" class="control-label">Kode POS</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="kodepos" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Kecamatan</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="kecamatan" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Kabupaten/Kota</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="kota" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Provinsi</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="provinsi" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Agama</label>
						</div>
						<div class="col-sm-4">
							<select name="agama" class="form-control">
								<option value="">-- Pilih Agama --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								 $this->db->where("ref_grup","51");
								 $agama = $this->db->get("referensi");
								 foreach($agama->result() as $row)
								 {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
							</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">NPWP</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="npwp" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Kewarganegaraan</label>
						</div>
						<div class="col-sm-4">
							<select name="kewarganegaraan" class="form-control">
								<option value="">-- Pilih Kegarganegaraan --</option>
								  
								  <option value="wni">WNI</option>
								  <option value="wna">WNA</option>
								  
							</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Status Sipil</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="nikah">
									<option value="">-- Pilih Status Sipil --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","52");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Nama Suami / Istri</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="namapasangan" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Pekerjaan Suami / Istri</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="pekerjaanpasangan">
									<option value="">-- Pilih Pekerjaan --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","55");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Jika PNS, NIP</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="nippasangan" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					
				</div>
			</div>
				
				<!-- !-->
			<div>
                <div>
                    <div>
                        KEPEGAWAIAN
					</div>
                </div>
            </div>
            <div>
				<div class="col-md-8 pd">
					
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Status Pegawai</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="statuspegawai">
									<option value="">-- Pilih Status --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","79");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Jika PNS, NIP</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="nip" class="form-control" id="inputEmail3" placeholder="" required>
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">NIY/NIGK</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="niy" class="form-control" id="inputEmail3" placeholder="">
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">NIGB</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="nigb" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">NUPTK</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="nuptk" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Jenis PTK</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="jenisptk">
									<option value="">-- Pilih Jenis --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","80");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Status Aktif </label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="statusaktif">
									<option value="">-- Pilih Jenis --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","81");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">TMT Pengangkatan</label>
						</div>
						<div class="col-sm-4">
							<input type="date" name="tmtpengangkatan" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Lembaga Pengangkat</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="lembagapengangkat">
									<option value="">-- Pilih Jenis --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","81");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">SK CPNS</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="skcpns" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">TMT CPNS</label>
						</div>
						<div class="col-sm-4">
							<input type="date" name="tmtcpns" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">TMT PNS</label>
						</div>
						<div class="col-sm-4">
							<input type="date" name="tmtpns" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Pangkat / Golongan</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="pangkat">
								  <?php
								  $this->db->select("golongan,nama");
								  $golongan = $this->db->get("golongan");
								  foreach($golongan->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->golongan?>"><?=$row->golongan." - ".$row->nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Sumber Gaji</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="sumbergaji">
									<option value="">-- Sumber Gaji --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","81");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					
				</div>
			</div>
			
		<div>
			<div>
				<div>
					KOMPETENSI KHUSUS
				</div>
			</div>
		</div>
		<div>
			<div class="col-md-8 pd">
					<div class="form-group">
						<div class="col-sm-12">
							<label for="inputEmail3" class="control-label"><strong>Jika Jabatan Anda Kepala Sekolah</strong></label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Licensi Kepala Sekolah</label>
						</div>
						<div class="col-sm-4">
							<select class="form-control" name="licensikepalasekolah">
									<option value="0">Belum</option>
									<option value="1">Sudah</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="inputEmail3" class="control-label"><strong>Jika Jabatan Anda Teknisi Laboratorium atau Laboran dan memiliki program keahlian</strong></label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Kode Program Keahlian</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="programkeahlian">
									<option value="">-- Program Keahliah --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","84");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-8">
							<label for="inputEmail3" class="control-label">1. Jika anda guru yang menangani siswa berkebutuhan khusus, jenis ketunaan apa saja yang ditangani :</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="menanganikebutuhankhusus">
									<option value="">-- Program Keahliah --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","84");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-8">
							<label for="inputEmail3" class="control-label">2. spesialisasi apa yang dimiliki untuk menangani kebutuhan khusus :</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="spesialisasikebutuhankhusus">
									<option value="">-- Program Keahliah --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","85");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>	
					<div class="form-group">
						<div class="col-sm-8">
							<label for="inputEmail3" class="control-label">3. keahlian khusus apa saja yang dimiliki untuk menangani kebutuhan khusus :</label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="keahliankebutuhankhusus">
									<option value="">-- Program Keahliah --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","85");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>	
					<div class="form-group">
						<div class="col-sm-8">
							<label for="inputEmail3" class="control-label"></label>
						</div>
						<div class="col-sm-4">
							  <select class="form-control" name="keahliankebutuhankhusus2">
									<option value="">-- Program Keahliah --</option>
								  <?php
								  $this->db->select("ref_kode,ref_nama");
								  $this->db->where("ref_grup","87");
								  $agama = $this->db->get("referensi");
								  foreach($agama->result() as $row)
								  {
								  ?>
								  <option value="<?=$row->ref_kode?>"><?=$row->ref_nama?></option>
								  <?php
								  }
								  ?>
								</select>
                      </div>
					</div>	
					
					
			</div>
		</div>
		
		
		<div>
			<div>
				<div>
					KONTAK
				</div>
			</div>
		</div>
		<div>
			<div class="col-md-8 pd">
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">No. Telpon</label>
						</div>
						<div class="col-sm-3">
							<input type="text" name="telpon" class="form-control" id="inputEmail3" placeholder="">
						</div>
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">No. FAX</label>
						</div>
						<div class="col-sm-3">
							<input type="text" name="fax" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					
					
					<div class="form-group">
						<div class="col-sm-3">
							<label for="inputEmail3" class="control-label">Email</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="email" class="form-control" id="inputEmail3" placeholder="">
						</div>
					</div>
					
					
			</div>
		</div>
		
		
 </div>
 