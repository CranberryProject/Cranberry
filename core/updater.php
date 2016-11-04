<?php
    require_once 'function.php';
    $context = ['http' => ['method' => 'GET', 'header' => implode('\r\n', ['User-Agent: PHP'])]];
    if (!(filter_var($ini['RepositoryURL'], FILTER_VALIDATE_URL) && preg_match('@^https?+://@i', $ini['RepositoryURL']))) {
        throw new UnexpectedValueException('Invalid URL string: '.$ini['RepositoryURL']);
    }
    if (false === $response = @file_get_contents($ini['RepositoryURL'], false, stream_context_create($context))) {
        $error = error_get_last();
        throw new RuntimeException($error['message']);
    }
    if (empty($json = json_decode($response, true))) {
        throw new UnexpectedValueException('Invalid JSON data.');
    }
    $length = count($json);
    foreach ($json as $key => $value) {
        if ($value['prerelease'] === true && $ini['IncludePreRelease'] !== true) {
            continue;
        }
        if (version_compare($ini['Version'], $value['tag_name']) === -1) {
            if (false === $file = @file_get_contents($value['zipball_url'], false, stream_context_create($context))) {
                $error = error_get_last();
                throw new RuntimeException($error['message']);
            }
            break;
        }
        if ($key === $length - 1) {
            throw new RuntimeException('Updatable version not found.');
        }
    }

    $zip = new ZipArchive();
    $res = $zip->open($file);
    if ($res === true) {
        $zip->extractTo(INSTALL_DIR);
        $zip->close();
    }
