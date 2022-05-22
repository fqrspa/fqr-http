<?php

namespace App\Models\Fqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Flyer extends Model
{
    use HasFactory;

    protected $primaryKey = 'email';
    public $incrementing = false;

    public function getAddresses(){
        return $this->hasMany(Address::class, 'flyerKey','flyerKey');
    }

    public function getBankAccounts(){
        return $this->hasMany(BankAccount::class, 'flyerKey','flyerKey');
    }

    public function getLinks(){
        return $this->hasMany(Link::class, 'flyerKey','flyerKey');
    }

    public function getEMails(){
        return $this->hasMany(Email::class, 'flyerKey','flyerKey');
    }
    
    public function getTelephones(){
        return $this->hasMany(Telephone::class, 'flyerKey','flyerKey');
    }
}
