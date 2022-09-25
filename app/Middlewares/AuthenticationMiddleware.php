<?php

namespace App\Middlewares;

use Laminas\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthenticationMiddleware implements MiddlewareInterface{
    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if($request->getUri()->getPath() === '/admin'){

            $sessionUserId = $_SESSION['userId'] ?? null;
            if(!$sessionUserId){
                //Regresar
                return new EmptyResponse(401);
            }
        }
        //Continuar
        return $handler->handle($request);
    }
}