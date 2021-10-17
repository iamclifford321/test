<?php

/*
___________________________________________________________________________
___________________________________________________________________________

Class Loader file
___________________________________________________________________________
___________________________________________________________________________

*/

spl_autoload_register(function( $className ){

    // echo 'class name : '.$className;

    if (file_exists('../Classes/Controller/' .$className. '.php') || file_exists('Classes/Controller/' .$className. '.php')){

        $dir = '../Classes/Controller/';
        if(file_exists('Classes/Controller/' .$className. '.php')) $dir = 'Classes/Controller/';
        require_once $dir . $className. '.php';

    }elseif(file_exists('../Classes/Model/' .$className. '.php') || file_exists('Classes/Model/' .$className. '.php')){

        $dir = '../Classes/Model/';
        if(file_exists('Classes/Model/' .$className. '.php')) $dir = 'Classes/Model/';
        require_once $dir . $className. '.php';

    }elseif(file_exists('../Classes/Config/' .$className. '.php') || file_exists('Classes/Config/' .$className. '.php')){

        $dir = '../Classes/Config/';
        if(file_exists('Classes/Config/' .$className. '.php')) $dir = 'Classes/Config/';
        require_once $dir . $className. '.php';

    }elseif(file_exists('../actions/' .$className. '.php') || file_exists('actions/' .$className. '.php')){

        $dir = '../actions/';
        if(file_exists('actions/' .$className. '.php')) $dir = 'actions/';

        require_once $dir . $className. '.php';


    }else{
        die('Error loading the files!');
    }


});

