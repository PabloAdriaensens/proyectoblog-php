<?php

namespace App\controllers;

class WhoController extends ControllerAuth
{
    public function index() {
        $this->viewManager->renderTemplate("who.view.html");
    }
}