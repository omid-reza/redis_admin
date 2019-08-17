<?php use language\language; ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo language::get_string('Keys List'); ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/keys.css">
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
        <script type="text/javascript" src="assets/vue.js"></script>
    </head>
    <body>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                  <?php echo $_GET['error']; ?>
            </div>
        <?php
        }
        if (isset($_GET['message'])) {
            ?>
            <div class="alert alert-success" role="alert">
                  <?php echo $_GET['message']; ?>
            </div>
        <?php
        }
            use config\config;
            $config = new config();
            if (!isset($_GET['server'])) {
                ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <div class="alert alert-danger" role="alert">
                      Please set server_id in header !
                    </div>
                </div>
            <?php
            } elseif (is_string($client = $config->connect($_GET['server']))) {
                ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $client ?>
                    </div>
                </div>
            <?php
            } else {
                $server_id = $_GET['server'];
                $key_count = $client->dbsize(); ?>
                <div class="container jumbotron PartTwo">
                    <div class="PartThree">
                        <div class="PartFour">
                            <a href="../insertForm?server=<?php echo $_GET['server']; ?>" class="btn btn-success PartFive">
                                <?php echo language::get_string('Insert'); ?>
                            </a>
                        <a href="../" class="btn btn-warning PartFive partEight">
                            <?php echo language::get_string('Server Lists'); ?>
                        </a>
                        <a href="../searchForm?server=<?php echo $_GET['server']; ?>" class="btn btn-primary PartFive partEight">   <?php echo language::get_string('Search'); ?>
                        </a>

                        </div>
                    </div>    
                    <div class="alert alert-primary partNine" role="alert">
                            <div><?php echo $config->getHost($server_id).':'.$config->getPort($server_id); ?></div>
                            <div><?php echo language::get_string('Keys Count').' : '.$key_count; ?></div>
                            <div><?php echo language::get_string('DataBase').' : '.$config->getDatabase($server_id); ?></div>
                    </div>
                    <div class="alert alert-dark PartSix" role="alert">
                        <?php echo language::get_string('Keys'); ?>
                    </div>
                <?php
                $pagedArray = array_chunk($client->keys('*'), 10, true);
                $page = 1;

                if (isset($_GET['page']))
                    $page = (int) $_GET['page'];

                foreach ($pagedArray[$page - 1] as $key => $value) {
                    ?>
                    <a class="PartSeven" href="show?key=<?php echo $value; ?>&server=<?php echo $_GET['server']; ?>">
                        <div class="alert alert-success PartSix" role="alert">
                                <?php echo $value; ?>
                        </div>
                    </a>
            <?php } } ?>
            </div>
            <?php if ($key_count > 10) { ?>
                <nav aria-label="Pages">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if ($page == 1) {
                    echo'disabled';
                } ?>">
                            <a class="page-link" href="<?php echo '?server='.$server_id.'&page='.($page - 1); ?>" tabindex="-1">Previous</a>
                        </li>    
                        <?php
                        $page_count = $key_count / 10;
                        if ($page_count % 10 != 0)
                            $page_count++;
                for ($i = 1; $i < $page_count; $i++) {
                    ?>
                    <li class="page-item <?php if ($page == $i) {
                        echo 'active';
                    } ?>">
                                <a class="page-link" href="<?php echo '?server='.$server_id.'&page='.$i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php
                } ?>
                        <li class="page-item <?php if ($page == count($pagedArray)) {
                    echo'disabled';
                } ?>">
                            <a class="page-link" href="<?php echo '?server='.$server_id.'&page='.($page + 1); ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>  
    </body>
</html>