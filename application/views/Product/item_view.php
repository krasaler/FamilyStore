<div>
    <form class="form-inline" action="/product/filter" method="post">
        <input type="hidden" class="form-control" name="c" value="<?= $_GET['c'] ?>">
        Цена
        <div class="form-group">
            <label class="control-label">от</label>
            <input type="text" class="form-control" name="beginPrice" value="<?= $_POST['beginPrice'] ?>">
        </div>
        <div class="form-group">
            <label class="control-label">до</label>
            <input type="text" class="form-control" name="endPrice" value="<?= $_POST['endPrice'] ?>">
        </div>
        <input type="submit" class="btn btn-default" name="send" value="Фильровать">
    </form>
</div>
<p></p>
<p></p>
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
