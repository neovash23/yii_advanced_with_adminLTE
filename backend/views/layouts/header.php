<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">'. Html::img('@web/images/logo.png',['style'=>'width: 43px;']).'</span><span class="logo-lg">' . Html::img('@web/images/logo.png',['style'=>'width: 63px;']) . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       
                    <?php  if(isset(Yii::$app->user->identity->profile->image)){ 


                                // if ( base64_encode(base64_decode($data)) === $data){
                                //     echo '$data is valid';
                                // } else {
                                //     echo '$data is NOT valid';
                                // }


                        ?>
                        <img src="data:image/jpeg;base64,<?php echo 
                                             (!empty(Yii::$app->user->identity->profile->cropped_image))? 
                                                Yii::$app->user->identity->profile->cropped_image : Yii::$app->user->identity->profile->image ; ?>" class="user-image" alt="User Image"/>
                    <?php } ?>

                        <span class="hidden-xs"><?=  ucfirst(Yii::$app->user->identity->profile->firstname). ' ' .
                        ucfirst(Yii::$app->user->identity->profile->lastname)
                         ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="data:image/jpeg;base64,
                            <?php echo  (!empty(Yii::$app->user->identity->profile->cropped_image)?
                                     Yii::$app->user->identity->profile->cropped_image : 
                                     Yii::$app->user->identity->profile->image ); ?>

                                     " class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?=  ucfirst(Yii::$app->user->identity->profile->firstname). ' ' .
                        ucfirst(Yii::$app->user->identity->profile->lastname)
                         ?> - <?=  ucfirst(Yii::$app->user->identity->accessLevelList[Yii::$app->user->identity->accessLevel])
                         ?>
                                <small>Member since <?= date('M. Y', strtotime(Yii::$app->user->identity->created_at)) ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
      
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= Yii::$app->urlManager->createUrl( ['user/view', 'id' => Yii::$app->user->identity->id] , null) ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
<!--                 <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
