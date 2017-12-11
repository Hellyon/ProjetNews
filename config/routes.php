<?php
/**
 * Created by PhpStorm.
 * User: ilbenjello
 * Date: 09/12/17
 * Time: 11:49
 */
    namespace config;

    $routes =[
       'mainPage' => [
           'ctrl' => '\controleur\CtrlUser',
           'action' => 'mainPage',
            'params' => [
                'start' => PARAM_INT,
                'limit' => PARAM_INT
            ]
       ],
        'connectionAdmin' => [
            'ctrl' => '\controleur\CtrlUser',
            'action' => 'mainPage'
        ]
    ];