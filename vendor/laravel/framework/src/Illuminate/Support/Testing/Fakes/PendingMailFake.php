<?php

namespace Illuminate\Support\Testing\Fakes;

use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Mail\PendingMail;

class PendingMailFake extends PendingMail
{
    /**
     * Create a new instance.
     *
     * @param  \Illuminate\Support\Testing\Fakes\MailFake  $mailer
     * @return void
     */
    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send a new mailable message instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable
=======
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return mixed
     */
    public function send(Mailable $mailable)
    {
        return $this->sendNow($mailable);
    }

    /**
     * Send a mailable message immediately.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable
=======
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return mixed
     */
    public function sendNow(Mailable $mailable)
    {
        return $this->mailer->send($this->fill($mailable));
    }

    /**
     * Push the given mailable onto the queue.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable
=======
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return mixed
     */
    public function queue(Mailable $mailable)
    {
        return $this->mailer->queue($this->fill($mailable));
    }
}
