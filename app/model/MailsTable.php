<?php
  namespace QS;    
  use Nette;
  use Nette\Database\SqlLiteral;


class MailsTable extends Table {
   public function insertMail($values) {
       $fp = fopen($values->tm, 'rb');
        $binarydata = addslashes(fread($fp, $values->file->size));
        $values->file = $binarydata;

       $this->getTable()->insert(array(
                'name' => $values->name,
                'surname' => $values->surname,
                'email' => $values->email,
                'phone' => $values->phone,
                'text' => $values->text,
                'file' => $values->file,
                'date' => new SqlLiteral('CURDATE()'),
            ));
   }
   
   public function findMailsDay() {
       return $this->getTable()->select("date, COUNT(date) AS count")->group('date');
   }
}
