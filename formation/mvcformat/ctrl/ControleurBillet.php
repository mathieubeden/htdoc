<?php

require_once 'models/Billet.php';
require_once 'views/vue.php';

class ControleurBillet
{

    private $billet;

    public function __construct()
    {
        $this->billet = new Billet();
    }

    public function postuler($post)
    {
        if ($post['debut'] > $post['fin']) {
            throw new Exception("la date ne fonctionne que dans une ligne temporelle inversé");
        }
        $this->billet->postuler($post);
    }

    public function debilleter($ids)
    {
        // supression
        foreach ($ids as $id) {
            $this->billet->suprimerBillet($id);
        }
    }

    public function modifier($post)
    {

        for ($i = 1; $i <= count($post['id']); $i++) {
            $past['nom'] = $post['nom'][$i - 1];
            $past['prenom'] = $post['prenom'][$i - 1];
            $past['intit'] = $post['intit'][$i - 1];
            $past['debut'] = $post['debut'][$i - 1];
            $past['fin'] = $post['fin'][$i - 1];
            $past['id'] = $post['id'][$i - 1];
            $past['email'] = $post['email'][$i - 1];
            if ($past['debut'] > $past['fin']) {
                throw new Exception("la date ne fonctionne que dans une ligne temporelle inversé");
            }
            $this->billet->modifier($past);
        }
    }
}
