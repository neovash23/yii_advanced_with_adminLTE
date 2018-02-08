<?php   
use kartik\sidenav\SideNav;

 echo SideNav::widget([
        'type' => SideNav::TYPE_PRIMARY,
        'encodeLabels' => false,
        'heading' => false,
        'headingOptions' => ['class'=>'head-style'],
        'items' => [
            // Important: you need to specify url as 'controller/action',
            // not just as 'controller' even if default action is used.
            ['label' => 'Events', 'icon' => 'glyphicon events', 'url' => ['/event/index'], 'active' => ($item == 'events')],
            ['label' => 'Users', 'icon' => 'fa-users', 'url' => ['/user/index'], 'active' => ($item == 'user'), 'visible'=>Yii::$app->user->identity->isAdmin()],
            // ['label' => 'Books', 'icon' => 'book', 'items' => [
            //     ['label' => '<span class="pull-right badge">10</span> New Arrivals', 'url' => ['/site/index'], 'active' => ($item == 'new-arrivals')],
            //    // ['label' => '<span class="pull-right badge">5</span> Most Popular', 'url' => Url::to(['/site/most-popular', 'type'=>$type]), 'active' => ($item == 'most-popular')],
            //     ['label' => 'Read Online', 'icon' => 'cloud', 'items' => [
            //         //['label' => 'Online 1', 'url' => Url::to(['/site/online-1', 'type'=>$type]), 'active' => ($item == 'online-1')],
            //         ['label' => 'Online 2', 'url' => ['/site/index'], 'active' => ($item == 'online-2')]
            //     ]],
            // ]],

        ],
    ]); 