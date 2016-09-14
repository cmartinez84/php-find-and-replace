<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/findAndReplace.php";

    // session_start();
    // if (empty($_SESSION['collection'])) {
    //     $_SESSION['collection'] = array();
    // }

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
      return $app['twig']->render("result.html.twig", array('result'=>$result));
    });

    $app->post("/randomGame", function() use ($app) {
      $input_sentence = $_POST['input_sentence'];
      $input_replacement = $_POST['input_replacement'];
      $newFindAndReplace = new findAndReplace;
      $result = $newFindAndReplace->findAndReplaceRandom($input_sentence, $input_replacement);
      return $app['twig']->render("resultRandom.html.twig", array('result'=>$result));
    });

    return $app;
?>
