<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Market */

$this->title = 'Güncelle ' ;
$this->params['breadcrumbs'][] = ['label' => 'Markets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->urun_adi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Güncelle';
?>
<div class="market-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('guncelle', [
        'model' => $model,
    ]) ?>

</div>
