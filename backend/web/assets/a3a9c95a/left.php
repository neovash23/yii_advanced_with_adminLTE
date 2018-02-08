<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
<!--         <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <!-- search form -->
<!--         <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Events','icon' => 'glyphicon-events',  'url' => ['/event'], 'options' => ['class' => ''],  'active' => ($item == 'events'), 'visible'=>Yii::$app->user->identity->isModerator()],
                    ['label' => 'Attendees','icon' => 'glyphicon-attendees',  'url' => ['/profile','type'=>'attendee'], 'visible'=>Yii::$app->user->identity->isModerator()],
                    ['label' => 'Speakers','icon' => 'glyphicon-speaker',  'url' => ['/profile','type'=>'speaker'], 'visible'=>Yii::$app->user->identity->isModerator()],
                    ['label' => 'Feedbacks','icon' => 'glyphicon-feedback',  'url' => ['/event/feedbacks'],  'active' => ($item == 'feedbacks'), 'visible'=>Yii::$app->user->identity->isModerator()],
                    ['label' => 'Polls','icon' => 'glyphicon glyphicon-stats',  'url' => ['/poll'],  'active' => ($item == 'polls'), 'visible'=>Yii::$app->user->identity->isModerator()],
                    ['label' => 'Users','icon' => 'glyphicon-user2',  'url' => ['/user'],  'active' => ($item == 'user'), 'visible'=>Yii::$app->user->identity->isAdmin()],
                    ['label' => 'User Groups','icon' => 'glyphicon-attendees',  'url' => ['/user-groups'],  'active' => ($item == 'groups'), 'visible'=>Yii::$app->user->identity->isSuperAdmin()],
                    ['label' => 'API List','icon' => 'glyphicon glyphicon-list',  'url' => ['/api'],  'active' => ($item == 'api'), 'visible'=>Yii::$app->user->identity->isSuperAdmin() || Yii::$app->user->identity->isApiView()],
                    ['label' => 'Sponsors','icon' => 'glyphicon glyphicon-usd',  'url' => ['/sponsor'],  'active' => ($item == 'sponsors'), 'visible'=>Yii::$app->user->identity->isSuperAdmin()],

                    // ['label' => 'Dev Tools', 'options' => ['class' => 'header'],'visible' => !YII_ENV_TEST],
                    // ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],'visible' => !YII_ENV_TEST],
                    // ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],'visible' => !YII_ENV_TEST],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Same tools',
                    //     'icon' => 'fa fa-share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'fa fa-circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'fa fa-circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>
