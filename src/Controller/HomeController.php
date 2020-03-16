<?php

namespace App\Controller;

use App\Service\subTitleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $symfony4_Mastering_Doctrine_Relations=[
        "https://symfonycasts.com/screencast/doctrine-relations/comment-entity",
        "https://symfonycasts.com/screencast/doctrine-relations/many-to-one-relation",
        "https://symfonycasts.com/screencast/doctrine-relations/saving-relations",
        "https://symfonycasts.com/screencast/doctrine-relations/fetching-relations",
        "https://symfonycasts.com/screencast/doctrine-relations/owning-vs-inverse",
        "https://symfonycasts.com/screencast/doctrine-relations/fixture-references",
        "https://symfonycasts.com/screencast/doctrine-relations/awesome-random-fixtures",
        "https://symfonycasts.com/screencast/doctrine-relations/orderby-extra-lazy",
        "https://symfonycasts.com/screencast/doctrine-relations/orderby-extra-lazy",
        "https://symfonycasts.com/screencast/doctrine-relations/collection-criteria",
        "https://symfonycasts.com/screencast/doctrine-relations/twig-block-tricks",
        "https://symfonycasts.com/screencast/doctrine-relations/twig-extensions-library",
        "https://symfonycasts.com/screencast/doctrine-relations/search-form",
        "https://symfonycasts.com/screencast/doctrine-relations/join-n-plus-one",
        "https://symfonycasts.com/screencast/doctrine-relations/pagination",
        "https://symfonycasts.com/screencast/doctrine-relations/relationship-types",
        "https://symfonycasts.com/screencast/doctrine-relations/many-to-many",
        "https://symfonycasts.com/screencast/doctrine-relations/many-to-many-save",
        "https://symfonycasts.com/screencast/doctrine-relations/many-to-many-joins",
    ];


    /**
     * @Route("/")
     */
    public function index(subTitleService $titleService)
    {
        return $this->render("index.html.twig",[
            "posts"=>$titleService->showSubTitle($this->symfony4_Mastering_Doctrine_Relations)
        ]);
    }

}