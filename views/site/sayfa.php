<?php

use yii\helpers\Html;
?>
<?= Html::beginForm("?r=site/post");?>
<?= Html::textInput("isim"); ?>
<?= Html::submitButton("Kaydet");?>
<?= Html::endForm(); ?>
