<?php
namespace App\Models;

class Job
{

    private $title, $description, $location, $type, $pay, $company, $employment, $phone, $email;
    
    public function __construct($title, $description, $location, $type, $pay, $company, $employment, $phone, $email)
    {
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->type = $type;
        $this->pay = $pay;
        $this->company = $company;
        $this->employment = $employment;
        $this->phone = $phone;
        $this->email = $email;
    }
    
    
}

