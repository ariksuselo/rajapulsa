<?php
$u=$_GET[up];
//$a=25;
$ups=$u+$a;
$grup=$_GET[grup];
$level=$_GET[level];

$curlHandle = curl_init();
$url="https://rajapulsa.co.id/harga.php?type=js&level=$level&up=$ups&grup=$grup";
curl_setopt($curlHandle, CURLOPT_URL,$url);
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,5);
$hasil = curl_exec($curlHandle);

$hasil = str_replace(".tableheader{margin: 10px auto;padding: 3px;border: 1px solid #acc6fb;background-color: #f5f5f5;margin-bottom: 20px;}", '', $hasil);
$hasil = str_replace("');\ndocument.write('", '', $hasil);
$hasil = str_replace("');document.write('", '', $hasil);
$hasil = str_replace("Stok Kosong", 'Kosong', $hasil);
$hasil = str_replace("Gangguan", 'Trouble', $hasil);
$hasil = str_replace(' class="center"', '', $hasil);

curl_close($curlHandle);
echo $hasil;

?>
