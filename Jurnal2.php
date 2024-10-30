<?php
$array = ["apel" => 10000, "pisang" => 5000, "mangga" => 15000];

function cek ($buah, $data) {
    foreach ( $data as $namabuah => $harga) {
        if ($buah == $namabuah){
            return true;
        
        } else {
            return false;
        }
        }
    }
$buah = readline("Input nama buah :");
$stok = cek($buah, $data);
if ($stok === true) {
    $jumlah = readline("Masukkan jumlah buah :");
    $hargabuah = $data[$buah];
    $total = $jumlah*$hitung;
    echo $total;
} else {
    echo "Maaf," .$buah. "tidak ada dalam array";
}