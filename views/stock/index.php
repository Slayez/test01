<?php

use app\models\Stock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\StockSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;


$request = Yii::$app->request;
$product_id = $request->get('product_id');

if ($product_id>0) {
    $dataProvider->query->andWhere('product_id = ' . $product_id);
}

?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Create Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'price',
            'size',
            'color',

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
