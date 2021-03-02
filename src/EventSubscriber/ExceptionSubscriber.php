<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{
    public function onException(ExceptionEvent $exceptionEvent)
    {
        $exception = $exceptionEvent->getException();

        if(!$exception instanceof AccessDeniedHttpException)
            return;

        $exceptionEvent->setResponse(new JsonResponse([
            'error' => $exception->getMessage()
        ]));
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onException'
        ];
    }
}