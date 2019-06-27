<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $description Описание
 * @property string $startDate Дата начала
 * @property string $endDate Дата окончания
 * @property int $isBlocked Заблокиовать
 * @property int $isRepeat Повторить
 * @property string $img Изображение
 * @property string $email
 * @property int $useNotification Оповещение по email
 * @property string $create_at
 * @property int $user_id
 *
 * @property Users $user
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'startDate', 'user_id'], 'required'],
            [['description'], 'string'],
            [['startDate', 'endDate', 'create_at'], 'safe'],
            [['isBlocked', 'isRepeat', 'useNotification', 'user_id'], 'integer'],
            [['title', 'email'], 'string', 'max' => 150],
            [['img'],'file','skipOnEmpty' => true, 'extensions' => ['jpg','png']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'isBlocked' => Yii::t('app', 'Is Blocked'),
            'isRepeat' => Yii::t('app', 'Is Repeat'),
            'img' => Yii::t('app', 'Img'),
            'email' => Yii::t('app', 'Email'),
            'useNotification' => Yii::t('app', 'Use Notification'),
            'create_at' => Yii::t('app', 'Create At'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class(), ['id' => 'user_id']);
    }
}
