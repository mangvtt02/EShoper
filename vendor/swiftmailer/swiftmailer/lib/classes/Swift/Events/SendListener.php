<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Listens for Messages being sent from within the Transport system.
 *
 * @author Chris Corbyn
 */
interface Swift_Events_SendListener extends Swift_Events_EventListener
{
    /**
     * Invoked immediately before the Message is sent.
<<<<<<< HEAD
=======
     *
     * @param Swift_Events_SendEvent $evt
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function beforeSendPerformed(Swift_Events_SendEvent $evt);

    /**
     * Invoked immediately after the Message is sent.
<<<<<<< HEAD
=======
     *
     * @param Swift_Events_SendEvent $evt
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function sendPerformed(Swift_Events_SendEvent $evt);
}
