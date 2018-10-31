<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 30/10/18
 * Time: 17:31
 */

namespace Controller;

use Model\Candy;
use Model\CandyManager;

/**
 * Class CandyController
 * @package Controller
 */
class CandyController extends AbstractController
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $candyManager = new CandyManager($this->getPdo());
        $candies = $candyManager->selectAll();

        return $this->twig->render('Candy/index.html.twig', ['candies' => $candies]);
    }
}
