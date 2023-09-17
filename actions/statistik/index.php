<?php 

$conn   = conn();
$db     = new Database($conn);

$tamu  = $db->exists('tamu');
$keperluan  = $db->exists('keperluan');


return compact('tamu', 'keperluan');


?>