<?php
//session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);
// 328/quiz/index.php
// This is my CONTROLLER

// Turn on error reporting
require_once ('vendor/autoload.php');

// Instantiate base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function(){

    //render a view page
    $view = new Template();
    echo $view->render('views/homepage.html');
});

// Define order route
$f3->route('GET|POST /survey', function($f3){

    // echo '<h1>Order Page</h1>';

    // Check if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        // Get the data
        $name = $_POST['name'];
        $answers = $_POST['answers'];


            // Data is valid
            $f3->set('SESSION.name', $name);

            $f3->set('SESSION.answers', $answers);

            $f3->reroute('summary');

    }

    //render a view page
    $view = new Template();
    echo $view->render('views/survey.html');
});

$f3->route('GET|POST /summary', function($f3){

    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();

?>