<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StockSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]);

    $request = Yii::$app->request;
    $product_id = $request->get('product_id');

    $clr = array();
    $sz = array();
    $clr['null'] = '';
    $sz['null'] = '';

    if ($product_id<=0)
        $product_id = $model->product_id;

    if ($product_id>0) {
        $model->product_id = $product_id;
        $colors = (new \yii\db\Query())
            ->select(['color'])
            ->from('stock')
            ->where('product_id = ' . $product_id)
            ->distinct()
            ->all();
        $sizes = (new \yii\db\Query())
            ->select(['size'])
            ->from('stock')
            ->where('product_id = ' . $product_id)
            ->distinct()
            ->all();
        foreach ($colors as $color)
            $clr[$color['color']] = $color['color'];
        foreach ($sizes as $size)
            $sz[$size['size']] = $size['size'];
    }

    ?>

    <?= $form->field($model, 'product_id')->hiddenInput(array($product_id=>$product_id))->label(false) ?>

    <?= $form->field($model, 'size')->dropDownList($sz) ?>

    <?= $form->field($model, 'color')->dropDownList($clr) ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
