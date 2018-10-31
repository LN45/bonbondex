<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 30/10/18
 * Time: 17:31
 */

namespace Controller;
use Model\CandyManager;
use Model\Candy;

class CandyController extends AbstractController
{

    public function show(){

        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://fr.openfoodfacts.org/',
        ]);

// Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'category/bonbons/1.json');

// or
// Send request https://foo.com/api/test?key=maKey&name=toto
       // $response = $client->request('GET', 'test', [
              //  'key'  => 'maKey',
              //  'name' => 'toto',
          //  ]
      //  );

        $body = $response->getBody();
        $body->getContents();

        $jsons1=json_decode($body,true);
        $jsons=$jsons1['products'];


        //return $json['products'][0]['image_small_url'];
        return $this->twig->render('Candy/show.html.twig',['jsons'=>$jsons]);
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $candyManager = new CandyManager($this->getPdo());
            $candy = new Candy();
            $candy->setId($_POST['id']);
            $candy->setName($_POST['name']);
            $candy->setUrl($_POST['url']);
            $id = $candyManager->insert($candy);
            header('Location:/');
        }

        return $this->twig->render('Candy/add.html.twig');
    }
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
