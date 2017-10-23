<?php

function scan_php_files($root, $files = [], $ignore = ['.', '..', '.htaccess']) 
{
    $dir = scandir($root);
    foreach ($dir as $item) {
        $path = $root . DIRECTORY_SEPARATOR . $item;
        if (!in_array($item, $ignore)) {
			if (
				is_file($path) && 
				is_readable($path) && 
				preg_match('/\.php$/', $path)
			) {
                $files[] = $path;
            } elseif (is_dir($path) && is_readable($path)) {
                $files = scan_php_files($path, $files);
            }
        }
    }
    return $files;
}

function autoload()
{
	$files = scan_php_files('src');

	foreach ($files as $file) {
		require $file;
	}
}

autoload();
