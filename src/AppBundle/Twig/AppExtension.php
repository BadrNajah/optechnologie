<?php 
// src/AppBundle/Twig/AppExtension.php
namespace AppBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('base64_encode', [$this, 'base64_en']),
        ];
    }

    public function base64_en($tab,$id)
    {
       for($i = 0 ; $i < sizeof($tab) ; $i++ ){
           if($tab[$i].client_id == $id){
               return $tab[$i].total_avance;
           }
       }
    }
}