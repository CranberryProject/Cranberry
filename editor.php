<?php
// define
require_once $_SERVER['DOCUMENT_ROOT'].'/asset/function.php';
?>
<html>
    <!-- header load -->
    <head>
        <?php include_once PATH.'/asset/head_base.php'; ?>
        <?php include_once PATH.'/asset/head_editor.php'; ?>
    </head>

    <body>
        <!-- navbar load -->
        <?php include_once PATH.'/asset/navbar.php'; ?>
            <!-- filename bar -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="input-group filebar" action="get.php" method="post">
                        <input type="text" class="form-control" placeholder="<?= EDITOR_FILENAME; ?>"> <span class="input-group-addon">.md</span>
                        <div class="input-group-btn">
                            <button class="btn btn-success">
                                <?= EDITOR_SAVE; ?>
                            </button>
                            <button class="btn btn-danger">
                                <?= EDITOR_DISCARD; ?>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- editor -->
                    <div id='editor'>
                        <textarea id='input' v-model='input' debounce='100'></textarea>
                        <div id='output' v-html='input | marked'></div>
                    </div>
                </div>
            </div>
    </body>
</html>