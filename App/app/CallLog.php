<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    public function name(){
        $contact= Contact::where('number',$this->number)->first();
        $name= $contact !=null ? $contact->name : $this->number;
        return $name;
    }
}
