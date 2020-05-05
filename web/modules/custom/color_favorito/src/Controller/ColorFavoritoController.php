<?php

namespace Drupal\color_favorito\Controller;

class ColorFavoritoController{
    public function index(){
        //TODO: Mostrar el color favorito aca

        return[
            '#theme' => 'color_favorito',
            '#title' => 'Muestra tu color favorito',
            '#color' => 'Verde'
        ];
    }
}