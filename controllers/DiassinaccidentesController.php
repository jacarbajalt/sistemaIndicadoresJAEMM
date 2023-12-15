<?php

namespace app\controllers;

use app\models\Diassinaccidentes;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiassinaccidentesController implements the CRUD actions for Diassinaccidentes model.
 */
class DiassinaccidentesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Diassinaccidentes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Diassinaccidentes::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'accidentes_idAccidente' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diassinaccidentes model.
     * @param int $accidentes_idAccidente Accidentes Id Accidente
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($accidentes_idAccidente)
    {
        return $this->render('view', [
            'model' => $this->findModel($accidentes_idAccidente),
        ]);
    }

    /**
     * Creates a new Diassinaccidentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diassinaccidentes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'accidentes_idAccidente' => $model->accidentes_idAccidente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Diassinaccidentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $accidentes_idAccidente Accidentes Id Accidente
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($accidentes_idAccidente)
    {
        $model = $this->findModel($accidentes_idAccidente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'accidentes_idAccidente' => $model->accidentes_idAccidente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Diassinaccidentes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $accidentes_idAccidente Accidentes Id Accidente
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($accidentes_idAccidente)
    {
        $this->findModel($accidentes_idAccidente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Diassinaccidentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $accidentes_idAccidente Accidentes Id Accidente
     * @return Diassinaccidentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($accidentes_idAccidente)
    {
        if (($model = Diassinaccidentes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
