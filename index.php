<?php
// define
require_once $_SERVER['DOCUMENT_ROOT'].'/asset/function.php';
?>
<html>
    <!-- header load -->
    <head>
        <?php include_once PATH.'/asset/head_base.php'; ?>
    </head>

    <body>
        <!-- navbar load -->
        <?php include_once PATH.'/asset/navbar.php'; ?>

        <!-- sidemenu load -->
        <div class="md-menu col-lg-2 col-md-2">
            <?= mdConvert(CONTENT_MENU); ?>
        </div>

        <!-- content -->
        <div class="md-content panel panel-default col-lg-10  col-md-10">
            <div class="panel-header">
                <!-- page title -->
                <h1><?= h($page); ?></h1>

                <!-- pagemenu -->
                <ol class="breadcrumb">
                    <li class="active"><a href="/editor.php?p=<?= $page; ?>">Edit</a></li>
                    <li>Last Edited: <?= date('Y/m/d h:i:s a (T)', filemtime(PATH.'/content/'.basename($page).'.md')); ?></li>
                </ol>
            </div>
            <div class="panel-body">
                <!-- md convert -->
                <?= mdConvert(h($page)); ?>
            </div>

            <div class="panel-footer">
                <!-- will add any function -->
            </div>
        </div>

    </body>
</html>
