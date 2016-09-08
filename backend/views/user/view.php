<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use kartik\form\ActiveForm;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="profile-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

 
        <?php 
        if(Yii::$app->user->identity->isSuperAdmin()){
                echo Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'id' => 'deleteBtn',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]); 
        }
        

        ?>
   
    </p>

<?php 

 $image =  (!empty($model->profile->cropped_image))? $model->profile->cropped_image : $model->profile->image;
                         
 if(empty($model->profile->image))
    $image = base64_encode(file_get_contents('images/image-placeholder.jpg'));

?>

    <img class="profile-thubm" width="100px" 
         src="data:image/jpeg;base64,<?php echo $image; ?>"
         class="user-image" alt="User Image"/>
<?php 


if(!empty($model->profile->image)){

Modal::begin([
    'header'=>'Crop Photo',
    'toggleButton' => [
        'label'=>'Crop Photo', 'class'=>'btn btn-default cropModal'
    ],
    'size' => 'modal-sm',
]);
$form1 = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]);
echo \newerton\jcrop\jCrop::widget([
    // Image URL
    'url' => 'data:image/jpeg;base64,'. $model->profile->image ,
    // options for the IMG element
    'imageOptions' => [
        'id' => 'imageId',
        //'width' => 300,
        'alt' => 'Crop this image'
    ],
    // Jcrop options (see Jcrop documentation [http://deepliquid.com/content/Jcrop_Manual.html])
    'jsOptions' => array(
        'minSize' => [50, 50],
        'aspectRatio' => 1,
        'onRelease' => new yii\web\JsExpression("function() {ejcrop_cancelCrop(this);}"),
        //customization
        'bgColor' => '#111',
        'bgOpacity' => 0.4,
        'selection' => true,
        'theme' => 'light',
    ),
    // if this array is empty, buttons will not be added
    'buttons' => array(
        'start' => array(
            'label' => 'Adjust thumbnail cropping',
            'htmlOptions' => array(
                'class' => 'myClass',
                'style' => 'color:red;'
            )
        ),
        'crop' => array(
            'label' => 'Apply cropping',
        ),
        'cancel' => array(
            'label' => 'Cancel cropping'
        )
    ),
    // URL to send request to (unused if no buttons)
    'ajaxUrl' => '../profile/upload-photo?id='.$model->profile->id,
    // Additional parameters to send to the AJAX call (unused if no buttons)
  //  'ajaxParams' => ['someParam' => 'someValue'],
]);
ActiveForm::end();
Modal::end();
} else {
    echo '<div class="imageId" style="width:100px;height:40px;"></div>';
}



?>
<br><br><br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'username',
            'email',
            [
                'label' => 'Name',
                'value' => $model->profile->firstname . ' ' . $model->profile->lastname,
            ],  
        ],
    ]) ?>

</div>
