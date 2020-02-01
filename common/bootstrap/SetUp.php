<?php


namespace common\bootstrap;


use frontend\services\auth\PasswordResetService;
use yii\base\BootstrapInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(PasswordResetService::class, [], [
            [$app->params['supportEmail'] => $app->name . ' robot']
        ]);

//        альтернатива для сложных классов
//        $container->setSingleton(PasswordResetService::class, function () use ($app) {
//            return new PasswordResetService([$app->params['supportEmail'] => $app->name . ' robot']);
//        });
    }
}