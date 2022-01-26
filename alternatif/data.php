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
            $query_kriteria = "SELECT * FROM kriteria";
            $query_result = $connect->query($query_kriteria);
            while ($kriteria = $query_result->fetch_array(MYSQLI_ASSOC)) {
                $result_kriteria = [
                    'kode_kriteria' => $kriteria['kode_kriteria']
                ];
                $kode_kriteria = $kriteria['kode_kriteria'];
                $query_nilai = "SELECT * FROM biodata JOIN subkriteria ON id_subkriteria=kode_subkriteria WHERE id_mahasiswa='$id' AND id_kriteria='$kode_kriteria'";
                $query_result_nilai = $connect->query($query_nilai);
                $data_nilai = $query_result_nilai->fetch_array(MYSQLI_ASSOC);
                $result_kriteria['bobot_subkriteria'] = $data_nilai['bobot_subkriteria'];
                $result_kriteria['nama_subkriteria'] = $data_nilai['nama_subkriteria'];
                $data_kriteria[] = $result_kriteria;
            }
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
