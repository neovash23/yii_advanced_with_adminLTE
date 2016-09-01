<?php

namespace app\models;

use Yii;
use common\models\Profile;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
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

    public $firstname;
    public $lastname;
    public $image;
    public $cropped_image = '';
    public static function tableName()
    {
        return 'user';
    }
    private $customFields = ['firstname', 'lastname', 'image','cropped_image'];

    // public function __construct()
    // {
    //     foreach ($this->customFields as $key => $value)
    //     {
    //         $this->$value = '';
    //     }   
    // }

    // public function __set($key, $value)
    // {
    //     $this->$key = $value;
    // }


    // public function __get($property){
    //   return array_key_exists($property, $this->customFields)
    //     ? $this->customFields[$property]
    //     : $this->$property
    //   ;
    // }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {



            $this->setImage(UploadedFile::getInstance($this,'image'));

            if($this->isNewRecord){
                $this->created_by = Yii::$app->user->id;

                $this->profile_id = $this->returnRelatedModelId($this->customFields);
            }else{
                $this->updated_by = Yii::$app->user->id;

                 $this->profile_id = $this->updateRelatedModel($this->profile_id, $this->customFields );
            }
            

            return true;
        } else {
            return false;
        }
    }


    private function returnRelatedModelId( $fields){

        $model = new Profile;

       foreach ($fields as $field) {
            $model->$field =  $this->$field;
       }
       
        $model->save();

        $id = $model->id;
       return $id;
    }

    private function updateRelatedModel( $id, $fields){

        $model = Profile::findOne($id);

       foreach ($fields as $field) {
            $model->$field =  $this->$field;
       }
       // / echo '<pre>';print_r($model->image);die;
        $model->save();

        $id = $model->id;
       return $id;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username',  'email',  'firstname','lastname'], 'required'],
            [['status', 'accessLevel', 'created_by', 'updated_by', 'role', 'last_login', 'profile_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at','image','username','profile_id','firstname','lastname'], 'safe'],
            [['fb_id', 'google_id'], 'string', 'max' => 100],
            [['username', 'password_hash', 'password_reset_token', 'email', 'access_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username','email'], 'unique'],
            ['image', 'file', 'extensions' => ['png', 'jpg'], 'maxSize' => 1024*1024,'skipOnEmpty' => true],
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

    private function setImage($file){
         if($file)
            {   
                
                if ($file->size !== 0){

                    $data = getimagesize($file->tempName);
                    $width = $data[0];
                    $height = $data[1];

                    $targetWidth = 400;
                    if($width <= $height){
                        $ratio = $width / $height;
                    }else {
                        $ratio = $height / $width;
                    }
                    $targetHeight = number_format($targetWidth * $ratio,0);

                    //die($targetHeight);
                    Image::thumbnail($file->tempName, $targetWidth,$targetHeight)
                        ->save(Yii::getAlias('upload/thumbs/thumb-test-image.jpg'), ['quality' => 100]);


                    if(is_file('upload/thumbs/thumb-test-image.jpg')){
                        $this->image=  base64_encode(file_get_contents('upload/thumbs/thumb-test-image.jpg'));
                        $this->cropped_image = '';
                        unlink('upload/thumbs/thumb-test-image.jpg');
                    }  
                }
                // $image = imagecreatefromstring(file_get_contents($file->tempName));
                // print_r($image);
                // die();

            } else {
                 if($this->image == '' && isset($this->oldAttributes['image']))
                    $this->image = $this->oldAttributes['image'];
            }
    }


}
