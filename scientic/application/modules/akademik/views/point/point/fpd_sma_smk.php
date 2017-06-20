<input type="hidden" class="form-control" id="replid" placeholder="" name="replid">
<input type="hidden" class="form-control" placeholder="" name="idkelas">
<div class="col-md-6">
    <div class="form-group form-group-sm">
        <label for="nama" class="control-label col-sm-4">Tanggal</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" name="tanggal_input" required>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label for="tingkat" class="control-label col-sm-4">Tingkat</label>
        <div class="col-sm-8">
            <select name="tingkat" class="form-control">
                <option value=""> -- Pilih Tingkat --</option>
                <?php
                foreach($this->db->get("tingkat")->result() as $row)
                {
                    echo "<option value='{$row->replid}'>{$row->tingkat}</option>";
                }
                ?>
            </select>
            
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label for="tanggal_registrasi" class="control-label col-sm-4">REG </label>
        <div class="col-sm-8">
            <input type="date" class="form-control" name="tanggal_registrasi" required>
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
        <label for="tanggal_input" class="control-label col-sm-4">Tanggal</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" name="tanggal_input" required>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label for="idangkatan" class="control-label col-sm-4">Angkatan</label>
        <div class="col-sm-8">
            <select name="idangkatan" class="form-control" id="idangkatan" required>

            </select>

        </div>
    </div>
</div>

<div class="col-md-12">
<div id="jqxNavigationBar">
    <div>
        <div>
            <div>
                IDENTITAS PESERTA DIDIK (WAJIB ISI)
            </div>   
        </div>
    </div>
    <div>
        <br/>
        <div class="col-md-12">
            <div class="form-group form-group-sm">
                <label for="nama" class="control-label col-sm-2">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" placeholder="" name="nama" required>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="kelamin" class="control-label col-sm-2">Kelamin</label>
                <div class="col-sm-10">
                    <input type="radio" name="kelamin" value="1">Laki-Laki &nbsp;
                    <input type="radio" name="kelamin" value="0">Perempuan
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="nisn" class="control-label col-sm-2">NISN</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nisn" placeholder="" name="nisn" required>
                </div>
                <label for="nama" class="control-label col-sm-2">NIS</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nis" placeholder="" name="nis" required>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="noun" class="control-label col-sm-2">No UN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="noun" placeholder="" name="noun">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="noijasah" class="control-label col-sm-2">No Seri Ijasah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="noijasah" placeholder="" name="noijasah">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="noijasah" class="control-label col-sm-2">No Seri SKHUN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="noskhun" placeholder="" name="noijasah">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="nik" class="control-label col-sm-2">No. Induk Kependudukan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nik" placeholder="" name="nik">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="tmplahir" class="control-label col-sm-2">Tempat, Tgl Lahir</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="tmplahir" placeholder="Tempat Lahir" name="tmplahir">
                </div>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tgllahir" placeholder="" name="tgllahir">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="agama" class="control-label col-sm-2">Agama</label>
                <div class="col-sm-5">
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
                <label for="berkebutuhankhusus" class="control-label col-sm-2">Berkebutuhan Khusus</label>
                <div class="col-sm-5">
                    <select name="berkebutuhankhusus" class="form-control" id="berkebutuhankhusus">
                        <option value=""> -- Pilih Salah Satu --</option>
                        <?php
                        $this->db->where("ref_grup","85");
                        foreach($this->db->get("referensi")->result() as $row)
                        {
                            echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="alamatsiswa" class="control-label col-sm-2">Alamat Tempat Tinggal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamatsiswa" placeholder="Alamat" name="alamatsiswa">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="alamatdusun" class="control-label col-sm-2">Dusun</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="alamatdusun" placeholder="dusun" name="alamatdusun">
                </div>
                <label for="alamatrt" class="control-label col-sm-1">RT</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="alamatrt" placeholder="00/00" name="alamatrt">
                </div>
                <label for="alamatrw" class="control-label col-sm-1">RW</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="alamatrw" placeholder="00/00" name="alamatrw">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="alamatkelurahan" class="control-label col-sm-2">Kelurahan / Desa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="alamatkelurahan" placeholder="Kelurahan" name="alamatkelurahan">
                </div>
                <label for="kodepossiswa" class="control-label col-sm-2">Kode POS</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="kodepossiswa" placeholder="" name="kodepossiswa">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="alamatkecamatan" class="control-label col-sm-2">Kecamatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamatkecamatan" placeholder="Kecamatan" name="alamatkecamatan">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="alamatkabupaten" class="control-label col-sm-2">Kabupaten / Kota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamatkabupaten" placeholder="Kelurahan" name="alamatkabupaten">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="alamatprovinsi" class="control-label col-sm-2">Provinsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamatprovinsi" placeholder="Provinsi" name="alamatprovinsi">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="alattransportasi" class="control-label col-sm-2">Alat Transportasi</label>
                <div class="col-sm-5">
                    <select name="alattransportasi" class="form-control" id="alattransportasi">
                        <option value=""> -- Pilih Salah Satu --</option>
                        <?php
                        $this->db->where("ref_grup","95");
                        foreach($this->db->get("referensi")->result() as $row)
                        {
                            echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="alattransportasi" class="control-label col-sm-2">Jenis Tinggal</label>
                <div class="col-sm-5">
                    <select name="alattransportasi" class="form-control" id="alattransportasi">
                        <option value=""> -- Pilih Salah Satu --</option>
                        <?php
                        $this->db->where("ref_grup","96");
                        foreach($this->db->get("referensi")->result() as $row)
                        {
                            echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="telponsiswa" class="control-label col-sm-2">No Telp. Rumah</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="telponsiswa" placeholder="" name="telponsiswa">
                </div>
                <label for="hpsiswa" class="control-label col-sm-2">No Handphone</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="hpsiswa" placeholder="" name="hpsiswa">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="emailsiswa" class="control-label col-sm-2">Email Pribadi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="emailsiswa" placeholder="" name="emailsiswa">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="penerimakps" class="control-label col-sm-2">Penerima KPS ?</label>
                <div class="col-sm-2">
                    <select name="penerimakps" class="form-control" id="penerimakps">
                        <option value=""></option>
                        <option value="1"> YA </option>
                        <option value="0"> TIDAK </option>
                    </select>
                </div>
                <label for="nokps" class="control-label col-sm-2">No. KPS</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nokps" placeholder="" name="nokps">
                </div>
            </div>
            
        </div>
        <div>
        <br/>
            <div class="col-md-12">
            </div>
        </div>
    </div>
    <div>
        <div>
            <div>
                DATA AYAH KANDUNG (WAJIB ISI)
            </div>
        </div>
    </div>
    <div>
        <br/>
        <div class="col-md-12">
            <div class="form-group form-group-sm">
                <label for="namaayah" class="control-label col-sm-2">Nama Ayah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="namaayah" placeholder="" name="namaayah">
                </div>
                <label for="ayahtahunlahir" class="control-label col-sm-2">Tahun Lahir</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="ayahtahunlahir" placeholder="2016" name="ayahtahunlahir">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="ayahberkebutuhankhusus_" class="control-label col-sm-2">Berkebutuhan Khusus?</label>
                <div class="col-sm-2">
                    <select name="ayahberkebutuhankhusus_" class="form-control" id="ayahberkebutuhankhusus_">
                        <option value=""></option>
                        <option value="1"> YA </option>
                        <option value="0"> TIDAK </option>
                    </select>
                </div>
                <div class="col-sm-8">
                    <select name="ayahberkebutuhankhusus" class="form-control" id="ayahberkebutuhankhusus">
                        <option value=""> -- Pilih Salah Satu --</option>
                        <?php
                        $this->db->where("ref_grup","85");
                        foreach($this->db->get("referensi")->result() as $row)
                        {
                            echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="pekerjaanayah" class="control-label col-sm-2">Pekerjaan</label>
                <div class="col-sm-10">
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
                <label for="pendidikanayah" class="control-label col-sm-2">Pendidikan</label>
                <div class="col-sm-10">
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
                <label for="penghasilanayah" class="control-label col-sm-2">Penghasilan Bulanan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penghasilanayah" placeholder="" name="penghasilanayah">
                </div>
            </div>    
        </div>
    </div>
    <div>
        <div>
            <div>
                DATA IBU KANDUNG (WAJIB ISI)
            </div>
        </div>
    </div>
    <div>
        <br/>
        <div class="col-md-12">
            <div class="form-group form-group-sm">
                <label for="namaibu" class="control-label col-sm-2">Nama Ibu</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="namaibu" placeholder="" name="namaibu">
                </div>
                <label for="ayahtahunlahir" class="control-label col-sm-2">Tahun Lahir</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="ibutahunlahir" placeholder="2016" name="ibutahunlahir">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="ibuberkebutuhankhusus_" class="control-label col-sm-2">Berkebutuhan Khusus?</label>
                <div class="col-sm-2">
                    <select name="ibuberkebutuhankhusus_" class="form-control" id="ibuberkebutuhankhusus_">
                        <option value=""></option>
                        <option value="1"> YA </option>
                        <option value="0"> TIDAK </option>
                    </select>
                </div>
                <div class="col-sm-8">
                    <select name="ibuberkebutuhankhusus" class="form-control" id="ibuberkebutuhankhusus">
                        <option value=""> -- Pilih Salah Satu --</option>
                        <?php
                        $this->db->where("ref_grup","85");
                        foreach($this->db->get("referensi")->result() as $row)
                        {
                            echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="pekerjaanibu" class="control-label col-sm-2">Pekerjaan Ibu</label>
                <div class="col-sm-10">
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
                <label for="pendidikanibu" class="control-label col-sm-2">Pendidikan Ibu</label>
                <div class="col-sm-10">
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
                <label for="penghasilanibu" class="control-label col-sm-2">Penghasilan bulanan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="penghasilanibu" placeholder="" name="penghasilanibu">
                </div>
            </div>
            
        </div>
    </div>
    <div>
        <div>
            <div>
                DATA WALI
            </div>
        </div>
    </div>
    <div>
        <br/>
        <div class="col-md-12">
            <div class="form-group form-group-sm">
                <label for="wali" class="control-label col-sm-2">Nama Wali</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="wali" placeholder="" name="wali">
                </div>
                <label for="walitahunlahir" class="control-label col-sm-2">Tahun Lahir</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="walitahunlahir" placeholder="2016" name="walitahunlahir">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="pekerjaanwali" class="control-label col-sm-2">Pekerjaan</label>
                <div class="col-sm-10">
                    <select name="pekerjaanwali" class="form-control" id="pekerjaanwali">
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
                <label for="pendidikanwali" class="control-label col-sm-2">Pendidikan</label>
                <div class="col-sm-10">
                    <select name="pendidikanwali" class="form-control" id="pendidikanwali" required>
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
                <label for="penghasilanwali" class="control-label col-sm-2">Penghasilan Bulanan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penghasilanwali" placeholder="" name="penghasilanwali">
                </div>
            </div>    
        
        </div>
    </div>
    <div>
        <div>
            <div>
                DATA PERIODIK (WAJIB DI ISI)
            </div>
        </div>
    </div>
    <div>
        <br/>
        <div class="col-md-12">
            <div class="form-group form-group-sm">
                <label for="tinggi" class="control-label col-sm-2">Tinggi Badan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="tinggi" placeholder="" name="tinggi">
                </div>
                <div class="col-sm-1">
                    cm
                </div>
                
                <label for="berat" class="control-label col-sm-2">Berat Badan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="berat" placeholder="" name="berat">
                </div>
                <div class="col-sm-1">
                    kg
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="jarak" class="control-label col-sm-2">Jarak ke Sekolah</label>
                <div class="col-sm-3">
                    <select name="jarak" class="form-control" id="jarak" required>
                        <option value=""> -- Pilih Jarak --</option>
                            <?php
                            $this->db->where("ref_grup",97);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <label for="jarak_tempuh" class="control-label col-sm-3">Lebih dari 1 km, sebutkan :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="jarak_tempuh" placeholder="" name="jarak_tempuh">
                </div>
                <div class="col-sm-2">
                    KM
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-sm-2">Waktu tempuh kesekolah</label>
                <div class="col-sm-3">
                    <select name="waktu" class="form-control" id="waktu" required>
                        <option value=""> -- Pilih Waktu --</option>
                            <?php
                            $this->db->where("ref_grup",98);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <label for="waktu_tempuh" class="control-label col-sm-3">Lebih dari 60m, sebutkan :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="waktu_tempuh" placeholder="" name="waktu_tempuh">
                </div>
                <div class="col-sm-2">
                    Menit
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="jkandung" class="control-label col-sm-2">Jml. Saudara Kandung</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="jkandung" placeholder="" name="jkandung">
                </div>
                <div class="col-sm-2">
                    Orang
                </div>
            </div>
        <!-- batas !-->
        </div>
    </div>
    <div>
        <div>
            <div>
                CATATAN PRESTASI
            </div>
        </div>
    </div>
    <div>
        <br/>
        <div class="col-md-12">
            <div class="form-group form-group-sm">
                <label class="control-label col-sm-2">Jenis Prestasi</label>
                <label class="control-label col-sm-2">Tingkat</label>
                <label for="waktu" class="control-label col-sm-4">Nama Prestasi</label>
                <label class="control-label col-sm-2">Tahun</label>
                <label class="control-label col-sm-2">Penyelenggara</label>
            </div>
            <div class="form-group form-group-sm">
                <!-- baris !-->
                <div class="col-sm-2">
                    <select name="prestasi_jenis_1" class="form-control">
                        <option value=""> -- Pilih Prestasi --</option>
                            <?php
                            $this->db->where("ref_grup",99);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select name="prestasi_tingkat_1" class="form-control">
                        <option value=""> -- Pilih Tingkat --</option>
                            <?php
                            $this->db->where("ref_grup",100);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
            
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="prestasi_nama_1">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="" name="prestasi_tahun_1">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="" name="prestasi_penyelenggara_1">
                </div>
            </div>
            <div class="form-group form-group-sm">    
               <!-- baris !-->
                <div class="col-sm-2">
                    <select name="prestasi_jenis_2" class="form-control">
                        <option value=""> -- Pilih Prestasi --</option>
                            <?php
                            $this->db->where("ref_grup",99);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select name="prestasi_tingkat_2" class="form-control">
                        <option value=""> -- Pilih Tingkat --</option>
                            <?php
                            $this->db->where("ref_grup",100);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="prestasi_nama_2">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="" name="prestasi_tahun_2">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="" name="prestasi_penyelenggara_2">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <!-- baris !-->
                <div class="col-sm-2">
                    <select name="prestasi_jenis_3" class="form-control">
                        <option value=""> -- Pilih Prestasi --</option>
                            <?php
                            $this->db->where("ref_grup",99);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select name="prestasi_tingkat_3" class="form-control">
                        <option value=""> -- Pilih Tingkat --</option>
                            <?php
                            $this->db->where("ref_grup",100);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="prestasi_nama_3">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="" name="prestasi_tahun_3">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="" name="prestasi_penyelenggara_3">
                </div>
            </div>
            <div class="form-group form-group-sm">
                 <!-- baris !-->
                <div class="col-sm-2">
                    <select name="prestasi_jenis_4" class="form-control">
                        <option value=""> -- Pilih Prestasi --</option>
                            <?php
                            $this->db->where("ref_grup",99);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select name="prestasi_tingkat_4" class="form-control">
                        <option value=""> -- Pilih Tingkat --</option>
                            <?php
                            $this->db->where("ref_grup",100);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="prestasi_nama_4">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="" name="prestasi_tahun_4">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="" name="prestasi_penyelenggara_4">
                </div>
            </div>
        </div>
    </div>
       <div>
        <div>
            <div>
                BEASISWA
            </div>
        </div>
    </div>
    <div>
        <br/>
        <div class="col-sm-12">
        <div class="form-group form-group-sm">
            <div class="form-group form-group-sm">
                <label class="control-label col-sm-2">Jenis</label>
                <label class="control-label col-sm-6">Penyelenggara / Sumber</label>
                <label class="control-label col-sm-2">Tahun Mulai</label>
                <label class="control-label col-sm-2">Tahun Selesai</label>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <!-- baris !-->
            <div class="col-sm-2">
                    <select name="beasiswa_jenis_1" class="form-control">
                        <option value=""> -- Pilih Jenis --</option>
                            <?php
                            $this->db->where("ref_grup",101);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
            </div>
        
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="" name="beasiswa_penyelenggara_1">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" name="beasiswa_tahun_mulai_1">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" name="beasiswa_tahun_selesai_1">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <!-- baris !-->
            <div class="col-sm-2">
                    <select name="beasiswa_jenis_2" class="form-control">
                        <option value=""> -- Pilih Jenis --</option>
                            <?php
                            $this->db->where("ref_grup",101);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="" name="beasiswa_penyelenggara_2">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" name="beasiswa_tahun_mulai_2">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" name="beasiswa_tahun_selesai_2">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <!-- baris !-->
            <div class="col-sm-2">
                    <select name="beasiswa_jenis_3" class="form-control">
                        <option value=""> -- Pilih Jenis --</option>
                            <?php
                            $this->db->where("ref_grup",101);
                            foreach($this->db->get("referensi")->result() as $row)
                            {
                                echo "<option value='{$row->ref_kode}'> {$row->ref_nama}</option>";
                            }
                            ?>
                    </select>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="" name="beasiswa_penyelenggara_3">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" name="beasiswa_tahun_mulai_3">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" name="beasiswa_tahun_selesai_3">
            </div>
            
        </div>
            <br/>
    </div>
    </div>
    <!-- batas !-->
</div>
</div>
<input type="submit" style="display:none">