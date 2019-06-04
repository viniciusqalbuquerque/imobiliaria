<?php

namespace App\EventListener;

use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionListener implements EventSubscriberInterface
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * ExceptionListener constructor.
     *
     * @param LoggerInterface $logger
     * @param ContainerInterface $container
     */
    public function __construct(LoggerInterface $logger, ContainerInterface $container)
    {
        $this->container = $container;
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::EXCEPTION => array('onException', 9999),
        );
    }

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onException(GetResponseForExceptionEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $exception = $event->getException();

        $this->handleException($exception);
    }

    /**
     * @param Exception $exception
     */
    private function handleException(Exception $exception)
    {
        $this->container->get('session')->getFlashBag()->add('error', $exception->getMessage());
        $this->saveLogger($exception);
    }

    /**
     * @param Exception $exception
     */
    private function saveLogger(Exception $exception)
    {
        $this->logger->error($exception->getMessage(), $exception->getTrace());
    }
}
