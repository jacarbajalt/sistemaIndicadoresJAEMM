<?php

namespace app\controllers;

use app\models\Desperdicios;
use app\models\DesperdiciosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DesperdiciosController implements the CRUD actions for Desperdicios model.
 */
class DesperdiciosController extends Controller
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
     * Lists all Desperdicios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DesperdiciosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Desperdicios model.
     * @param int $idDesperdicios Id Desperdicios
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idDesperdicios)
    {
        return $this->render('view', [
            'model' => $this->findModel($idDesperdicios),
        ]);
    }

    /**
     * Creates a new Desperdicios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Desperdicios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idDesperdicios' => $model->idDesperdicios]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Desperdicios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idDesperdicios Id Desperdicios
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idDesperdicios)
    {
        $model = $this->findModel($idDesperdicios);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idDesperdicios' => $model->idDesperdicios]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Desperdicios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idDesperdicios Id Desperdicios
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idDesperdicios)
    {
        $this->findModel($idDesperdicios)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Desperdicios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idDesperdicios Id Desperdicios
     * @return Desperdicios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idDesperdicios)
    {
        if (($model = Desperdicios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
