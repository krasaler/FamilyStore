<?php
for ($i = 0; $i < count($data); $i += 4) {
    echo '<div class="row">';
    for ($j = $i; $j < ($i + 4) & $j < count($data); $j++) {
        ?>
       <div class="col-md-3 text-center">
            <div class="img text-center">
                <img src= <?= $data[$j]->ImagePath; ?>>
            </div></br>
            <div>
                <a href=/Product/detail?tovarId=<?php echo$data[$j]->Id ?> >  <?= $data[$j]->name?></a>
                <div class="row">
                    <p> <?= $data[$j]->price?> грн. </p>
                    <button class="btn btn-primary btn-md" onclick=sendClick( <?=$data[$j]->Id?>)>Добавить в корзину</button>
                </div>
            </div>
       </div>
        <?php  }?>
</div>

<?php }
?>
</div>


<ul class="pagination  pagination-lg" style="align: center;">
    <?php
    for ($i = 1; $i < $data->totalPage; $i++) {
        echo '<li> <a href=/catalog?p=' . $i . '>' . $i . '</a></li>';
    }
    ?>
</ul>
