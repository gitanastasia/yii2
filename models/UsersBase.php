<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $password_hash Шифрованный пароль
 * @property string $auth_token
 * @property string $auth_key Ключ для авторизации
 * @property string $created_at
 *
 * @property Activity[] $activities
 */
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password_hash'], 'required'],
            [['created_at'], 'safe'],
            [['email', 'auth_key'], 'string', 'max' => 150],
            [['password_hash', 'auth_token'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'), // t - подключение категории мультиязычности - (Enable I18N)
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'auth_token' => Yii::t('app', 'Auth Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    //формирование связей (hasMany - ко многим)
    public function getActivities()
    {
        return $this->hasMany(Activity::class(), ['user_id' => 'id']);
    }
}
