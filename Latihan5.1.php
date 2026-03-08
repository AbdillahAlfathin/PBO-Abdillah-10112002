<?php
$nilai = 105;

if ($nilai >= 100){
    echo "Nilai tidak masuk akal";
} else
    if ($nilai >= 60){
        echo "Lulus";}
else
    if ($nilai < 60){
    echo "Tidak Lulus";
}else
    if ($nilai < 0){
    echo "Nilai tidak valid";}
?>