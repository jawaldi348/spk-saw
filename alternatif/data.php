<?php
class Data
{
    public function data_mahasiswa()
    {
        require 'config/database.php';
        $data_mhs = [];
        $result = [];
        $query = "SELECT * FROM mahasiswa";
        $execute = $connect->query($query);
        while ($rows = $execute->fetch_array(MYSQLI_ASSOC)) {
            $id = $rows['kode_mhs'];
            $result = [
                'kode_mhs' => $rows['kode_mhs'],
                'nodaftar_mhs' => $rows['nodaftar_mhs'],
                'nama_mhs' => $rows['nama_mhs']
            ];
            $data_kriteria = [];
            $result_kriteria = [];
            $rangking = 0;
            $total_poin = 0;
            $query_kriteria = "SELECT * FROM kriteria";
            $query_result = $connect->query($query_kriteria);
            while ($kriteria = $query_result->fetch_array(MYSQLI_ASSOC)) {
                $result_kriteria = [
                    'kode_kriteria' => $kriteria['kode_kriteria'],
                    'bobot_kriteria' => $kriteria['bobot_kriteria']
                ];
                $kode_kriteria = $kriteria['kode_kriteria'];
                $query_nilai = "SELECT * FROM biodata JOIN subkriteria ON id_subkriteria=kode_subkriteria WHERE id_mahasiswa='$id' AND id_kriteria='$kode_kriteria'";
                $query_result_nilai = $connect->query($query_nilai);
                $data_nilai = $query_result_nilai->fetch_array(MYSQLI_ASSOC);
                $result_kriteria['bobot_subkriteria'] = $data_nilai['bobot_subkriteria'];
                $result_kriteria['nama_subkriteria'] = $data_nilai['nama_subkriteria'];
                // Normalisasi Kriteria
                if ($kode_kriteria == 'K3') :
                    $sql_normalisasi_kriteria = "select min(bobot_subkriteria) as min_kriteria from biodata join subkriteria on id_subkriteria=kode_subkriteria where id_kriteria='$kode_kriteria'";
                else :
                    $sql_normalisasi_kriteria = "select max(bobot_subkriteria) as max_kriteria from biodata join subkriteria on id_subkriteria=kode_subkriteria where id_kriteria='$kode_kriteria'";
                endif;
                $sql_result_normalisasi_kriteria = $connect->query($sql_normalisasi_kriteria);
                $data_normalisasi_kriteria = $sql_result_normalisasi_kriteria->fetch_array(MYSQLI_ASSOC);
                if ($kode_kriteria == 'K3') :
                    $normalisasi_kriteria = $data_normalisasi_kriteria['min_kriteria'] / $data_nilai['bobot_subkriteria'];
                else :
                    $normalisasi_kriteria = $data_nilai['bobot_subkriteria'] / $data_normalisasi_kriteria['max_kriteria'];
                endif;
                $total_poin = $total_poin + $data_nilai['bobot_subkriteria'];
                $jumlah_nilai = $kriteria['bobot_kriteria'] * $normalisasi_kriteria;
                $rangking = $rangking + $jumlah_nilai;
                $result_kriteria['normalisasi_kriteria'] = $normalisasi_kriteria;
                $result_kriteria['jumlah_nilai'] = number_format($jumlah_nilai, 2, '.', '');
                $data_kriteria[] = $result_kriteria;
            }
            $result['total_poin'] = number_format($total_poin, 2, '.', '');
            $result['total_nilai'] = number_format($rangking, 4, '.', '');
            // $result['persentase'] = number_format($rangking * 100, 0, '.', '');
            $result['persentase'] = (float)number_format($rangking * 100, 4);
            $result['kriteria'] = $data_kriteria;
            $data_mhs[] = $result;
        }
        $data_main_kriteria = [];
        $result_main_kriteria = [];
        $query_main_kriteria = "SELECT * FROM kriteria";
        $query_main_result = $connect->query($query_main_kriteria);
        while ($datakriteria = $query_main_result->fetch_array(MYSQLI_ASSOC)) {
            $result_main_kriteria = [
                'kode_kriteria' => $datakriteria['kode_kriteria'],
                'nama_kriteria' => $datakriteria['nama_kriteria']
            ];
            $data_main_kriteria[] = $result_main_kriteria;
        }
        $data = [
            'mahasiswa' => $data_mhs,
            'kriteria' => $data_main_kriteria
        ];
        return $data;
    }
}
// echo json_encode($data);
