<?php

namespace App\Enums\Site;
 
enum TypeResaonEnum:string {
    case Doubt = 'doubt';
    case Praise = 'praise';
    case Complaint = 'complaint';


    public static function toArray(): array
    {
        return array_column(TypeResaonEnum::cases(), 'value');
    }  
}