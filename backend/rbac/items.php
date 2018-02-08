<?php
return [
    '/user/update' => [
        'type' => 2,
    ],
    '/user/index' => [
        'type' => 2,
    ],
    '/user/view' => [
        'type' => 2,
    ],
    '/user/create' => [
        'type' => 2,
    ],
    '/user/delete' => [
        'type' => 2,
    ],
    '/admin/default/*' => [
        'type' => 2,
    ],
    '/admin/menu/index' => [
        'type' => 2,
    ],
    '/admin/menu/create' => [
        'type' => 2,
    ],
    '/admin/menu/update' => [
        'type' => 2,
    ],
    '/admin/menu/delete' => [
        'type' => 2,
    ],
    '/admin/menu/*' => [
        'type' => 2,
    ],
    '/admin/permission/index' => [
        'type' => 2,
    ],
    '/admin/permission/view' => [
        'type' => 2,
    ],
    '/admin/permission/create' => [
        'type' => 2,
    ],
    '/admin/permission/update' => [
        'type' => 2,
    ],
    '/admin/permission/delete' => [
        'type' => 2,
    ],
    '/admin/permission/assign' => [
        'type' => 2,
    ],
    '/admin/permission/remove' => [
        'type' => 2,
    ],
    '/admin/permission/*' => [
        'type' => 2,
    ],
    '/admin/role/index' => [
        'type' => 2,
    ],
    '/admin/role/view' => [
        'type' => 2,
    ],
    '/admin/role/create' => [
        'type' => 2,
    ],
    '/admin/role/update' => [
        'type' => 2,
    ],
    '/admin/role/delete' => [
        'type' => 2,
    ],
    '/admin/role/assign' => [
        'type' => 2,
    ],
    '/admin/role/remove' => [
        'type' => 2,
    ],
    '/admin/role/*' => [
        'type' => 2,
    ],
    '/admin/route/index' => [
        'type' => 2,
    ],
    '/admin/route/create' => [
        'type' => 2,
    ],
    '/admin/route/assign' => [
        'type' => 2,
    ],
    '/admin/route/remove' => [
        'type' => 2,
    ],
    '/admin/route/refresh' => [
        'type' => 2,
    ],
    '/admin/route/*' => [
        'type' => 2,
    ],
    '/admin/rule/index' => [
        'type' => 2,
    ],
    '/admin/rule/view' => [
        'type' => 2,
    ],
    '/admin/rule/create' => [
        'type' => 2,
    ],
    '/admin/rule/update' => [
        'type' => 2,
    ],
    '/admin/rule/delete' => [
        'type' => 2,
    ],
    '/admin/rule/*' => [
        'type' => 2,
    ],
    '/admin/user/index' => [
        'type' => 2,
    ],
    '/admin/user/view' => [
        'type' => 2,
    ],
    '/admin/user/delete' => [
        'type' => 2,
    ],
    '/admin/user/login' => [
        'type' => 2,
    ],
    '/admin/user/logout' => [
        'type' => 2,
    ],
    '/admin/user/signup' => [
        'type' => 2,
    ],
    '/admin/user/request-password-reset' => [
        'type' => 2,
    ],
    '/admin/user/reset-password' => [
        'type' => 2,
    ],
    '/admin/user/change-password' => [
        'type' => 2,
    ],
    '/admin/user/activate' => [
        'type' => 2,
    ],
    '/admin/user/*' => [
        'type' => 2,
    ],
    '/admin/*' => [
        'type' => 2,
    ],
    '/debug/default/db-explain' => [
        'type' => 2,
    ],
    '/debug/default/index' => [
        'type' => 2,
    ],
    '/debug/default/view' => [
        'type' => 2,
    ],
    '/debug/default/toolbar' => [
        'type' => 2,
    ],
    '/debug/default/download-mail' => [
        'type' => 2,
    ],
    '/debug/default/*' => [
        'type' => 2,
    ],
    '/debug/*' => [
        'type' => 2,
    ],
    '/gii/default/index' => [
        'type' => 2,
    ],
    '/gii/default/view' => [
        'type' => 2,
    ],
    '/gii/default/preview' => [
        'type' => 2,
    ],
    '/gii/default/diff' => [
        'type' => 2,
    ],
    '/gii/default/action' => [
        'type' => 2,
    ],
    '/gii/default/*' => [
        'type' => 2,
    ],
    '/gii/*' => [
        'type' => 2,
    ],
    '/profile/index' => [
        'type' => 2,
    ],
    '/profile/upload-photo' => [
        'type' => 2,
    ],
    '/profile/*' => [
        'type' => 2,
    ],
    '/site/error' => [
        'type' => 2,
    ],
    '/site/index' => [
        'type' => 2,
    ],
    '/site/login' => [
        'type' => 2,
    ],
    '/site/logout' => [
        'type' => 2,
    ],
    '/site/*' => [
        'type' => 2,
    ],
    '/user/*' => [
        'type' => 2,
    ],
    'Super Admin' => [
        'type' => 1,
        'description' => 'has access to all modules',
        'children' => [
            'User CRUD',
            '/*',
            '/admin/*',
            '/admin/default/*',
            '/admin/menu/index',
            '/admin/menu/create',
            '/admin/menu/update',
            '/admin/menu/delete',
            '/admin/menu/*',
            '/admin/permission/index',
            '/admin/permission/view',
            '/admin/permission/create',
            '/admin/permission/update',
            '/admin/permission/delete',
            '/admin/permission/assign',
            '/admin/permission/remove',
            '/admin/permission/*',
            '/admin/role/index',
            '/admin/role/view',
            '/admin/role/create',
            '/admin/role/update',
            '/admin/role/delete',
            '/admin/role/assign',
            '/admin/role/remove',
            '/admin/role/*',
            '/admin/route/index',
            '/admin/route/create',
            '/admin/route/assign',
            '/admin/route/remove',
            '/admin/route/refresh',
            '/admin/route/*',
            '/admin/rule/index',
            '/admin/rule/view',
            '/admin/rule/create',
            '/admin/rule/update',
            '/admin/rule/delete',
            '/admin/rule/*',
            '/admin/user/index',
            '/admin/user/view',
            '/admin/user/delete',
            '/admin/user/login',
            '/admin/user/logout',
            '/admin/user/signup',
            '/admin/user/request-password-reset',
            '/admin/user/reset-password',
            '/admin/user/change-password',
            '/admin/user/activate',
            '/admin/user/*',
            '/gii/*',
        ],
    ],
    'User CRUD' => [
        'type' => 2,
        'description' => 'testt',
        'children' => [
            '/user/*',
        ],
    ],
    '/admin/assignment/index' => [
        'type' => 2,
    ],
    '/admin/assignment/view' => [
        'type' => 2,
    ],
    '/admin/assignment/assign' => [
        'type' => 2,
    ],
    '/admin/assignment/revoke' => [
        'type' => 2,
    ],
    '/admin/assignment/*' => [
        'type' => 2,
    ],
    '/admin/default/index' => [
        'type' => 2,
    ],
    '/admin/menu/view' => [
        'type' => 2,
    ],
    '/*' => [
        'type' => 2,
    ],
];
