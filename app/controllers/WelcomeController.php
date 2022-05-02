<?php 

class WelcomeController extends Controller {

    public function index() {
        self::view('others/welcome');
    }
}