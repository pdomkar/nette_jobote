<?php
use Nette\Application\UI\Form;
/**
 * Homepage presenter.
 */
class MailsViewPresenter extends BasePresenter
{
    /** @var QS\mailsTable */  
    private $mailsTable;
    
    public function startup() {
        parent::startup();	    
        $this->mailsTable = $this->context->mailsTable;
    }
   
    public function renderMailsView() {
        $this->template->daysMails = $this->mailsTable->findMailsDay();
    }
    

}
