<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use kartik\sidenav\SideNav;
use kartik\widgets\AlertBlock;
use kartik\widgets\Growl;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">
<?php if(!Yii::$app->user->isGuest){ ?>
        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset, 'item'=>$this->params['item']]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>
<?php  } ?>
    </div>
<?php 


    if(!empty(Yii::$app->session->getAllFlashes())){

    foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                <?php
                echo Growl::widget([
                    'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                    'title'=> (!empty($message['title'])) ? Html::decode($message['title']) : 'Events',
                    'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-ok',
                    'body' => (!empty($message['message'])) ? Html::decode($message['message']) : 'Message Not Set!',
                    'bodyOptions' =>  [
                            'format' => 'raw',
                        ],
                    'showSeparator' => true,
                    'delay' => (!empty($message['delay'])) ? $message['delay'] : 10,//This delay is how long before the message shows
                    //'delay' => 100, //This delay is how long before the message shows
                    'pluginOptions' => [
                        'format' => 'raw',
                        'delay' => (!empty($message['duration'])) ? $message['duration'] : 4000, //This delay is how long the message shows for
                        //'showProgressbar' => (!empty($message['showProgressbar'])) ? $message['showProgressbar'] : true, //This delay is how long the message shows for                    
                        'placement' => [
                            'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                            'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                        ]
                    ]
                ]);

     endforeach; 
     }
 ?>
 
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
