<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;


/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $middle
 * @property string $company
 * @property string $position
 * @property string $mobile
 * @property string $email
 * @property resource $image
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property EventAttendees[] $eventAttendees
 * @property EventRating[] $eventRatings
 * @property UserProfile[] $userProfiles
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }


    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
                $this->created_by = Yii::$app->user->id;
                $action = 'created';
            }else{
                $this->updated_by = Yii::$app->user->id;
                $action = 'updated';
            }
            
            if($this->deleted == 1)
                $action = 'deleted';

            $message = 'You have '.$action.'  <a class="alert-link" href="#"><span class="str">'.
                                ucfirst($this->firstname).' ' .ucfirst($this->lastname) . ((substr($this->lastname, -1) != 's')? '\'s' : '\'')
                            .'</span></a> profile.';

                //setting flash message with kartik growl
              Yii::$app->getSession()->setFlash('success', [
                 'type' => ($action != 'deleted')? \kartik\widgets\Growl::TYPE_SUCCESS : \kartik\widgets\Growl::TYPE_DANGER,
                 'duration' => 4100,
                 'icon' => ($action != 'deleted')? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-trash',
                 'message' => $message,
                 'title' => ($action != 'deleted')? 'Good job!':' Ouch!',
                 'positonY' => 'top',
                 'positonX' => 'right',
             ]);
            
            if($file=UploadedFile::getInstance($this,'image'))
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

            return true;
        } else {
            return false;
        }
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['image', 'type'], 'string'],
            [['email'], 'unique'],
            [['email'], 'email'],
            ['image', 'file', 'extensions' => ['png', 'jpg'], 'maxSize' => 1024*1024,'skipOnEmpty' => true],
            [['created_at', 'updated_at','cropped_image','company'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['firstname', 'lastname', 'middle', 'position'], 'string', 'max' => 50],
            [['company'], 'string', 'max' => 100],
            [['mobile'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'middle' => 'Middle',
            'company' => 'Company',
            'position' => 'Position',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'image' => 'Image',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventAttendees()
    {
        return $this->hasMany(EventAttendees::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRatings()
    {
        return $this->hasMany(EventRating::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::className(), ['profile_id' => 'id']);
    }
}
