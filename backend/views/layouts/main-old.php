<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use kartik\sidenav\SideNav;
use kartik\widgets\AlertBlock;
use kartik\widgets\Growl;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">


<br>
    <?php
    NavBar::begin([
       // 'brandLabel' => 'Events',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    ?>

        <div class="logo"><?= Html::img('@web/images/logo.png');?></div>
    <?php
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    $type = SideNav::TYPE_DEFAULT;
    if(isset($this->params['item']))
        echo $this->render('sidemenu', ['item'=>$this->params['item']]);
    else
        echo $this->render('sidemenu', ['item'=>'']);


    NavBar::end();
    ?>

<div class="nav-top">
<?php 
    echo Nav::widget([
        'options' => ['class' => 'nav-top logout navbar-right'],
        'items' => $menuItems,
    ]);
?>
</div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
       
        <?= $content ?>
    </div>
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
 

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
 -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
