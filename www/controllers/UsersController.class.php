<?php

class UsersController
{
    private $users;

    public function __construct(Users $users)
    {
         $this->users = $users;
    }

    public function defaultAction()
    {
        echo "users default";
    }
    
    public function addAction()
    {
        $form = $this->users->getRegisterForm();

    
        $v = new View("addUser", "front");
        $v->assign("form", $form);
    }

    public function saveAction()
    {
        $form = $this->users->getRegisterForm();

        //Est ce qu'il y a des données dans POST ou GET($form["config"]["method"])
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];


        if ($_SERVER['REQUEST_METHOD']==$method && !empty($data)) {
            $validator = new Validator($form, $data);
            $form["errors"] = $validator->errors;

            if (empty($errors)) {
                $user->setFirstname($data["firstname"]);
                $user->setLastname($data["lastname"]);
                $user->setEmail($data["email"]);
                $user->setPwd($data["pwd"]);
                $user->save();
            }
        }

        $v = new View("addUser", "front");
        $v->assign("form", $form);
    }


    public function loginAction()
    {
        $form = $this->users->getLoginForm();



        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        if ($_SERVER['REQUEST_METHOD']==$method && !empty($data)) {
            $validator = new Validator($form, $data);
            $form["errors"] = $validator->errors;

            if (empty($errors)) {
                //Connexion avec token
                //$token = md5(substr(uniqid().time(), 4, 10)."mxu(4il");
            }
        }
    
        $v = new View("loginUser", "front");
        $v->assign("form", $form);
    }


    public function forgetPasswordAction()
    {
        $v = new View("forgetPasswordUser", "front");
    }
}
