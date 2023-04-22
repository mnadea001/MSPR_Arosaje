<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\AdminController::index'], null, null, null, false, false, null]],
        '/advice' => [[['_route' => 'app_advice_index', '_controller' => 'App\\Controller\\AdviceController::index'], null, ['GET' => 0], null, true, false, null]],
        '/advice/new' => [[['_route' => 'app_advice_new', '_controller' => 'App\\Controller\\AdviceController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/botanist' => [[['_route' => 'app_botanist_index', '_controller' => 'App\\Controller\\BotanistController::index'], null, ['GET' => 0], null, true, false, null]],
        '/botanist/new' => [[['_route' => 'app_botanist_new', '_controller' => 'App\\Controller\\BotanistController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/home' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/message' => [[['_route' => 'app_message_index', '_controller' => 'App\\Controller\\MessageController::index'], null, ['GET' => 0], null, true, false, null]],
        '/message/new' => [[['_route' => 'app_message_new', '_controller' => 'App\\Controller\\MessageController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/plant' => [[['_route' => 'app_plant_index', '_controller' => 'App\\Controller\\PlantController::index'], null, ['GET' => 0], null, true, false, null]],
        '/plant/new' => [[['_route' => 'app_plant_new', '_controller' => 'App\\Controller\\PlantController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/plant/sitting/new' => [[['_route' => 'app_plant_sitting_new', '_controller' => 'App\\Controller\\PlantSittingController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/user_register' => [[['_route' => 'app_user_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/botanist_register' => [[['_route' => 'app_botanist_register', '_controller' => 'App\\Controller\\RegistrationController::BotanistRegister'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/advice/([^/]++)(?'
                    .'|(*:26)'
                    .'|/edit(*:38)'
                    .'|(*:45)'
                .')'
                .'|/botanist/([^/]++)(?'
                    .'|(*:74)'
                    .'|/edit(*:86)'
                    .'|(*:93)'
                .')'
                .'|/message/([^/]++)(?'
                    .'|(*:121)'
                    .'|/edit(*:134)'
                    .'|(*:142)'
                .')'
                .'|/plant/(?'
                    .'|([^/]++)(?'
                        .'|(*:172)'
                        .'|/edit(*:185)'
                        .'|(*:193)'
                    .')'
                    .'|sitting(?'
                        .'|(*:212)'
                        .'|/([^/]++)(?'
                            .'|(*:232)'
                            .'|/edit(*:245)'
                            .'|(*:253)'
                        .')'
                    .')'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:281)'
                    .'|/edit(*:294)'
                    .'|(*:302)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:339)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        26 => [[['_route' => 'app_advice_show', '_controller' => 'App\\Controller\\AdviceController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        38 => [[['_route' => 'app_advice_edit', '_controller' => 'App\\Controller\\AdviceController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        45 => [[['_route' => 'app_advice_delete', '_controller' => 'App\\Controller\\AdviceController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        74 => [[['_route' => 'app_botanist_show', '_controller' => 'App\\Controller\\BotanistController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        86 => [[['_route' => 'app_botanist_edit', '_controller' => 'App\\Controller\\BotanistController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        93 => [[['_route' => 'app_botanist_delete', '_controller' => 'App\\Controller\\BotanistController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        121 => [[['_route' => 'app_message_show', '_controller' => 'App\\Controller\\MessageController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        134 => [[['_route' => 'app_message_edit', '_controller' => 'App\\Controller\\MessageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        142 => [[['_route' => 'app_message_delete', '_controller' => 'App\\Controller\\MessageController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        172 => [[['_route' => 'app_plant_show', '_controller' => 'App\\Controller\\PlantController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        185 => [[['_route' => 'app_plant_edit', '_controller' => 'App\\Controller\\PlantController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        193 => [[['_route' => 'app_plant_delete', '_controller' => 'App\\Controller\\PlantController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        212 => [[['_route' => 'app_plant_sitting_index', '_controller' => 'App\\Controller\\PlantSittingController::index'], [], ['GET' => 0], null, true, false, null]],
        232 => [[['_route' => 'app_plant_sitting_show', '_controller' => 'App\\Controller\\PlantSittingController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        245 => [[['_route' => 'app_plant_sitting_edit', '_controller' => 'App\\Controller\\PlantSittingController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        253 => [[['_route' => 'app_plant_sitting_delete', '_controller' => 'App\\Controller\\PlantSittingController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        281 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        294 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        302 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        339 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
