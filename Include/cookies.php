<?php
// Set caching headers
$expiration = 60 * 60 * 24 * 7; // 1 week (adjust as needed)
header("Cache-Control: public, max-age=$expiration");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expiration) . " GMT");
?>