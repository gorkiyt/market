<?php

namespace frontend\modules\admin\controllers;

use Yii;
use frontend\modules\admin\models\Market;
use frontend\modules\admin\models\MarketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\models\user;
use yii\web\ForbiddenHttpException;
/**
 * MarketController implements the CRUD actions for Market model.
 */
class MarketController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Market models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MarketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Market model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Market model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*
    public function actionCreate()
    {
        $model = new Market();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin'))
        {
        $model = new Market();
        if ($model->load(Yii::$app->request->post())) {
            $upload_file = $model->uploadFile();
            var_dump($model->validate());
            if ($model->validate()) {   
                if($model->save()) {
                    if ($upload_file !== false) {
                        $path = $model->getUploadedFile();
                        $upload_file->saveAs($path);
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    else throw new ForbiddenHttpException('Ürünleri yaratmaya yetkiniz yoktur.');
    }

    /**
     * Updates an existing Market model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin'))
        {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    else throw new ForbiddenHttpException('Ürünleri güncellemmeye yetkiniz yoktur.');
    }

    /**
     * Deletes an existing Market model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Market model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Market the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Market::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
