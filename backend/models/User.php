<?php

namespace app\models;

use Yii;
use common\models\Profile;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $fb_id
 * @property string $firstname
 * @property string $google_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $accessLevel
 * @property integer $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $role
 * @property integer $last_login
 * @property string $access_token
 * @property integer $profile_id
 *
 * @property Profile $profile
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    private $customFields = ['firstname', 'lastname', 'image'];

    public function __construct()
    {
        foreach ($this->customFields as $key => $value)
        {
            $this->$value = '';
        }   
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
                $this->created_by = Yii::$app->user->id;
            }else{
                $this->updated_by = Yii::$app->user->id;
            }
            



            return true;
        } else {
            return false;
        }
    }

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username',  'email',  'firstname'], 'required'],
            [['status', 'accessLevel', 'created_by', 'updated_by', 'role', 'last_login', 'profile_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['fb_id', 'google_id'], 'string', 'max' => 100],
            [['username', 'password_hash', 'password_reset_token', 'email', 'access_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fb_id' => 'Fb ID',
            'google_id' => 'Google ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'accessLevel' => 'Access Level',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'deleted_at' => 'Deleted At',
            'role' => 'Role',
            'last_login' => 'Last Login',
            'access_token' => 'Access Token',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    public function getRelatedModelValues(){
        foreach ($this->customFields as $key => $value)
        {
            $this->$value = $this->profile->$value;
        } 
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'profile_id']);
    }
}
