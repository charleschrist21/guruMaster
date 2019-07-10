<?php
    include "koneksi.php";

    $dtSiswa = "SELECT * FROM Siswa";
    $dtKelas = "SELECT * FROM Kelas";
    $dtMapel = "SELECT * FROM Mapel";
    $dtGuru ="SELECT * FROM Guru";
    $result = $conn->query($dtGuru);
    $shdatasiswa = $conn->query($dtSiswa);
    $shdatakelas = $conn->query($dtKelas);
    $shdatamapel = $conn->query($dtMapel);
    
    foreach($shdatasiswa as $res){
        $NIS = $res["NIS"];
        $NamaSiswa = $res["Nama"];
        $AlamatSiswa = $res["Alama"];
        $Tgl_MasukSiswa = $res["Tgl_Masuk"];
        $Tgl_KeluarSiswa = $res["Tgl_Keluar"];
        $Img_Siswa = $res["Img_Siswa"];
    }

    foreach($result as $res){
        $NIP = $res["NIP"];
        $NamaGuru = $res["Nama"];
        $AlamatGuru = $res["Alamat"];
        $Tgl_MasukGuru = $res["Tgl_Masuk"];
        $Tgl_KeluarGuru = $res["Tgl_Keluar"];
        $Img_Guru = $res["Img_Guru"];
    }

    foreach($shdatakelas as $sdk){
        $id_Kelas = ["Id_kelas"];
        $NamaKelas = ["Nama_Kelas"];
    }

    foreach($shdatamapel as $sdm){
        $id_mapel = ["Id_Mapel"];
        $Nama_Mapel = ["Nama_Mapel"];
    }
?>