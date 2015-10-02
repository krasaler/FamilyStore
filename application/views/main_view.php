<div class="text-center" style="height: 500px;">
    <h2>Приобретайте товары в нашем магазине</h2>


    <?php
    $sections = $GLOBALS['sections'];
    for ($i = 0; $i < count($sections); $i += 3) { ?>
        <div class="row">
            <div class="col-lg-4">
                <ul>
                    <h3><?= $sections[$i]->name ?></h3>
                    <?php
                    for ($j = 0; $j < count($sections[$i]->catalogues); $j++) { ?>
                        <li style="list-style-type: none;">
                            <a href="/Product/Index?c=<?= $sections[$i]->catalogues[$j]->name ?>">
                                <?= $sections[$i]->catalogues[$j]->name ?></a>
                        </li>

                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul>
                    <h3><?= $sections[$i + 1]->name ?></h3>
                    <?php
                    for ($j = 0; $j < count($sections[$i + 1]->catalogues); $j++) { ?>
                        <li style="list-style-type: none;">
                            <a href="/Product/Index?c=<?= $sections[$i + 1]->catalogues[$j]->name ?>">
                                <?= $sections[$i + 1]->catalogues[$j]->name ?></a>
                        </li>

                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul>
                    <h3><?= $sections[$i + 2]->name ?></h3>
                    <?php
                    for ($j = 0; $j < count($sections[$i + 2]->catalogues); $j++) { ?>
                        <li style="list-style-type: none;">
                            <a href="/Product/Index?c=<?= $sections[$i + 2]->catalogues[$j]->name ?>">
                                <?= $sections[$i + 2]->catalogues[$j]->name ?></a>
                        </li>

                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php
    }
    ?>

</div>