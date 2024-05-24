<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel;

/**
 * Contains all events thrown in the HttpKernel component.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
final class KernelEvents
{
    /**
     * The REQUEST event occurs at the very beginning of request
     * dispatching.
     *
     * This event allows you to create a response for a request before any
     * other code in the framework is executed.
     *
     * @Event("Symfony\Component\HttpKernel\Event\RequestEvent")
     */
<<<<<<< HEAD
    public const REQUEST = 'kernel.request';
=======
    const REQUEST = 'kernel.request';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The EXCEPTION event occurs when an uncaught exception appears.
     *
     * This event allows you to create a response for a thrown exception or
     * to modify the thrown exception.
     *
     * @Event("Symfony\Component\HttpKernel\Event\ExceptionEvent")
     */
<<<<<<< HEAD
    public const EXCEPTION = 'kernel.exception';
=======
    const EXCEPTION = 'kernel.exception';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The VIEW event occurs when the return value of a controller
     * is not a Response instance.
     *
     * This event allows you to create a response for the return value of the
     * controller.
     *
     * @Event("Symfony\Component\HttpKernel\Event\ViewEvent")
     */
<<<<<<< HEAD
    public const VIEW = 'kernel.view';
=======
    const VIEW = 'kernel.view';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The CONTROLLER event occurs once a controller was found for
     * handling a request.
     *
     * This event allows you to change the controller that will handle the
     * request.
     *
     * @Event("Symfony\Component\HttpKernel\Event\ControllerEvent")
     */
<<<<<<< HEAD
    public const CONTROLLER = 'kernel.controller';
=======
    const CONTROLLER = 'kernel.controller';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The CONTROLLER_ARGUMENTS event occurs once controller arguments have been resolved.
     *
     * This event allows you to change the arguments that will be passed to
     * the controller.
     *
     * @Event("Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent")
     */
<<<<<<< HEAD
    public const CONTROLLER_ARGUMENTS = 'kernel.controller_arguments';
=======
    const CONTROLLER_ARGUMENTS = 'kernel.controller_arguments';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The RESPONSE event occurs once a response was created for
     * replying to a request.
     *
     * This event allows you to modify or replace the response that will be
     * replied.
     *
     * @Event("Symfony\Component\HttpKernel\Event\ResponseEvent")
     */
<<<<<<< HEAD
    public const RESPONSE = 'kernel.response';
=======
    const RESPONSE = 'kernel.response';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The TERMINATE event occurs once a response was sent.
     *
     * This event allows you to run expensive post-response jobs.
     *
     * @Event("Symfony\Component\HttpKernel\Event\TerminateEvent")
     */
<<<<<<< HEAD
    public const TERMINATE = 'kernel.terminate';
=======
    const TERMINATE = 'kernel.terminate';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The FINISH_REQUEST event occurs when a response was generated for a request.
     *
     * This event allows you to reset the global and environmental state of
     * the application, when it was changed during the request.
     *
     * @Event("Symfony\Component\HttpKernel\Event\FinishRequestEvent")
     */
<<<<<<< HEAD
    public const FINISH_REQUEST = 'kernel.finish_request';
=======
    const FINISH_REQUEST = 'kernel.finish_request';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
