<?php

namespace feierabend\Logic;


use DI\Bridge\Slim\App;

class Bootstrap
{
    public function __construct()
    {
        $app = new App;

        $app->getContainer()->set('settings.debug', true);
        $app->getContainer()->set('settings.determineRouteBeforeAppMiddleware', true);
        $app->getContainer()->set('settings.displayErrorDetails', true);

        $this->registerRoutes($app);

        $app->run();
    }

    /**
     * @param $app
     */
    public function registerRoutes($app)
    {
        $app->any("/", WriteAction::class);
        $app->any("/show", ReadAction::class);
        $app->any("/ideas", IdeaAction::class);
    }
}