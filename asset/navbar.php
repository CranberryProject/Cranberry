<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"></a>
            <p class="navbar-text"><?= NAV_MOTD; ?></p>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= NAV_LANGUAGE; ?>🌎 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php
                            foreach (glob(PATH.'/asset/l18n/{*.php}', GLOB_BRACE) as $file) {
                                if (is_file($file)) {
                                    include $file;

                                    $url = $_SERVER['REQUEST_URI'];
                                    if (strpos($url, '?') !== false) {
                                        $url = preg_replace("/\?.*=.*/", '', $url);
                                    }

                                    echo '<li>';
                                    echo '<a href="'.$url.'?p='.$page.'&l='.basename($file, '.php').'">';
                                    echo $LANGUAGE;
                                    echo '</a>';
                                    echo '</li>';
                                }
                            }
                        ?>
                    </ul>
                </li>
            </ul>

            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="<?= NAV_SEARCH; ?>">
                </div>
                <button type="submit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>
            </form>
        </div>
    </div>
</nav>
