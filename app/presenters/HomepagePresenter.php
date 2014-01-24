<?php
use Nette\Application\UI\Form;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /** @var QS\mailsTable */  
    private $mailsTable;
    
    public function startup() {
        parent::startup();	    
        $this->mailsTable = $this->context->mailsTable;
    }
    
    protected function createComponentMailForm() {
       $form = new Form(); 
       $form->addText('name', 'Jméno: ')
               ->setRequired();
       $form->addText('surname', 'Příjmení: ')
               ->setRequired();
       $form->addText('email', 'Email: ')
               ->setRequired()->addRule(Form::EMAIL, "Musí být platný mail");
       $form->addText('phone', 'Telefon: ')
               ->setRequired()->addRule(Form::INTEGER, "Musí být číslo");
       $form->addTextArea('text', 'Zpráva: ')
               ->setRequired();
       $form->addUpload('file', 'Soubor: ')
               ->setRequired()->addRule(Form::MAX_FILE_SIZE, 'Příloha nesmí být větší než 1MB', 1000 * 1024 );
       $form->addSubmit('submit', 'Odeslat mail');
       
       $form->onSuccess[] = $this->mailFormSucceeded;
       return $form;   
       
    }
    
    public function mailFormSucceeded(Form $form) {
        $values = $form->getValues();
            //ulozeni do dtb
        $this->mailsTable->insertMail($values);
            //odeslani mailu
        $this->context->parameters["mail"];
        $mail = new Message;
        $mail->setFrom('info@aaa.cz')
            ->addTo($this->context->parameters["mail"])
            ->setSubject('Mail')
            ->setBody("Dobrý den,přišel mail.")
            ->addAttachment($form->values->file);
        
        
        $mailer = new SendmailMailer;
        $mailer->send($mail);
       
        
        $this->flashMessage("zpravá odeslána");
        $this->redirect('this');
    }
    

}
