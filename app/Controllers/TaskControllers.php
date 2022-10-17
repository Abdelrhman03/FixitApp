<?php

namespace App\Controllers;

use App\Core\Request;
use App\Database\fireBase;


class TaskControllers
{
    public function index()
    {
        isUser();
        if ($_SESSION["Role"] === "Admin") {
            redirect(home() . "/admin");
            return;
        }
        view("main");

    }


    public function login()
    {

        view("login");

    }

    public function create()
    {
        isUser();
    }

    public function update()
    {
        if (!$_POST) {
            back();
        }
        $id = Request::get("id");
    }

    public function search()
    {
        foreach ($_POST as $key => $item) {
            if($key === "user_id"){
                $_POST[$key] = (int)($item);
            }
            $_POST[$key] = addslashes($item);;

        }

        fireBase::check("users", $_POST);
    }

    public function delete()
    {
        session_destroy();
        redirect("login");
    }

}
