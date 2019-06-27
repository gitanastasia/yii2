<?php


namespace app\components;


use app\models\Users;
use yii\base\Component;

class AuthComponent extends Component
{
   public $modelClass;

    /**
     * return Model
     */
    public function getModel(){
        return new $this->modelClass;
   }

   public function signIn(Users&$model):bool
   {
       $model->setScenarioSignIn();

       if (!$model->validate(['email', 'password'])) {
           return false;
       }
       $user = $this->getUserByEmail($model->email);

       if (!$this->validatePassword($model->password, $user->password_hash)) {
           $model->addError('password', 'Не этот пароль');
           return false;
       }
       //если валидация прошла - сохраняем авторизацию: вызываем компонент user и функцию login()
       return \Yii::$app->user->login($user, 3600);
   }

   private function getUserByEmail($email):Users{
        return Users::find()->andWhere(['email'=>$email])->one();

   }
   //валидация пароля с хешированным
    private function validatePassword($password,$password_hash):bool{
        return \Yii::$app->security->validatePassword($password,$password_hash);
    }

   public function signUp(Users &$model):bool
   {
        $model->setScenarioSignUp();

        //изначально проверяется пароль и email
        if(!$model->validate(['password', 'email'])){
            return false;
        }
       // наполняем модель
       $model->password_hash=$this->generatePasswordHash($model->password);

        //сохранение в бд после проведениея валидации
       if(!$model->save()){

           $this->rbac->addToUserRole();
           return false;
       }
       return true;
   }

   //хеширование проводится через функцию security и метод generatePassword

    public function generatePasswordHash($password){

        return \Yii::$app->security->generatePasswordHash($password);
    }

}