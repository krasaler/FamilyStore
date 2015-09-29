<table class="table table-bordered" id="review">
    <tr>
        <th>Имя пользователя</th>
        <th>Коментарий</th>
    </tr>
    <?php
    $reviewdata = ReviewHelper::PopulateReviewViewModelList(ReviewService::GetByProductId($data->Id));
    if(isset($reviewdata))
    {
    foreach ($reviewdata as $review) {
        ?>
        <tr>
            <td style="width: 150px"><?php echo $review->account->name; ?></td>
            <td><?php echo $review->value; ?></td>
        </tr>
    <?php } }?>
</table>
<form class=form-inline">
    <div class="form-group" style="vertical-align: middle">
        <div class="col-lg-10">
            <input id="reviewText" type="text" placeholder="Ваш коментарий" style="width: 100%;">
        </div>
        <div class="col-lg-2">
            <input type="button" onclick="newReview(this,<?php echo $data->Id?>)" value="Отправить" style="width: 100%;" class="btn btn-primary btn-md">
        </div>
    </div>
</form>