<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 31/10/18
 * Time: 04:39
 */

namespace Controller;

use Model\HomeManager;

class HomeController extends AbstractController
{
    public function index()
    {
        $homeManager = new HomeManager($this->getPdo());
        $homes = $homeManager->selectAll();

        return $this->twig->render('home.html.twig', ['homes' => $homes]);
    }
}