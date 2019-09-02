<?php


namespace Enumeration;


class Rules
{
    public static function validationMessage($rule)
    {
        switch ($rule){
            case 'email':
                return "E-mail incorreto!";
                break;
            case 'string':
                return "Informação Incorreta";
                break;
            case 'required':
                return "Campo Requerido";
                break;
            default:
                return false;
        }
    }
}