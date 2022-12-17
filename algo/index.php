<?php
$sentence = "Hey, vous êtes formidables. Je vous remercie pour tout!";
$s = preg_replace('/[^a-z0-9]+/i', '', $sentence);
echo $sentence.'<br>';
echo 'Résultat: '.strlen($s);
?>