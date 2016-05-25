<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\admin\models\market;
use frontend\modules\admin\models\urun;


/* @var $this yii\web\View */
/* @var $model frontend\models\Market */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="market-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>



    <?= $form->field($model, 'barkod_no')->textInput() ?>

    <?= $form->field($model, 'upload_file')->fileInput() ?>

    <?= $form->field($model, 'urun_adi')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'urun_adet')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Oluştur' : 'Güncelle', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
