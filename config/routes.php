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
       ],
        'connectionAdmin' => [
            'ctrl' => '\controleur\CtrlUser',
            'action' => 'connectionAdmin',
        ]
    ];