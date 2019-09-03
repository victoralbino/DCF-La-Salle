<?php


namespace App\Controller;


use Enumeration\Rules;

class Controller
{
    public function view(String $view)
    {
        require DIR_PUBLIC . "views\\" . $view . ".php";
    }

    public function redirect($url, array $variables = [], $errors = false)
    {
        $params = '?';
        if ($errors){
            foreach ($variables as $error){
                $params .= $error['input'] . '=' . $error['rule'] .'&';
            }
        }else{
            if (count($variables) > 0){
                foreach ($variables as $key => $value){
                    $params .= $key . '=' . $value . '&';
                }
            }
        }
        header('Location:' . $url . $params);
    }


    public function validation($data, $rule)
    {
        $data = trim($data);
        $data = stripslashes($data);

        switch ($rule){
            case 'email':
                return filter_var($data, FILTER_VALIDATE_EMAIL) != NULL ? true : false;
                break;
            case 'string':
                return is_string($data) && $data != null;
                break;
            case 'required':
                return (isset($data) && $data != null && !empty($data)) ? true : false;
                break;
            default:
                return false;
        }
    }

    public function validate($request, $rules)
    {
        $errors = [];
        foreach ($request as $key => $data){
            if (!$this->validation($data, $rules[$key])){
                array_push($errors, [
                    "input" => $key,
                    "rule" => $rules[$key],
                    "message" => Rules::validationMessage($rules[$key])
                ]);
            }
        }

        return [count($errors) > 0 ? true : false, $errors];
    }
}