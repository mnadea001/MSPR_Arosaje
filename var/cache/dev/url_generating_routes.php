<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'admin' => [[], ['_controller' => 'App\\Controller\\Admin\\DashboardController::index'], [], [['text', '/admin']], [], [], []],
    'app_advice_index' => [[], ['_controller' => 'App\\Controller\\AdviceController::index'], [], [['text', '/advice/']], [], [], []],
    'app_advice_new' => [[], ['_controller' => 'App\\Controller\\AdviceController::new'], [], [['text', '/advice/new']], [], [], []],
    'app_advice_show' => [['id'], ['_controller' => 'App\\Controller\\AdviceController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/advice']], [], [], []],
    'app_advice_edit' => [['id'], ['_controller' => 'App\\Controller\\AdviceController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/advice']], [], [], []],
    'app_advice_delete' => [['id'], ['_controller' => 'App\\Controller\\AdviceController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/advice']], [], [], []],
    'app_botanist_index' => [[], ['_controller' => 'App\\Controller\\BotanistController::index'], [], [['text', '/botanist/']], [], [], []],
    'app_botanist_new' => [[], ['_controller' => 'App\\Controller\\BotanistController::new'], [], [['text', '/botanist/new']], [], [], []],
    'app_botanist_show' => [['id'], ['_controller' => 'App\\Controller\\BotanistController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/botanist']], [], [], []],
    'app_botanist_edit' => [['id'], ['_controller' => 'App\\Controller\\BotanistController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/botanist']], [], [], []],
    'app_botanist_delete' => [['id'], ['_controller' => 'App\\Controller\\BotanistController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/botanist']], [], [], []],
    'app_home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home']], [], [], []],
    'app_message_index' => [[], ['_controller' => 'App\\Controller\\MessageController::index'], [], [['text', '/message/']], [], [], []],
    'app_message_new' => [[], ['_controller' => 'App\\Controller\\MessageController::new'], [], [['text', '/message/new']], [], [], []],
    'app_message_show' => [['id'], ['_controller' => 'App\\Controller\\MessageController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/message']], [], [], []],
    'app_message_edit' => [['id'], ['_controller' => 'App\\Controller\\MessageController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/message']], [], [], []],
    'app_message_delete' => [['id'], ['_controller' => 'App\\Controller\\MessageController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/message']], [], [], []],
    'app_plant_index' => [[], ['_controller' => 'App\\Controller\\PlantController::index'], [], [['text', '/plant/']], [], [], []],
    'app_plant_new' => [[], ['_controller' => 'App\\Controller\\PlantController::new'], [], [['text', '/plant/new']], [], [], []],
    'app_plant_show' => [['id'], ['_controller' => 'App\\Controller\\PlantController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/plant']], [], [], []],
    'app_plant_edit' => [['id'], ['_controller' => 'App\\Controller\\PlantController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/plant']], [], [], []],
    'app_plant_delete' => [['id'], ['_controller' => 'App\\Controller\\PlantController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/plant']], [], [], []],
    'app_plant_sitting_index' => [[], ['_controller' => 'App\\Controller\\PlantSittingController::index'], [], [['text', '/plant/sitting/']], [], [], []],
    'app_plant_sitting_new' => [[], ['_controller' => 'App\\Controller\\PlantSittingController::new'], [], [['text', '/plant/sitting/new']], [], [], []],
    'app_plant_sitting_show' => [['id'], ['_controller' => 'App\\Controller\\PlantSittingController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/plant/sitting']], [], [], []],
    'app_plant_sitting_edit' => [['id'], ['_controller' => 'App\\Controller\\PlantSittingController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/plant/sitting']], [], [], []],
    'app_plant_sitting_delete' => [['id'], ['_controller' => 'App\\Controller\\PlantSittingController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/plant/sitting']], [], [], []],
    'app_user_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/user_register']], [], [], []],
    'app_botanist_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::BotanistRegister'], [], [['text', '/botanist_register']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
    'app_user_index' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user/']], [], [], []],
    'app_user_new' => [[], ['_controller' => 'App\\Controller\\UserController::new'], [], [['text', '/user/new']], [], [], []],
    'app_user_show' => [['id'], ['_controller' => 'App\\Controller\\UserController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], [], []],
    'app_user_edit' => [['id'], ['_controller' => 'App\\Controller\\UserController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], [], []],
    'app_user_delete' => [['id'], ['_controller' => 'App\\Controller\\UserController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], [], []],
    'api_genid' => [['id'], ['_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/.well-known/genid']], [], [], []],
    'api_entrypoint' => [['index', '_format'], ['_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index' => 'index'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', 'index', 'index', true], ['text', '/api']], [], [], []],
    'api_doc' => [['_format'], ['_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/api/docs']], [], [], []],
    'api_jsonld_context' => [['shortName', '_format'], ['_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName' => '[^.]+', '_format' => 'jsonld'], [['variable', '.', 'jsonld', '_format', true], ['variable', '/', '[^.]+', 'shortName', true], ['text', '/api/contexts']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
];
