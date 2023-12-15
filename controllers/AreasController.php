<?php

namespace app\controllers;

use app\models\Areas;
use app\models\AreaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AreasController implements the CRUD actions for Areas model.
 */
class AreasController extends Controller
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
     * Lists all Areas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AreaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Areas model.
     * @param int $idArea Id Area
     * @param int $usuarios_idUsuario Usuarios Id Usuario
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idArea, $usuarios_idUsuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($idArea, $usuarios_idUsuario),
        ]);
    }

    /**
     * Creates a new Areas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Areas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idArea' => $model->idArea, 'usuarios_idUsuario' => $model->usuarios_idUsuario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Areas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idArea Id Area
     * @param int $usuarios_idUsuario Usuarios Id Usuario
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idArea, $usuarios_idUsuario)
    {
        $model = $this->findModel($idArea, $usuarios_idUsuario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idArea' => $model->idArea, 'usuarios_idUsuario' => $model->usuarios_idUsuario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Areas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idArea Id Area
     * @param int $usuarios_idUsuario Usuarios Id Usuario
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idArea, $usuarios_idUsuario)
    {
        $this->findModel($idArea, $usuarios_idUsuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Areas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idArea Id Area
     * @param int $usuarios_idUsuario Usuarios Id Usuario
     * @return Areas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idArea, $usuarios_idUsuario)
    {
        if (($model = Areas::findOne(['idArea' => $idArea, 'usuarios_idUsuario' => $usuarios_idUsuario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
