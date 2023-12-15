<?php

namespace app\controllers;

use app\models\Energiaelectrica;
use app\models\EnergiaelectricaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnergiaelectricaController implements the CRUD actions for Energiaelectrica model.
 */
class EnergiaelectricaController extends Controller
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
     * Lists all Energiaelectrica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnergiaelectricaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Energiaelectrica model.
     * @param int $idEnergia Id Energia
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idEnergia)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEnergia),
        ]);
    }

    /**
     * Creates a new Energiaelectrica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Energiaelectrica();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idEnergia' => $model->idEnergia]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Energiaelectrica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idEnergia Id Energia
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idEnergia)
    {
        $model = $this->findModel($idEnergia);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEnergia' => $model->idEnergia]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Energiaelectrica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idEnergia Id Energia
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idEnergia)
    {
        $this->findModel($idEnergia)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Energiaelectrica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idEnergia Id Energia
     * @return Energiaelectrica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEnergia)
    {
        if (($model = Energiaelectrica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
