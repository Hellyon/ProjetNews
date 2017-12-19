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
           'param' => '$con',
       ],
        'connexionAdmin' => [
            'ctrl' => '\controleur\CtrlUser',
            'action' => 'connexionAdmin',
        ],
        'validationConnexion' =>[
            'ctrl' => '\controleur\CtrlUser',
            'action' => 'validationConnexion',
            'param' => '$con',
        ],
        'deconnexion' => [
            'ctrl' => '\controleur\CtrlAdmin',
            'action' => 'deconnexion',
            'admin' => 'true',
            'erreur' => 'erreur401',
        ],
        'ajouterRSS' => [
            'ctrl' => '\controleur\ctrlAdmin',
            'action' => 'ajouterRSS',
            'admin' => 'true',
            'erreur' => 'erreur403'
        ],
        'validationAjouterRSS' =>[
            'ctrl' => '\controleur\CtrlAdmin',
            'action' => 'validationAjouterRSS',
            'param' => '$con',
            'erreur' => 'erreur403'
        ],
        'supprimerRSS' => [
            'ctrl' => '\controleur\ctrlAdmin',
            'action' => 'supprimerRSS',
            'admin' => 'true',
            'param' => '$con',
            'erreur' => 'erreur403'
        ]
    ];