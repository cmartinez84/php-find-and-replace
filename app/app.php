<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/findAndReplace.php";
    require_once __DIR__."/../src/Data.php";

    session_start();
    if (empty($_SESSION['madlib'])) {
        $_SESSION['madlib'] = array();
    }
    if (empty($_SESSION['previous'])) {
        $_SESSION['previous'] = "text";
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

  //loads actual twig file
    $app->get("/", function() use ($app) {
      return $app['twig']->render("home.html.twig");
    });

  //loads basic php
    $app->post("/game", function() use ($app) {
      $input_sentence = $_POST['input_sentence'];
      $input_search_string = $_POST['input_search_string'];
      $input_replacement = $_POST['input_replacement'];
      $newFindAndReplace = new findAndReplace;
      $result = $newFindAndReplace->playFindAndReplace($input_search_string, $input_replacement, $input_sentence);
      return $app['twig']->render("result.html.twig", array('result'=>$newFindAndReplace));
    });

    $app->post("/randomGame", function() use ($app) {
      $input_sentence = $_POST['input_sentence'];
      $input_replacement = $_POST['input_replacement'];
      $newFindAndReplace = new findAndReplace;
      $result = $newFindAndReplace->findAndReplaceRandom($input_sentence, $input_replacement);
      return $app['twig']->render("result.html.twig", array('result'=>$newFindAndReplace));
    });

    $app->post("/madlib", function() use ($app) {
      $newData = new Data;
      $input = $_POST['input'];
      $input= $newData->processData($input);
      $newFindAndReplace = new findAndReplace;
      $result = $newFindAndReplace->madlib($input);
      $newFindAndReplace->save();
      return $app['twig']->render("result.html.twig", array('result'=>$newFindAndReplace));
    });
    $app->post("/madlib2", function() use ($app) {
      $madlib = $_SESSION['madlib'];
      $result = $madlib->madlib($madlib->storedSentence);
      return $app['twig']->render("result.html.twig", array('result'=>$madlib));
    });



    return $app;
?>
