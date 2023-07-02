<?php 
// generate dynamic URL S
function asset($path)
{
    if (empty($path) || !is_string($path)) {
        return '';
    }

    $urlParts = parse_url($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
    $baseUrl = $urlParts['scheme'] . '://' . $urlParts['host'];

    $currentPath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    $assetPath = ltrim($path, '/');

    return $baseUrl . DIRECTORY_SEPARATOR . $currentPath . DIRECTORY_SEPARATOR . $assetPath;
}


