<?php

// Nama model harus sama dengan nama tabel
class Users extends \Phalcon\Mvc\Model
{
    public $id;
    public $nik;
    public $name;
    public $sex;
    public $religion;
    public $phone;
    public $address;
}