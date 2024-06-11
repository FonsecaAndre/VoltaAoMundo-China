<?php
echo "<h3>Testando HASH</h3>";
$senha = "123456";

$md5_hash = md5($senha);
echo "$md5_hash <br>";

$sha1_hash = sha1($senha);
echo "$sha1_hash <br>";

$sha256_hash = hash("sha256", $senha);
echo "$sha256_hash <br>";

?>