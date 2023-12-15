<?php

namespace app\controllers;

use Yii;
use app\models\Accidentes;
use app\models\AccidentesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
/**
 * AccidentesController implements the CRUD actions for Accidentes model.
 */
class AccidentesController extends Controller
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
     * Lists all Accidentes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccidentesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Accidentes model.
     * @param int $idAccidente Id Accidente
     * @param int $areas_idArea Areas Id Area
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idAccidente, $areas_idArea)
    {
        return $this->render('view', [
            'model' => $this->findModel($idAccidente, $areas_idArea),
        ]);
    }

    /**
     * Creates a new Accidentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Accidentes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->fechaYhora = new Expression('NOW()');
                if($model->save()){
                    return $this->redirect(['view', 'idAccidente' => $model->idAccidente, 'areas_idArea' => $model->areas_idArea]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Accidentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idAccidente Id Accidente
     * @param int $areas_idArea Areas Id Area
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idAccidente, $areas_idArea)
    {
        $model = $this->findModel($idAccidente, $areas_idArea);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->fechaYhora = new Expression('NOW()');
                if($model->save()){
                    return $this->redirect(['view', 'idAccidente' => $model->idAccidente, 'areas_idArea' => $model->areas_idArea]);
                }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Accidentes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idAccidente Id Accidente
     * @param int $areas_idArea Areas Id Area
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idAccidente, $areas_idArea)
    {
        $this->findModel($idAccidente, $areas_idArea)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Accidentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idAccidente Id Accidente
     * @param int $areas_idArea Areas Id Area
     * @return Accidentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idAccidente, $areas_idArea)
    {
        if (($model = Accidentes::findOne(['idAccidente' => $idAccidente, 'areas_idArea' => $areas_idArea])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionContador()
    {
        $searchModel = new AccidentesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('contador', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
