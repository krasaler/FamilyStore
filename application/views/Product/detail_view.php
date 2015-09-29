<?php require_once __ROOT__ . '/application/Helper/ReviewHelper.php';
require_once __ROOT__ . '/application/Service/ReviewService.php';?>
<h3 class="text-center h3"><?php echo $data->name; ?></h3>
<div class="row">
    <div  class="col-md-3 text-center">
        <div class="img">
        <img src="<?php echo $data->ImagePath ?>">
        </div>
    </div>
    <div  class="col-md-2 text-left">
        <button class="btn btn-primary btn-md" onclick="addBasket(<?php echo $data->Id; ?>)"> Купить</button>
        <h2 class="h2"><p>Цена</p></h2>
        <h2 class="h2"><?php echo $data->price; ?> грн.</h2>
    </div>
</div>


<ul class="nav nav-tabs" role="tablist"  style="margin-top: 10px;">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Описание</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Характеристики</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Отзывы</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content" style="margin-top: 10px;">
    <div role="tabpanel" class="tab-pane active" id="home"><?php echo $data->description;?></div>
    <div role="tabpanel" class="tab-pane " id="profile">
        <table class="table table-bordered">
            <?php
            if(!is_null($data->attributesFloat)) {
                foreach ($data->attributesFloat as $attributes) {
                    echo '<tr>
                <td style="width: 200px">' . $attributes->attribute->name . '</td><td>' .
                        $attributes->value . ' ' . $attributes->attribute->unit . '</td>
            </tr>';
                }
            }
            ?>
            <?php
            if(!is_null($data->attributesList)) {
                foreach ($data->attributesList as $attributes) {
                    echo '<tr>
                <td style="width: 200px">' . $attributes->attribute->name . '</td><td>' .
                        $attributes->value . ' ' . $attributes->attribute->unit . '</td>
            </tr>';
                }
            }
            ?>
        </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
        <?php include 'application/views/Product/review_view.php'; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
</div>


