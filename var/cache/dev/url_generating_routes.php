<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'app_home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home']], [], [], []],
    'app_user_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/user_register']], [], [], []],
    'app_botanist_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::BotanistRegister'], [], [['text', '/botanist_register']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
];
