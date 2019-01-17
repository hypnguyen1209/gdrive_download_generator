<?php 
function get_redirect_target($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $headers = curl_exec($ch);
    curl_close($ch);
    if (preg_match('/^Location: (.+)$/im', $headers, $matches))
    return trim($matches[1]);
    return $url;
}
$u = $_GET['id'];
$get = "https://drive.google.com/uc?export=download&id=$u";
$r = get_redirect_target($get);
header("Location: $r");