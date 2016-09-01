<?php

namespace backend\controllers;

use yii\imagine\Image;
use Imagine\Gd;
use Yii;
use common\models\Profile;

class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

	public function actionUploadPhoto($id)
    {
        $model = $this->findModel($id);
        $image = $this->convertToImage(base64_decode($model->image), 'upload/thumbs/convertedImagess.jpg');

        $image_h = $_POST['imageId_h'];
        $image_w = $_POST['imageId_w'];
        $image_y = $_POST['imageId_y'];
        $image_x = $_POST['imageId_x'];


        Image::crop($image, $image_h, $image_w, [$image_x,$image_y])
         ->save(Yii::getAlias('upload/thumbs/temporaryCropped.jpg'), ['quality' => 100]);

         $model->cropped_image= base64_encode( file_get_contents('upload/thumbs/temporaryCropped.jpg'));

         if($model->save(false))
         {
            if(is_file('upload/thumbs/temporaryCropped.jpg'))
                unlink('upload/thumbs/temporaryCropped.jpg');
            if(is_file('upload/thumbs/convertedImagess.jpg'))
                unlink('upload/thumbs/convertedImagess.jpg');
         }

    }

    function convertToImage( $base64_string, $output_file ) {
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, $base64_string); 
        fclose( $ifp ); 
        return( $output_file ); 
    }	

    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }    

}
