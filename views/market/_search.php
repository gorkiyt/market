<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MarketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="market-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'barkod_no') ?>

    <?= $form->field($model, 'urun_adi') ?>

    <?= $form->field($model, 'urun_kategori') ?>
    
    <?= $form->field($model, 'urun_adet') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
