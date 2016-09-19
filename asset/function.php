<?php
define('PATH', $_SERVER['DOCUMENT_ROOT']);
define('ERROR_PATH_404', PATH . '/content/404.md');
define('CONTENT_MENU', PATH . '/content/menu.md');

$motd_file = file(PATH . "/asset/motd.txt");
srand(time());
shuffle($motd_file);
define('NAV_MOTD', $motd_file[0], true);

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = "index";
}

if (isset($_GET['l'])) {
    $language = $_GET['l'];
} else {
    $language = "ja";
}

require_once(PATH . '/asset/parsedown.php');
require_once(PATH . '/asset/l18n/' . $language . '.php');


function mdConvert($mdname)
{
    $parsedown = new Parsedown();
    if (file_exists(PATH . '/content/' . basename($mdname) . '.md')) {
        $mdstr = file_get_contents(PATH . '/content/' . basename($mdname) . '.md');
    } else {
        $mdstr = file_get_contents(ERROR_PATH_404);
    }

    $mdhtml = $parsedown->text($mdstr);

    return $mdhtml;
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}