<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $idUsuario
 * @property string $nombre
 * @property string $apPaterno
 * @property string|null $apMaterno
 * @property string $areaCargo
 * @property string $rol
 * @property string $correo
 * @property string|null $accessToken
 * @property string|null $authKey
 * @property string $username
 * @property string $contrasena
 * @property string $turno
 * @property string $estado
 * @property string $fechaYhora
 * @property string|null $codigoVerificacion
 * @property int|null $recover
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apPaterno', 'areaCargo', 'rol', 'correo', 'username', 'contrasena', 'turno', 'estado'], 'required'],
            [['rol', 'turno', 'estado'], 'string'],
            [['fechaYhora'], 'safe'],
            [['recover'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['apPaterno', 'areaCargo'], 'string', 'max' => 50],
            [['apMaterno', 'username', 'contrasena'], 'string', 'max' => 45],
            [['correo'], 'string', 'max' => 70],
            [['accessToken', 'authKey'], 'string', 'max' => 255],
            [['codigoVerificacion'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'apPaterno' => 'Ap Paterno',
            'apMaterno' => 'Ap Materno',
            'areaCargo' => 'Area Cargo',
            'rol' => 'Rol',
            'correo' => 'Correo',
            'accessToken' => 'Access Token',
            'authKey' => 'Auth Key',
            'username' => 'Username',
            'contrasena' => 'Contrasena',
            'turno' => 'Turno',
            'estado' => 'Estado',
            'fechaYhora' => 'Fecha Yhora',
            'codigoVerificacion' => 'Codigo Verificacion',
            'recover' => 'Recover',
        ];
    }
}
