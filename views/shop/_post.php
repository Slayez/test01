<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$rows = (new \yii\db\Query())
    ->select(['count(*)'])
    ->from('stock')
    ->where(['product_id' => $model->id])
    ->one();
$cnt = $rows['count(*)'];


?>
<?=
Html::a('
<div class="card post" style="width: 40rem;">
    <div class="card-body">
        <h5 class="card-title">'.Html::encode($model->product_name).'</h5>
        <p class="card-text">'.HtmlPurifier::process($model->desc).'</p>
        <p>В наличие: '.$cnt.'</p>
    </div>
</div>
<br>'
, ['stock/index', 'product_id' => $model->id])
?>