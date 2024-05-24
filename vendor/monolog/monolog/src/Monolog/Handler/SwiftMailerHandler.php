<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Logger;
<<<<<<< HEAD
use Monolog\Utils;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\LineFormatter;
use Swift_Message;
use Swift;

/**
 * SwiftMailerHandler uses Swift_Mailer to send the emails
 *
 * @author Gyula Sallai
<<<<<<< HEAD
 *
 * @phpstan-import-type Record from \Monolog\Logger
 * @deprecated Since Monolog 2.6. Use SymfonyMailerHandler instead.
 */
class SwiftMailerHandler extends MailHandler
{
    /** @var \Swift_Mailer */
    protected $mailer;
    /** @var Swift_Message|callable(string, Record[]): Swift_Message */
    private $messageTemplate;

    /**
     * @psalm-param Swift_Message|callable(string, Record[]): Swift_Message $message
     *
     * @param \Swift_Mailer          $mailer  The mailer to use
     * @param callable|Swift_Message $message An example message for real messages, only the body will be replaced
=======
 */
class SwiftMailerHandler extends MailHandler
{
    protected $mailer;
    private $messageTemplate;

    /**
     * @psalm-param Swift_Message|callable(string, array): Swift_Message $message
     *
     * @param \Swift_Mailer          $mailer  The mailer to use
     * @param callable|Swift_Message $message An example message for real messages, only the body will be replaced
     * @param string|int             $level   The minimum logging level at which this handler will be triggered
     * @param bool                   $bubble  Whether the messages that are handled can bubble up the stack or not
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(\Swift_Mailer $mailer, $message, $level = Logger::ERROR, bool $bubble = true)
    {
        parent::__construct($level, $bubble);

<<<<<<< HEAD
        @trigger_error('The SwiftMailerHandler is deprecated since Monolog 2.6. Use SymfonyMailerHandler instead.', E_USER_DEPRECATED);

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->mailer = $mailer;
        $this->messageTemplate = $message;
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function send(string $content, array $records): void
    {
        $this->mailer->send($this->buildMessage($content, $records));
    }

    /**
     * Gets the formatter for the Swift_Message subject.
     *
     * @param string|null $format The format of the subject
     */
    protected function getSubjectFormatter(?string $format): FormatterInterface
    {
        return new LineFormatter($format);
    }

    /**
     * Creates instance of Swift_Message to be sent
     *
     * @param  string        $content formatted email body to be sent
     * @param  array         $records Log records that formed the content
     * @return Swift_Message
<<<<<<< HEAD
     *
     * @phpstan-param Record[] $records
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function buildMessage(string $content, array $records): Swift_Message
    {
        $message = null;
        if ($this->messageTemplate instanceof Swift_Message) {
            $message = clone $this->messageTemplate;
            $message->generateId();
        } elseif (is_callable($this->messageTemplate)) {
            $message = ($this->messageTemplate)($content, $records);
        }

        if (!$message instanceof Swift_Message) {
<<<<<<< HEAD
            $record = reset($records);
            throw new \InvalidArgumentException('Could not resolve message as instance of Swift_Message or a callable returning it' . ($record ? Utils::getRecordMessageForException($record) : ''));
=======
            throw new \InvalidArgumentException('Could not resolve message as instance of Swift_Message or a callable returning it');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($records) {
            $subjectFormatter = $this->getSubjectFormatter($message->getSubject());
            $message->setSubject($subjectFormatter->format($this->getHighestRecord($records)));
        }

        $mime = 'text/plain';
        if ($this->isHtmlBody($content)) {
            $mime = 'text/html';
        }

        $message->setBody($content, $mime);
<<<<<<< HEAD
        /** @phpstan-ignore-next-line */
        if (version_compare(Swift::VERSION, '6.0.0', '>=')) {
            $message->setDate(new \DateTimeImmutable());
        } else {
            /** @phpstan-ignore-next-line */
=======
        if (version_compare(Swift::VERSION, '6.0.0', '>=')) {
            $message->setDate(new \DateTimeImmutable());
        } else {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $message->setDate(time());
        }

        return $message;
    }
}
