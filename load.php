<?php
function load_env() {
    $env = array();
    $file = fopen( '../.env', 'r');
    while (($line = fgets($file)) !== false) {
        $line = trim($line);
        list($name, $value) = explode('=', $line, 2);
        $env[$name] = $value;
    }
    fclose($file);
    return $env;
}
