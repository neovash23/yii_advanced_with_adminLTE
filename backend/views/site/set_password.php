<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Set Password';


$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><?= Html::img('@web/images/logo.png');?></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Hi <?= $model->username ?>, please set your password</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'new_pwd', $fieldOptions1)
            ->label(false)
            ->passwordInput(['placeholder' => 'New Password']) ?>

        <?= $form
            ->field($model, 'confirm_pwd', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => 'Confirm Password']) ?>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

  <!--       <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                in using Google+</a>
        </div> -->
        <!-- /.social-auth-links -->


    </div>

                    <div class="row poweredby">  
                    <span>powered  by</span>
                    <div class="col-md-12">
                        <a href="#"><?= Html::img('@web/images/globe.png');?></a>
                    </div>
                </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
