<?php

$data = [
    ["nama"=>"Ani","nilai"=>80],
     ["nama"=>"Sinta","nilai"=>75],
      ["nama"=>"Rina","nilai"=>90],
];

echo "<table border='1'>";
echo "<tr><th>Nama</th><th>Nilai</th></tr>";

foreach($data as $d){
    echo "<tr>";
    echo "<td>".$d['nama']."</td>";
     echo "<td>".$d['nilai']."</td>";
     echo "</tr>";
}

echo "</table>";

?>