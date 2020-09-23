<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('Rupiah')) {
    function Rupiah($nil = 0)
    {
        $nil = $nil + 0;
        if (($nil * 100) % 100 == 0) {
            $nil = $nil . ".00";
        } elseif (($nil * 100) % 10 == 0) {
            $nil = $nil . "0";
        }
        $nil = str_replace('.', ',', $nil);
        $str1 = $nil;
        $str2 = "";
        $dot = "";
        $str = strrev($str1);
        $arr = str_split($str, 3);
        $i = 0;
        foreach ($arr as $str) {
            $str2 = $str2 . $dot . $str;
            if (strlen($str) == 3 and $i > 0) $dot = '.';
            $i++;
        }
        $rp = strrev($str2);
        if ($rp != "" and $rp > 0) {
            return "Rp. $rp";
        } else {
            return "Rp. 0,00";
        }
    }
}

if (!function_exists('Rupiah2')) {
    function Rupiah2($nil = 0)
    {
        $nil = $nil + 0;
        if (($nil * 100) % 100 == 0) {
            $nil = $nil . ".00";
        } elseif (($nil * 100) % 10 == 0) {
            $nil = $nil . "0";
        }
        $nil = str_replace('.', ',', $nil);
        $str1 = $nil;
        $str2 = "";
        $dot = "";
        $str = strrev($str1);
        $arr = str_split($str, 3);
        $i = 0;
        foreach ($arr as $str) {
            $str2 = $str2 . $dot . $str;
            if (strlen($str) == 3 and $i > 0) $dot = '.';
            $i++;
        }
        $rp = strrev($str2);
        if ($rp != "" and $rp > 0) {
            return "Rp.$rp";
        } else {
            return "-";
        }
    }
}

if (!function_exists('Rupiah3')) {
    function Rupiah3($nil = 0)
    {
        $nil = $nil + 0;
        if (($nil * 100) % 100 == 0) {
            $nil = $nil . ".00";
        } elseif (($nil * 100) % 10 == 0) {
            $nil = $nil . "0";
        }
        $nil = str_replace('.', ',', $nil);
        $str1 = $nil;
        $str2 = "";
        $dot = "";
        $str = strrev($str1);
        $arr = str_split($str, 3);
        $i = 0;
        foreach ($arr as $str) {
            $str2 = $str2 . $dot . $str;
            if (strlen($str) == 3 and $i > 0) $dot = '.';
            $i++;
        }
        $rp = strrev($str2);
        if ($rp != 0) {
            return "$rp";
        } else {
            return "-";
        }
    }
}

if (!function_exists('to_rupiah')) {
    function to_rupiah($inp = '')
    {
        $outp = str_replace('.', '', $inp);
        $outp = str_replace(',', '.', $outp);
        return $outp;
    }
}

if (!function_exists('daftar_goldar')) {
    function daftar_goldar()
    {
        return array(
            "A", "B", "AB", "O", "TIDAK TAHU"
        );
    }
}

if (!function_exists('daftar_agama')) {
    function daftar_agama()
    {
        return array(
            strtoupper("Islam"),
            strtoupper("Kristen"),
            strtoupper("Katholik"),
            strtoupper("Hindu"),
            strtoupper("Budha"),
            strtoupper("Konghuchu"),
            strtoupper("Kepercayaan Lain"),
        );
    }
}

if (!function_exists('pendidikan_terakhir')) {
    function pendidikan_terakhir()
    {
        return array(
            strtoupper("TIDAK/BELUM SEKOLAH"),
            strtoupper("BELUM TAMAT SD/SEDERAJAT"),
            strtoupper("TAMAT SD/SEDERAJAT"),
            strtoupper("SLTP/SEDERAJAT"),
            strtoupper("SLTA/SEDERAJAT"),
            strtoupper("DIPLOMA I/II"),
            strtoupper("AKADEMI/DIPLOMA III/SARJANA MUDA"),
            strtoupper("DIPLOMA IV/STRATA I"),
            strtoupper("STRATA II"),
            strtoupper("STRATA III"),
        );
    }
}

if (!function_exists('tempat_dilahirkan')) {
    function tempat_dilahirkan()
    {
        return array(
            strtoupper("RS/RB"),
            strtoupper("Puskesmas"),
            strtoupper("Polindes"),
            strtoupper("Rumah"),
            strtoupper("Lainnya"),
        );
    }
}

if (!function_exists('jenis_kelahiran')) {
    function jenis_kelahiran()
    {
        return array(
            strtoupper("Tunggal"),
            strtoupper("Kembar 2"),
            strtoupper("Kembar 3"),
            strtoupper("Kembar 4"),
            strtoupper("Lainnya"),
        );
    }
}

if (!function_exists('penolong_kelahiran')) {
    function penolong_kelahiran()
    {
        return array(
            strtoupper("Dokter"),
            strtoupper("Bidan/Perawat"),
            strtoupper("Dukun"),
            strtoupper("Lainnya"),
        );
    }
}

if (!function_exists('sebab_kematian')) {
    function sebab_kematian()
    {
        return array(
            strtoupper("Sakit Biasa / Tua"),
            strtoupper("Wabah Penyakit"),
            strtoupper("Kecelakaan"),
            strtoupper("Kriminalitas"),
            strtoupper("Bunuh Diri"),
            strtoupper("Lainnya"),
        );
    }
}

if (!function_exists('yang_menerangkan')) {
    function yang_menerangkan()
    {
        return array(
            strtoupper("Dokter"),
            strtoupper("Tenaga Kesehatan"),
            strtoupper("Kepolisian"),
            strtoupper("Lainnya"),
        );
    }
}

if (!function_exists('hubungan_keluarga')) {
    function hubungan_keluarga()
    {
        return array(
            strtoupper("Kepala Keluarga"),
            strtoupper("Suami"),
            strtoupper("Istri"),
            strtoupper("Anak"),
            strtoupper("Menantu"),
            strtoupper("Cucu"),
            strtoupper("Orang tua"),
            strtoupper("Mertua"),
            strtoupper("Family Lain"),
            strtoupper("Pembantu"),
            strtoupper("Lainnya"),
        );
    }
}

if (!function_exists('alasan_pindah')) {
    function alasan_pindah()
    {
        return array(
            ("Pekerjaan"),
            ("Pendidikan"),
            ("Keamanan"),
            ("Kesehatan"),
            ("Perumahan"),
            ("Keluarga"),
            ("Lainnya"),
        );
    }
}

if (!function_exists('jenis_kepindahan')) {
    function jenis_kepindahan()
    {
        return array(
            ("Kepala Keluarga"),
            ("Kepala Keluarga dan Seluruh Anggota Keluarga"),
            ("Kepala Keluarga dan Sebagian Anggota Keluarga"),
            ("Anggota Keluarga"),            
        );
    }
}

if (!function_exists('status_kk')) {
    function status_kk()
    {
        return array(
            ("Numpang KK"),
            ("Membuat KK Baru"),
            ("Nomor KK Tetap"),            
        );
    }
}

if (!function_exists('SHDK')) {
    function SHDK()
    {
        return array(
            ("Kepala Keluarga"),
            ("Suami"),
            ("Istri"),            
            ("Anak"),            
            ("Menantu"),            
            ("Cucu"),            
            ("Orang Tua"),            
            ("Mertua"),            
            ("Famili Lain"),            
            ("Pembantu"),            
            ("Lainnya"),            
        );
    }
}