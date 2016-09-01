<?php

use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use yii\helpers\Html;
use kartik\daterange\DateRangePicker;
use kartik\file\FileInput;
use kartik\file\CanvasBlobAsset;
use budyaga\cropper\Widget;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use newerton\jcrop\Jcrop;
use kartik\widgets\Select2;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

<?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data'],'id' => 'form-profile' // important
        ]); ?>

<?php 
if(isset($model->profile->image) && $model->profile->image != '')
echo '<img width="200px" src="data:image/jpeg;base64,'. $model->profile->image .'"/>';
?>
<hr>
<?php if(Yii::$app->user->identity->isAdmin()){ ?>
 
        <div  class="col-sm-4" style="position:relative; left:-14px">

            <?php

            echo '<label class="control-label">Role</label>';
            echo Html::activeDropDownList($model, 'accessLevel',
                    (Yii::$app->user->identity->accessLevel == 99)? User::getAccessLevelList() : User::getAccessLevelListAdmin()
                ,['class'=>'form-control']
                );


            ?>
            <?php echo Html::error($model,'accessLevel',['style'=>'color: #dd4b39;']); ?>
        </div>
    

<?php
}
echo Form::widget([       // 3 column layout
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'attributes'=>[
        'username'=>[
            'label'=>'Username', 
            'type'=>Form::INPUT_TEXT
        ],
        'email'=>[
            'label'=>'Email', 
            //'items'=>['inactive'=>'Inactive','published'=>'Published'], 
            'type'=>Form::INPUT_TEXT
        ],
    ], 
]);

echo Form::widget([       // 3 column layout
    'model'=>$model,
    'form'=>$form,
    'columns'=>3,
    'attributes'=>[
        'firstname'=>[
            'label'=>'First Name', 
            'type'=>Form::INPUT_TEXT
        ],
        'lastname'=>[
            'label'=>'Last Name', 
            'type'=>Form::INPUT_TEXT
        ],
    ]
]);

?>

<div style="width:40%">
<?php 
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]);
?>
</div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
