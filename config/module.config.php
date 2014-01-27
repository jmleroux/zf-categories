<?php
return array(
    'service_manager' => array(
        'invokables' => array(
            'Categories\Service\Category' => 'Categories\Service\CategoryService',
        ),
        'aliases' => array(
            'category_service' => 'Categories\Service\Category',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Categories\Controller\Index' => 'Categories\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'view_helpers' => include 'helpers.config.php',
);

