<?php

namespace app\controllers;

use app\models\Gasnatural;
use app\models\GasnaturalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GasnaturalController implements the CRUD actions for Gasnatural model.
 */
class GasnaturalController extends Controller
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
     * Lists all Gasnatural models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GasnaturalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gasnatural model.
     * @param int $idGasNatural Id Gas Natural
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idGasNatural)
    {
        return $this->render('view', [
            'model' => $this->findModel($idGasNatural),
        ]);
    }

    /**
     * Creates a new Gasnatural model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gasnatural();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idGasNatural' => $model->idGasNatural]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Gasnatural model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idGasNatural Id Gas Natural
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idGasNatural)
    {
        $model = $this->findModel($idGasNatural);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idGasNatural' => $model->idGasNatural]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Gasnatural model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idGasNatural Id Gas Natural
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idGasNatural)
    {
        $this->findModel($idGasNatural)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gasnatural model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idGasNatural Id Gas Natural
     * @return Gasnatural the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idGasNatural)
    {
        if (($model = Gasnatural::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
