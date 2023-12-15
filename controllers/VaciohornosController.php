<?php

namespace app\controllers;

use app\models\Vaciohornos;
use app\models\VaciohornosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VaciohornosController implements the CRUD actions for Vaciohornos model.
 */
class VaciohornosController extends Controller
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
     * Lists all Vaciohornos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VaciohornosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vaciohornos model.
     * @param int $idvacioHornos Idvacio Hornos
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idvacioHornos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idvacioHornos),
        ]);
    }

    /**
     * Creates a new Vaciohornos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vaciohornos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idvacioHornos' => $model->idvacioHornos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vaciohornos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idvacioHornos Idvacio Hornos
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idvacioHornos)
    {
        $model = $this->findModel($idvacioHornos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idvacioHornos' => $model->idvacioHornos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vaciohornos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idvacioHornos Idvacio Hornos
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idvacioHornos)
    {
        $this->findModel($idvacioHornos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vaciohornos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idvacioHornos Idvacio Hornos
     * @return Vaciohornos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idvacioHornos)
    {
        if (($model = Vaciohornos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
