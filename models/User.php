<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $tipo;
    public $codigoVerificacion;
    public $recover;
    

    public static function isAdmin($idUsuario){
        if (User::findOne(['idUsuario' => $idUsuario, 'rol' => 'Administrador'])){
            return true;
        }else{
            return false;
        }
    }

    public static function isSupervisor($idUsuario){
        if (User::findOne(['idUsuario' => $idUsuario, 'rol' => 'Supervisor'])){
            return true;
        }else{
            return false;
        }
    }

    public static function isVisitante($idUsuario){
        if (User::findOne(['idUsuario' => $idUsuario, 'rol' => 'Visitante'])){
            return true;
        }else{
            return false;
        }
    }

    public static function isActivo($idUsuario){
        if(User::findOne(['idUsuario' => $idUsuario, 'estado' => 'Activo'])){
            return true;
        }else{
            return false;
        }
    }
    

    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($idUsuario)
    {
        return static::findOne($idUsuario);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username'=>sha1($username)]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->idUsuario;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($contrasena)
    {
        return $this->contrasena === sha1($contrasena);
    }
    public function getNombreCompleto(){
        return $this->nombre." ".$this->apPaterno.": ".$this->estado;
    }

    public function getIsAdmin( )
    {
        return $this->tipo = 'Administrador';
    } 


    public function getIsSupervisor( )
    {
        return $this->tipo = 'Supervisor';
    } 

    public function getIsActivo( ){
        return $this->tipo = 'Activo';
    }

    public function getIsVisitante( ){
        return $this->tipo = 'Visitante';
    }
}
