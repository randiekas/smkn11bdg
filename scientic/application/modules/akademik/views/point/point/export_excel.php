<table>
    
    <?php
    $this->db->where("idkelas",$this->uri->segment("5"));
    $this->db->order_by("nis","ASC");
    $result = $this->db->get('siswa')->result_array();
    $x =1;
    //foreach($_POST as $key=>$val)
    //{	
        //<th><?=str_replace("_","",$key)</th>   
    ?>
    <tr>
        <th>replid</th>    
            <th>idkelas</th>    
            <th>tanggalinput</th>    
            <th>tingkat</th>    
            <th>tanggalregistrasi</th>    
            <th>foto</th>    
            <th>idangkatan</th>    
            <th>nama</th>    
            <th>kelamin</th>    
            <th>nisn</th>    
            <th>nis</th>    
            <th>noun</th>    
            <th>noijasah</th>    
            <th>nik</th>    
            <th>tmplahir</th>    
            <th>tgllahir</th>    
            <th>agama</th>    
            <th>berkebutuhankhusus</th>    
            <th>alamatsiswa</th>    
            <th>alamatdusun</th>    
            <th>alamatrt</th>    
            <th>alamatrw</th>    
            <th>alamatkelurahan</th>    
            <th>kodepossiswa</th>    
            <th>alamatkecamatan</th>    
            <th>alamatkabupaten</th>    
            <th>alamatprovinsi</th>    
            <th>alattransportasi</th>    
            <th>telponsiswa</th>    
            <th>hpsiswa</th>    
            <th>emailsiswa</th>    
            <th>penerimakps</th>    
            <th>nokps</th>    
            <th>namaayah</th>    
            <th>ayahtahunlahir</th>    
            <th>ayahberkebutuhankhusus</th>    
            <th>ayahberkebutuhankhusus</th>    
            <th>pekerjaanayah</th>    
            <th>pendidikanayah</th>    
            <th>penghasilanayah</th>    
            <th>namaibu</th>    
            <th>ibutahunlahir</th>    
            <th>ibuberkebutuhankhusus</th>    
            <th>ibuberkebutuhankhusus</th>    
            <th>pekerjaanibu</th>    
            <th>pendidikanibu</th>    
            <th>penghasilanibu</th>    
            <th>wali</th>    
            <th>walitahunlahir</th>    
            <th>pekerjaanwali</th>    
            <th>pendidikanwali</th>    
            <th>penghasilanwali</th>    
            <th>tinggi</th>    
            <th>berat</th>    
            <th>jarak</th>    
            <th>jaraktempuh</th>    
            <th>waktu</th>    
            <th>waktutempuh</th>    
            <th>jkandung</th>    
            <th>prestasijenis1</th>    
            <th>prestasitingkat1</th>    
            <th>prestasinama1</th>    
            <th>prestasitahun1</th>    
            <th>prestasipenyelenggara1</th>    
            <th>prestasijenis2</th>    
            <th>prestasitingkat2</th>    
            <th>prestasinama2</th>    
            <th>prestasitahun2</th>    
            <th>prestasipenyelenggara2</th>    
            <th>prestasijenis3</th>    
            <th>prestasitingkat3</th>    
            <th>prestasinama3</th>    
            <th>prestasitahun3</th>    
            <th>prestasipenyelenggara3</th>    
            <th>prestasijenis4</th>    
            <th>prestasitingkat4</th>    
            <th>prestasinama4</th>    
            <th>prestasitahun4</th>    
            <th>prestasipenyelenggara4</th>    
            <th>beasiswajenis1</th>    
            <th>beasiswapenyelenggara1</th>    
            <th>beasiswatahunmulai1</th>    
            <th>beasiswatahunselesai1</th>    
            <th>beasiswajenis2</th>    
            <th>beasiswapenyelenggara2</th>    
            <th>beasiswatahunmulai2</th>    
            <th>beasiswatahunselesai2</th>    
            <th>beasiswajenis3</th>    
            <th>beasiswapenyelenggara3</th>    
            <th>beasiswatahunmulai3</th>    
            <th>beasiswatahunselesai3</th>   
    </tr>
    <?php
    foreach($result as $row)
    {
        echo "<tr>";
            echo "<td>{$row['replid']}</td>";
            echo "<td>{$row['idkelas']}</td>";
            echo "<td>{$row['tanggal_input']}</td>";
            echo "<td>{$row['tingkat']}</td>";
            echo "<td>{$row['tanggal_registrasi']}</td>";
            echo "<td>{$row['foto']}</td>";
            echo "<td>{$row['idangkatan']}</td>";
            echo "<td>{$row['nama']}</td>";
            echo "<td>{$row['kelamin']}</td>";
            echo "<td>{$row['nisn']}</td>";
            echo "<td>{$row['nis']}</td>";
            echo "<td>{$row['noun']}</td>";
            echo "<td>{$row['noijasah']}</td>";
            echo "<td>{$row['nik']}</td>";
            echo "<td>{$row['tmplahir']}</td>";
            echo "<td>{$row['tgllahir']}</td>";
            echo "<td>{$row['agama']}</td>";
            echo "<td>{$row['berkebutuhankhusus']}</td>";
            echo "<td>{$row['alamatsiswa']}</td>";
            echo "<td>{$row['alamatdusun']}</td>";
            echo "<td>{$row['alamatrt']}</td>";
            echo "<td>{$row['alamatrw']}</td>";
            echo "<td>{$row['alamatkelurahan']}</td>";
            echo "<td>{$row['kodepossiswa']}</td>";
            echo "<td>{$row['alamatkecamatan']}</td>";
            echo "<td>{$row['alamatkabupaten']}</td>";
            echo "<td>{$row['alamatprovinsi']}</td>";
            echo "<td>{$row['alattransportasi']}</td>";
            echo "<td>{$row['telponsiswa']}</td>";
            echo "<td>{$row['hpsiswa']}</td>";
            echo "<td>{$row['emailsiswa']}</td>";
            echo "<td>{$row['penerimakps']}</td>";
            echo "<td>{$row['nokps']}</td>";
            echo "<td>{$row['namaayah']}</td>";
            echo "<td>{$row['ayahtahunlahir']}</td>";
            echo "<td>{$row['ayahberkebutuhankhusus_']}</td>";
            echo "<td>{$row['ayahberkebutuhankhusus']}</td>";
            echo "<td>{$row['pekerjaanayah']}</td>";
            echo "<td>{$row['pendidikanayah']}</td>";
            echo "<td>{$row['penghasilanayah']}</td>";
            echo "<td>{$row['namaibu']}</td>";
            echo "<td>{$row['ibutahunlahir']}</td>";
            echo "<td>{$row['ibuberkebutuhankhusus_']}</td>";
            echo "<td>{$row['ibuberkebutuhankhusus']}</td>";
            echo "<td>{$row['pekerjaanibu']}</td>";
            echo "<td>{$row['pendidikanibu']}</td>";
            echo "<td>{$row['penghasilanibu']}</td>";
            echo "<td>{$row['wali']}</td>";
            echo "<td>{$row['walitahunlahir']}</td>";
            echo "<td>{$row['pekerjaanwali']}</td>";
            echo "<td>{$row['pendidikanwali']}</td>";
            echo "<td>{$row['penghasilanwali']}</td>";
            echo "<td>{$row['tinggi']}</td>";
            echo "<td>{$row['berat']}</td>";
            echo "<td>{$row['jarak']}</td>";
            echo "<td>{$row['jarak_tempuh']}</td>";
            echo "<td>{$row['waktu']}</td>";
            echo "<td>{$row['waktu_tempuh']}</td>";
            echo "<td>{$row['jkandung']}</td>";
            echo "<td>{$row['prestasi_jenis_1']}</td>";
            echo "<td>{$row['prestasi_tingkat_1']}</td>";
            echo "<td>{$row['prestasi_nama_1']}</td>";
            echo "<td>{$row['prestasi_tahun_1']}</td>";
            echo "<td>{$row['prestasi_penyelenggara_1']}</td>";
            echo "<td>{$row['prestasi_jenis_2']}</td>";
            echo "<td>{$row['prestasi_tingkat_2']}</td>";
            echo "<td>{$row['prestasi_nama_2']}</td>";
            echo "<td>{$row['prestasi_tahun_2']}</td>";
            echo "<td>{$row['prestasi_penyelenggara_2']}</td>";
            echo "<td>{$row['prestasi_jenis_3']}</td>";
            echo "<td>{$row['prestasi_tingkat_3']}</td>";
            echo "<td>{$row['prestasi_nama_3']}</td>";
            echo "<td>{$row['prestasi_tahun_3']}</td>";
            echo "<td>{$row['prestasi_penyelenggara_3']}</td>";
            echo "<td>{$row['prestasi_jenis_4']}</td>";
            echo "<td>{$row['prestasi_tingkat_4']}</td>";
            echo "<td>{$row['prestasi_nama_4']}</td>";
            echo "<td>{$row['prestasi_tahun_4']}</td>";
            echo "<td>{$row['prestasi_penyelenggara_4']}</td>";
            echo "<td>{$row['beasiswa_jenis_1']}</td>";
            echo "<td>{$row['beasiswa_penyelenggara_1']}</td>";
            echo "<td>{$row['beasiswa_tahun_mulai_1']}</td>";
            echo "<td>{$row['beasiswa_tahun_selesai_1']}</td>";
            echo "<td>{$row['beasiswa_jenis_2']}</td>";
            echo "<td>{$row['beasiswa_penyelenggara_2']}</td>";
            echo "<td>{$row['beasiswa_tahun_mulai_2']}</td>";
            echo "<td>{$row['beasiswa_tahun_selesai_2']}</td>";
            echo "<td>{$row['beasiswa_jenis_3']}</td>";
            echo "<td>{$row['beasiswa_penyelenggara_3']}</td>";
            echo "<td>{$row['beasiswa_tahun_mulai_3']}</td>";
            echo "<td>{$row['beasiswa_tahun_selesai_3']}</td>";
        echo "</tr>";
    }
    ?>
</table>