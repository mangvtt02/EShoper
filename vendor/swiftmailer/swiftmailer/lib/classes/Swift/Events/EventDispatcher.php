<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Interface for the EventDispatcher which handles the event dispatching layer.
 *
 * @author Chris Corbyn
 */
interface Swift_Events_EventDispatcher
{
    /**
     * Create a new SendEvent for $source and $message.
     *
<<<<<<< HEAD
=======
     * @param Swift_Transport $source
     * @param Swift_Mime_SimpleMessage
     *
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return Swift_Events_SendEvent
     */
    public function createSendEvent(Swift_Transport $source, Swift_Mime_SimpleMessage $message);

    /**
     * Create a new CommandEvent for $source and $command.
     *
<<<<<<< HEAD
     * @param string $command      That will be executed
     * @param array  $successCodes That are needed
=======
     * @param Swift_Transport $source
     * @param string          $command      That will be executed
     * @param array           $successCodes That are needed
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @return Swift_Events_CommandEvent
     */
    public function createCommandEvent(Swift_Transport $source, $command, $successCodes = []);

    /**
     * Create a new ResponseEvent for $source and $response.
     *
<<<<<<< HEAD
     * @param string $response
     * @param bool   $valid    If the response is valid
=======
     * @param Swift_Transport $source
     * @param string          $response
     * @param bool            $valid    If the response is valid
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @return Swift_Events_ResponseEvent
     */
    public function createResponseEvent(Swift_Transport $source, $response, $valid);

    /**
     * Create a new TransportChangeEvent for $source.
     *
<<<<<<< HEAD
=======
     * @param Swift_Transport $source
     *
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return Swift_Events_TransportChangeEvent
     */
    public function createTransportChangeEvent(Swift_Transport $source);

    /**
     * Create a new TransportExceptionEvent for $source.
     *
<<<<<<< HEAD
=======
     * @param Swift_Transport          $source
     * @param Swift_TransportException $ex
     *
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return Swift_Events_TransportExceptionEvent
     */
    public function createTransportExceptionEvent(Swift_Transport $source, Swift_TransportException $ex);

    /**
     * Bind an event listener to this dispatcher.
<<<<<<< HEAD
=======
     *
     * @param Swift_Events_EventListener $listener
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function bindEventListener(Swift_Events_EventListener $listener);

    /**
     * Dispatch the given Event to all suitable listeners.
     *
<<<<<<< HEAD
     * @param string $target method
=======
     * @param Swift_Events_EventObject $evt
     * @param string                   $target method
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function dispatchEvent(Swift_Events_EventObject $evt, $target);
}
