<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 12/11/2017
 * Time: 18:49
 */

namespace Pet\Plugins;

use Aura\Router\RouterContainer;
use Pet\ServiceContainerInterface;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequest;

class RoutePlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();
        /*Serve para registrar as rotas da aplicação*/
        $map = $routerContainer->getMap();
        /*Serve para identificar a rota que esta sendo acessada*/
        $matcher = $routerContainer->getMatcher();
        /*Serve para gerar links com base nas rotas registradas*/
        $generator = $routerContainer->getGenerator();
        $request = $this->getRequest();

        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class, $request);

        $container->addLazy('route', function (ContainerInterface $container) {
            $matcher = $container->get('routing.matcher');
            $request = $container->get(RequestInterface::class);
            return $matcher->match($request);
        });

    }

    protected function getRequest(): RequestInterface
    {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    }
}