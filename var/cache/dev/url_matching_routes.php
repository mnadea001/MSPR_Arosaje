<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/createPS' => [[['_route' => 'app_plant_type', '_controller' => 'App\\Controller\\PlantTypeController::createPlantSitting'], null, null, null, false, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['POST' => 0], null, false, false, null]],
        '/api/logout' => [[['_route' => 'api_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, ['POST' => 0], null, false, false, null]],
        '/auth' => [[['_route' => 'auth'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/\\.well\\-known/genid/([^/]++)(*:43)'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:78)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:108)'
                        .'|contexts/([^.]+)(?:\\.(jsonld))?(*:147)'
                        .'|advice(?'
                            .'|(?:\\.([^/]++))?(*:179)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:213)'
                            .'|(?:\\.([^/]++))?(*:236)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:273)'
                            .')'
                        .')'
                        .'|plant(?'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(*:310)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:344)'
                                .'|(?:\\.([^/]++))?(*:367)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:404)'
                                .')'
                            .')'
                            .'|_(?'
                                .'|sittings(?'
                                    .'|(?:\\.([^/]++))?(*:444)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:478)'
                                    .'|(?:\\.([^/]++))?(*:501)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:538)'
                                    .')'
                                .')'
                                .'|types(?'
                                    .'|(?:\\.([^/]++))?(*:571)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:605)'
                                    .'|(?:\\.([^/]++))?(*:628)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:665)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|users(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:711)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:737)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:775)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:815)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        108 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        147 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        179 => [[['_route' => '_api_/advice{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Advice', '_api_operation_name' => '_api_/advice{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        213 => [[['_route' => '_api_/advice/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Advice', '_api_operation_name' => '_api_/advice/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        236 => [[['_route' => '_api_/advice{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Advice', '_api_operation_name' => '_api_/advice{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        273 => [
            [['_route' => '_api_/advice/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Advice', '_api_operation_name' => '_api_/advice/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/advice/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Advice', '_api_operation_name' => '_api_/advice/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        310 => [[['_route' => '_api_/plants{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Plant', '_api_operation_name' => '_api_/plants{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        344 => [[['_route' => '_api_/plants/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Plant', '_api_operation_name' => '_api_/plants/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        367 => [[['_route' => '_api_/plants{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Plant', '_api_operation_name' => '_api_/plants{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        404 => [
            [['_route' => '_api_/plants/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Plant', '_api_operation_name' => '_api_/plants/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/plants/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Plant', '_api_operation_name' => '_api_/plants/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        444 => [[['_route' => '_api_/plant_sittings{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantSitting', '_api_operation_name' => '_api_/plant_sittings{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        478 => [[['_route' => '_api_/plant_sittings/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantSitting', '_api_operation_name' => '_api_/plant_sittings/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        501 => [[['_route' => '_api_/plant_sittings{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantSitting', '_api_operation_name' => '_api_/plant_sittings{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        538 => [
            [['_route' => '_api_/plant_sittings/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantSitting', '_api_operation_name' => '_api_/plant_sittings/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/plant_sittings/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantSitting', '_api_operation_name' => '_api_/plant_sittings/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        571 => [[['_route' => '_api_/plant_types{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantType', '_api_operation_name' => '_api_/plant_types{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        605 => [[['_route' => '_api_/plant_types/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantType', '_api_operation_name' => '_api_/plant_types/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        628 => [[['_route' => '_api_/plant_types{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantType', '_api_operation_name' => '_api_/plant_types{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        665 => [
            [['_route' => '_api_/plant_types/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantType', '_api_operation_name' => '_api_/plant_types/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/plant_types/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PlantType', '_api_operation_name' => '_api_/plant_types/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        711 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        737 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        775 => [
            [['_route' => '_api_/users/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        815 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
