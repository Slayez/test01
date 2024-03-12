<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ShopSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="shop-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]);

    $colors = (new \yii\db\Query())
        ->select(['color'])
        ->from('stock')
        ->distinct()
        ->all();

    $sizes = (new \yii\db\Query())
        ->select(['size'])
        ->from('stock')
        ->distinct()
        ->all();

    $clr = array();
    $sz = array();
    $clr['null'] = '';
    $sz['null'] = '';

    foreach ($colors as $color)
        $clr[$color['color']]=$color['color'];
    foreach ($sizes as $size)
        $sz[$size['size']]=$size['size'];


    ?>

    <?= $form->field($model, 'color')->dropDownList($clr) ?>

    <?= $form->field($model, 'size')->dropDownList($sz) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
