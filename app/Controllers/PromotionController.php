<?php

namespace App\Controllers;

use App\Models\PromotionModel;
use CodeIgniter\Controller;
use Elasticsearch\ClientBuilder;

class PromotionController extends BaseController
{
    public function index()
    {
         // Charger la bibliothèque de formulaire
         helper('form');
         
        return view('promotion_form');
    }

    public function savePromotion()
    {
        $promotionModel = new PromotionModel();
        $promotion = $this->request->getPost('promotion');

        $data = [
            'promotion' => $promotion
        ];

        // Enregistrement dans la base de données
        $promotionModel->insert($data);

        // Enregistrement dans Elasticsearch
        $client = \Elastic\Elasticsearch\ClientBuilder::create()
         ->setHosts(['localhost:9200'])
         ->setBasicAuthentication('elastic', 'NwIqVVd=BYhLmVPsJWgs')
         ->build();
        $params = [
            'index' => 'promotions',
            'body' => $data
        ];
        $client->index($params);

        // Redirection ou affichage d'un message de succès
        return redirect()->to('/promotion');
    }
}
