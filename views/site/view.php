<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
echo DetailView::widget([
        'model' => $model,
        'attributes' => [
         'id','ad','soyad'
        ],

	]);

?>
