<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Adresses;
use Model\AdressesManager;

/**
 * Class AdressesController
 *
 */
class AdressesController extends AbstractController
{

    public function index()
    {
        $bonbonDexManager = new AdressesManager($this->getPdo());
        $bonbonDex = $bonbonDexManager->selectAll();

        return $this->twig->render('Adresses/index.html.twig', ['bonbonDex' => $bonbonDex]);
    }


    /**
     * Display item informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function show(int $id)
    {
        $bonbonDexManager = new AdressesManager($this->getPdo());
        $bonbonDex = $bonbonDexManager->selectOneById($id);

        return $this->twig->render('Adresses/show.html.twig', ['bonbonDex' => $bonbonDex]);
    }


    /**
     * Display item edition page specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function edit(int $id): string
    {
        $bonbonDexManager = new AdressesManager($this->getPdo());
        $bonbonDex = $bonbonDexManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bonbonDex->setTitle($_POST['title']);
            $bonbonDexManager->update($bonbonDex);
        }

        return $this->twig->render('Adresses/edit.html.twig', ['bonbonDex' => $bonbonDex]);
    }


    /**
     * Display item creation page
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bonbonDexManager = new AdressesManager($this->getPdo());
            $bonbonDex = new Adresses();
            $bonbonDex->setTitle($_POST['title']);
            $id = $bonbonDexManager->insert($bonbonDex);
            header('Location:/bonbonDex/' . $id);
        }

        return $this->twig->render('Adresses/add.html.twig');
    }


    /**
     * Handle item deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $bonbonDexManager = new AdressesManager($this->getPdo());
        $bonbonDexManager->delete($id);
        header('Location:/');
    }
}
