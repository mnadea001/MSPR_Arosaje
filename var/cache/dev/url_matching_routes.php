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
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|dvice/([^/]++)(?'
                        .'|(*:29)'
                        .'|/edit(*:41)'
                        .'|(*:48)'
                    .')'
                    .'|pi(?'
                        .'|/\\.well\\-known/genid/([^/]++)(*:90)'
                        .'|(?:/(index)(?:\\.([^/]++))?)?(*:125)'
                        .'|/(?'
                            .'|docs(?:\\.([^/]++))?(*:156)'
                            .'|contexts/([^.]+)(?:\\.(jsonld))?(*:195)'
                        .')'
                    .')'
                .')'
                .'|/botanist/([^/]++)(?'
                    .'|(*:227)'
                    .'|/edit(*:240)'
                    .'|(*:248)'
                .')'
                .'|/message/([^/]++)(?'
                    .'|(*:277)'
                    .'|/edit(*:290)'
                    .'|(*:298)'
                .')'
                .'|/plant/(?'
                    .'|([^/]++)(?'
                        .'|(*:328)'
                        .'|/edit(*:341)'
                        .'|(*:349)'
                    .')'
                    .'|sitting(?'
                        .'|(*:368)'
                        .'|/([^/]++)(?'
                            .'|(*:388)'
                            .'|/edit(*:401)'
                            .'|(*:409)'
                        .')'
                    .')'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:437)'
                    .'|/edit(*:450)'
                    .'|(*:458)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:498)'
                    .'|wdt/([^/]++)(*:518)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:564)'
                            .'|router(*:578)'
                            .'|exception(?'
                                .'|(*:598)'
                                .'|\\.css(*:611)'
                            .')'
                        .')'
                        .'|(*:621)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        29 => [[['_route' => 'app_advice_show', '_controller' => 'App\\Controller\\AdviceController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        41 => [[['_route' => 'app_advice_edit', '_controller' => 'App\\Controller\\AdviceController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        48 => [[['_route' => 'app_advice_delete', '_controller' => 'App\\Controller\\AdviceController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        90 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        125 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        156 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        195 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        227 => [[['_route' => 'app_botanist_show', '_controller' => 'App\\Controller\\BotanistController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        240 => [[['_route' => 'app_botanist_edit', '_controller' => 'App\\Controller\\BotanistController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        248 => [[['_route' => 'app_botanist_delete', '_controller' => 'App\\Controller\\BotanistController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        277 => [[['_route' => 'app_message_show', '_controller' => 'App\\Controller\\MessageController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        290 => [[['_route' => 'app_message_edit', '_controller' => 'App\\Controller\\MessageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        298 => [[['_route' => 'app_message_delete', '_controller' => 'App\\Controller\\MessageController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        328 => [[['_route' => 'app_plant_show', '_controller' => 'App\\Controller\\PlantController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        341 => [[['_route' => 'app_plant_edit', '_controller' => 'App\\Controller\\PlantController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        349 => [[['_route' => 'app_plant_delete', '_controller' => 'App\\Controller\\PlantController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        368 => [[['_route' => 'app_plant_sitting_index', '_controller' => 'App\\Controller\\PlantSittingController::index'], [], ['GET' => 0], null, true, false, null]],
        388 => [[['_route' => 'app_plant_sitting_show', '_controller' => 'App\\Controller\\PlantSittingController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        401 => [[['_route' => 'app_plant_sitting_edit', '_controller' => 'App\\Controller\\PlantSittingController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        409 => [[['_route' => 'app_plant_sitting_delete', '_controller' => 'App\\Controller\\PlantSittingController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        437 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        450 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        458 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        498 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        518 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        564 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        578 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        598 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        611 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        621 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
