<?php

namespace AppBundle\Event;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;
use Psr\Log\LoggerInterface;
class ExceptionListener
{
    private $tokenStorage;
    private $accessDeniedHandler;
    private $errorPage;
    private $logger;
    public function __construct(TokenStorageInterface $tokenStorage, $errorPage = null, AccessDeniedHandlerInterface $accessDeniedHandler = null, LoggerInterface $logger = null)
    {
        $this->tokenStorage = $tokenStorage;
        $this->accessDeniedHandler = $accessDeniedHandler;
        $this->errorPage = $errorPage;
        $this->logger = $logger;
    }


}