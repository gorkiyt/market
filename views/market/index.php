<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MarketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Market ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Ürün Ekle', ['value'=>Url::to('index.php?r=admin/market/create'
        ),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

<?php
Modal::begin([
    'header'=>'<h4>Market<h4>',
     'id'=>'modal',
     'size'=>'modal-lg',
     ]);
     echo "<div id='modalContent'></div>";
     Modal::end();
     ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
           if($model->urun_adet < 10)
           {
            return['class'=>'danger'];
           }
          else   return['class'=>'success'];
         if(Yii::$app->user->can('urun-guncelle'))
{
     return[$model->urun_adet];
}
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'barkod_no',
            'urun_adi',
            'urun_kategori',
            'urun_adet',
             [
               'attribute' => 'img',
               'format' => 'html',
               'label' => 'Resim',
            'value' => function ($data) {
                            return Html::img(Yii::$app->request->BaseUrl . "/uploads/" . $data['filename'],
                ['width' => '60px']);
            },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
