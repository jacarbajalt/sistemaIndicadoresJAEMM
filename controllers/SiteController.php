<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Usuarios;
use yii\web\Session;
use yii\db\Expression;
use app\models\Reportes;
use app\models\Configtiempo;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'user', 'Administrador' ],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'Administrador', 'usuarios'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isAdmin(Yii::$app->user->identity->idUsuario);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                     'actions' => ['logout', 'Supervisor', 'accidentes'],
                       //Esta propiedad establece que tiene permisos
                     'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
                     'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
                     'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
                      return User::isSupervisor(Yii::$app->user->identity->idUsuario);
                  },
              ],

              [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                 'actions' => ['logout', 'site'],
                       //Esta propiedad establece que tiene permisos
                 'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
                 'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
                 'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
                  return User::isVisitante(Yii::$app->user->identity->idUsuario);
              },
          ],
          [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
             'actions' => ['logout', 'site'],
                       //Esta propiedad establece que tiene permisos
             'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
             'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
             'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
              return User::isActivo(Yii::$app->user->identity->estado);
          },
      ],
  ],
],
     //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
     //sólo se puede acceder a través del método post
'verbs' => [
    'class' => VerbFilter::className(),
    'actions' => [
        'logout' => ['post'],
    ],
],
];
}

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if(!\Yii::$app->user->isGuest){
            if(User::isActivo(Yii::$app->user->identity->idUsuario)){
             if(User::isAdmin(Yii::$app->user->identity->idUsuario)){
                return $this->redirect(['site/index']);
            }else{
                return $this->redirect(['site/index']);
            } 
        }else{
            return $this->redirect(['site/index']);
        }
    }

        /*if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }*/

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(User::isActivo(Yii::$app->user->identity->idUsuario)){
                if(User::isAdmin(Yii::$app->user->identity->idUsuario)){
                    return $this->redirect(['site/index']);
                }else{
                    return $this->redirect(['site/index']);
                }
            }else{
                return $this->redirect(['site/index']);
            }
        }else{
            return $this->render('login', [
                'model' => $model,
            ]);
        }

        //$model->password = '';
        
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    private function randKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $model=new Reportes();
        if($model->load(Yii::$app->request->post())){
            $sql=Reportes::find()->where('mesCalidad=:mesCalidad', [':mesCalidad'=>$model->mesCalidad]);
            if($sql->count()==1){
                if($model->save()){
                    return $this->redirect(['about', 'mesCalidad'=>$model->mesCalidad]);
                }
            }
        }else{
            $model->getErrors();
        }
        return $this->render('about');
    }
    public function actionRecuperar(){
        $model = new Usuarios();
        $msg = null;
        if($model->load(Yii::$app->request->post())){
            $sql=Usuarios::find()->where("correo=:email", [":email" => $model->correo]);
            if($sql->count()==1){
                $session = new Session;
                $session->open();
                $session["recover"] = $this->randKey("abcdef0123456789", 200);
                $recover = $session["recover"];
                $sql = Usuarios::find()->where("correo=:email", [":email" => $model->correo])->one();
                $session["id_recover"] = $sql->idUsuario;
                $codigoVerificacion = $this->randKey("abcdef0123456789", 8);
                $sql->codigoVerificacion = $codigoVerificacion;
                $sql->save();
                $subject = "Recuperar contraseña";
                 $body = "<p>Copie el siguiente código de verificación para restablecer su password ... ";
                 $body = "<strong>".$codigoVerificacion."</strong></p>";
                 $body .= "<p><a href='http://indvit.des/index.php?r=site%2Fresetear'>Recuperar Contraseña</a></p>";
                 Yii::$app->mailer->compose()
                 ->setTo($model->correo)
                 ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
                 ->setSubject($subject)
                 ->setHtmlBody($body)
                 ->send();
                 $model->correo = null;
                 $msg = "<div class='alert alert-success' role='alert'>
                 Le hemos enviado un mensaje a su cuenta de correo para que pueda resetear su contraseña
                 </div>";
            }else{
                $msg = "<div class='alert alert-danger' role='alert'>
                    Ha ocurrido un error
                    </div>";
            }
        }else{
            $model->getErrors();
        }
         return $this->render("recuperar", ["model" => $model, "msg" => $msg]);
    }
    public function actionResetear(){
        $model = new Usuarios();
        $msg = null;
        $session = new Session;
        $session->open();
        if (empty($session["recover"]) || empty($session["id_recover"])){
            return $this->redirect(["site/index"]);
        }else{
            $recover = $session["recover"];
            $model->recover = $recover;
            $id_recover = $session["id_recover"];
        }
        if($model->load(Yii::$app->request->post())){
            $sql=Usuarios::find()->where("correo=:email", [":email" => $model->correo]);
            if($sql->count()==1){
                $sql = Usuarios::find()->where("correo=:email", [":email" => $model->correo])->one();
                if($sql->codigoVerificacion != $model->codigoVerificacion){
                    $sql->contrasena = sha1($model->contrasena);
                    $sql->save();
                    $session->destroy();
                    return $this->redirect(["site/login"]);
                }else{
                    $msg = "<div class='alert alert-danger' role='alert'>
                    Código de verificación incorrecto
                    </div>";
                }
            }else{
                $msg = "<div class='alert alert-danger' role='alert'>
                    Ha ocurrido un error
                    </div>";
            }
        }
        return $this->render("resetear", ["model" => $model, 'msg'=> $msg]);
    }
    public function actionTiempo(){
        $seg=null;
        $model=new Configtiempo();
            if($model->load(Yii::$app->request->post())){
              $seg=Configtiempo::find()->where('segundos=:segundos', [':segundos'=>$model->segundos]);
              if($seg->count()==1){
                $seg=Configtiempo::find()->where('segundos=:segundos', [':segundos'=>$model->segundos])->one();
                if($seg->save()){
                    return $this->redirect(['site/index', 'seg'=>$model->segundos]);
                    return $this->redirect(['accidentes/contador', 'seg'=>$model->segundos]);
                }
                
            }else{
                $model->getErrors();
            }
        }
        return $this->render('tiempo', ['model'=>$model], ['seg'=>$seg]);
    }
}