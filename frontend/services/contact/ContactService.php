<?php


namespace frontend\services\contact;


use frontend\forms\ContactForm;
use yii\mail\MailerInterface;

class ContactService
{
    private $adminEmail;
    private $mailer;

    public function __construct($adminEmail, MailerInterface $mailer)
    {
        $this->adminEmail = $adminEmail;
        $this->mailer = $mailer;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param ContactForm $form
     * @return void whether the email was sent
     */
    public function send(ContactForm $form) : void
    {
        $sent = $this->mailer
            ->compose()
            ->setTo($this->adminEmail)
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();

        if(!$sent ) {
            throw new \RuntimeException('Sending error.');
        }
    }
}