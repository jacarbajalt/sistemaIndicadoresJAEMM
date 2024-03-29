<?php

namespace app\controllers;

use app\models\Volumenproduccion;
use app\models\VolumenproduccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VolumenproduccionController implements the CRUD actions for Volumenproduccion model.
 */
class VolumenproduccionController extends Controller
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
     * Lists all Volumenproduccion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VolumenproduccionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Volumenproduccion model.
     * @param int $idVolumen Id Volumen
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idVolumen)
    {
        return $this->render('view', [
            'model' => $this->findModel($idVolumen),
        ]);
    }

    /**
     * Creates a new Volumenproduccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Volumenproduccion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idVolumen' => $model->idVolumen]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Volumenproduccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idVolumen Id Volumen
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idVolumen)
    {
        $model = $this->findModel($idVolumen);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idVolumen' => $model->idVolumen]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Volumenproduccion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idVolumen Id Volumen
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idVolumen)
    {
        $this->findModel($idVolumen)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Volumenproduccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idVolumen Id Volumen
     * @return Volumenproduccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idVolumen)
    {
        if (($model = Volumenproduccion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
