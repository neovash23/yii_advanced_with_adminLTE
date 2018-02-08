<?php 
use mdm\admin\components\Helper;

$menuItems =  [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Users', 'url' => ['/user']],
                    [
                        'label' => 'RBAC Manager',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Assign Roles', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin'],],
                            ['label' => 'Routes', 'icon' => 'fa fa-dashboard', 'url' => ['/admin/route'],],
                            ['label' => 'Permissions', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/permission'],],
                            ['label' => 'Menu', 'icon' => 'fa fa-dashboard', 'url' => ['/admin/menu'],],
                            ['label' => 'Role', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/role'],],
                            ['label' => 'User', 'icon' => 'fa fa-dashboard', 'url' => ['/admin/user'],],
                            //['label' => 'Assignment', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/assignment'],],
                            // [
                            //     'label' => 'Level One',
                            //     'icon' => 'fa fa-circle-o',
                            //     'url' => '#',
                            //     'items' => [
                            //         ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            //         [
                            //             'label' => 'Level Two',
                            //             'icon' => 'fa fa-circle-o',
                            //             'url' => '#',
                            //             'items' => [
                            //                 ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            //                 ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            //             ],
                            //         ],
                            //     ],
                            // ],
                        ],
                    ],                  
					['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ];
 
//$menuItems = Helper::filter($menuItems);
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->



        <?= dmstr\widgets\Menu::widget($menuItems) ?>

    </section>

</aside>
