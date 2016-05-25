<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form=ActiveForm::begin()?>

<?= $form->field($model,'ad') ?>
<?= $form->field($model,'soyad') ?>
<?= $form->field($model,'eposta') ?>
<?= Html::submitButton('Kaydet',['class'=>'btn btn-default']) ?>


<?php $form=ActiveForm::end()?>