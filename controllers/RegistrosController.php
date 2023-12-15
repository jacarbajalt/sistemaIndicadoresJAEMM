<?php

namespace app\controllers;

use app\models\Registros;
use app\models\RegistrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistrosController implements the CRUD actions for Registros model.
 */
class RegistrosController extends Controller
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
     * Lists all Registros models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegistrosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Registros model.
     * @param int $idregistros Idregistros
     * @param int $usuarios_idUsuario Usuarios Id Usuario
     * @param int $gasNatural_idGasNatural Gas Natural Id Gas Natural
     * @param int $calidad_idcalidad Calidad Idcalidad
     * @param int $desperdicios_idDesperdicios Desperdicios Id Desperdicios
     * @param int $energiaElectrica_idEnergia Energia Electrica Id Energia
     * @param int $vacioHornos_idvacioHornos Vacio Hornos Idvacio Hornos
     * @param int $volumenProduccion_idVolumen Volumen Produccion Id Volumen
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idregistros, $usuarios_idUsuario, $gasNatural_idGasNatural, $calidad_idcalidad, $desperdicios_idDesperdicios, $energiaElectrica_idEnergia, $vacioHornos_idvacioHornos, $volumenProduccion_idVolumen)
    {
        return $this->render('view', [
            'model' => $this->findModel($idregistros, $usuarios_idUsuario, $gasNatural_idGasNatural, $calidad_idcalidad, $desperdicios_idDesperdicios, $energiaElectrica_idEnergia, $vacioHornos_idvacioHornos, $volumenProduccion_idVolumen),
        ]);
    }

    /**
     * Creates a new Registros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Registros();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idregistros' => $model->idregistros, 'usuarios_idUsuario' => $model->usuarios_idUsuario, 'gasNatural_idGasNatural' => $model->gasNatural_idGasNatural, 'calidad_idcalidad' => $model->calidad_idcalidad, 'desperdicios_idDesperdicios' => $model->desperdicios_idDesperdicios, 'energiaElectrica_idEnergia' => $model->energiaElectrica_idEnergia, 'vacioHornos_idvacioHornos' => $model->vacioHornos_idvacioHornos, 'volumenProduccion_idVolumen' => $model->volumenProduccion_idVolumen]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Registros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idregistros Idregistros
     * @param int $usuarios_idUsuario Usuarios Id Usuario
     * @param int $gasNatural_idGasNatural Gas Natural Id Gas Natural
     * @param int $calidad_idcalidad Calidad Idcalidad
     * @param int $desperdicios_idDesperdicios Desperdicios Id Desperdicios
     * @param int $energiaElectrica_idEnergia Energia Electrica Id Energia
     * @param int $vacioHornos_idvacioHornos Vacio Hornos Idvacio Hornos
     * @param int $volumenProduccion_idVolumen Volumen Produccion Id Volumen
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idregistros, $usuarios_idUsuario, $gasNatural_idGasNatural, $calidad_idcalidad, $desperdicios_idDesperdicios, $energiaElectrica_idEnergia, $vacioHornos_idvacioHornos, $volumenProduccion_idVolumen)
    {
        $model = $this->findModel($idregistros, $usuarios_idUsuario, $gasNatural_idGasNatural, $calidad_idcalidad, $desperdicios_idDesperdicios, $energiaElectrica_idEnergia, $vacioHornos_idvacioHornos, $volumenProduccion_idVolumen);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idregistros' => $model->idregistros, 'usuarios_idUsuario' => $model->usuarios_idUsuario, 'gasNatural_idGasNatural' => $model->gasNatural_idGasNatural, 'calidad_idcalidad' => $model->calidad_idcalidad, 'desperdicios_idDesperdicios' => $model->desperdicios_idDesperdicios, 'energiaElectrica_idEnergia' => $model->energiaElectrica_idEnergia, 'vacioHornos_idvacioHornos' => $model->vacioHornos_idvacioHornos, 'volumenProduccion_idVolumen' => $model->volumenProduccion_idVolumen]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Registros model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idregistros Idregistros
     * @param int $usuarios_idUsuario Usuarios Id Usuario
     * @param int $gasNatural_idGasNatural Gas Natural Id Gas Natural
     * @param int $calidad_idcalidad Calidad Idcalidad
     * @param int $desperdicios_idDesperdicios Desperdicios Id Desperdicios
     * @param int $energiaElectrica_idEnergia Energia Electrica Id Energia
     * @param int $vacioHornos_idvacioHornos Vacio Hornos Idvacio Hornos
     * @param int $volumenProduccion_idVolumen Volumen Produccion Id Volumen
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idregistros, $usuarios_idUsuario, $gasNatural_idGasNatural, $calidad_idcalidad, $desperdicios_idDesperdicios, $energiaElectrica_idEnergia, $vacioHornos_idvacioHornos, $volumenProduccion_idVolumen)
    {
        $this->findModel($idregistros, $usuarios_idUsuario, $gasNatural_idGasNatural, $calidad_idcalidad, $desperdicios_idDesperdicios, $energiaElectrica_idEnergia, $vacioHornos_idvacioHornos, $volumenProduccion_idVolumen)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Registros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idregistros Idregistros
     * @param int $usuarios_idUsuario Usuarios Id Usuario
     * @param int $gasNatural_idGasNatural Gas Natural Id Gas Natural
     * @param int $calidad_idcalidad Calidad Idcalidad
     * @param int $desperdicios_idDesperdicios Desperdicios Id Desperdicios
     * @param int $energiaElectrica_idEnergia Energia Electrica Id Energia
     * @param int $vacioHornos_idvacioHornos Vacio Hornos Idvacio Hornos
     * @param int $volumenProduccion_idVolumen Volumen Produccion Id Volumen
     * @return Registros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idregistros, $usuarios_idUsuario, $gasNatural_idGasNatural, $calidad_idcalidad, $desperdicios_idDesperdicios, $energiaElectrica_idEnergia, $vacioHornos_idvacioHornos, $volumenProduccion_idVolumen)
    {
        if (($model = Registros::findOne(['idregistros' => $idregistros, 'usuarios_idUsuario' => $usuarios_idUsuario, 'gasNatural_idGasNatural' => $gasNatural_idGasNatural, 'calidad_idcalidad' => $calidad_idcalidad, 'desperdicios_idDesperdicios' => $desperdicios_idDesperdicios, 'energiaElectrica_idEnergia' => $energiaElectrica_idEnergia, 'vacioHornos_idvacioHornos' => $vacioHornos_idvacioHornos, 'volumenProduccion_idVolumen' => $volumenProduccion_idVolumen])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
