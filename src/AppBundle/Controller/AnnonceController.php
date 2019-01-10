<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Annonce;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Jérémy Lefebvre <jeremy2@widop.com>
 *
 * @Route("/annonces")
 */
class AnnonceController extends Controller
{
    /**
     * @Template
     *
     * @param Annonce $annonce
     *
     * @Route("/view/{id}", name = "annonce_view")
     *
     * @return array
     */
    public function view(Annonce $annonce)
    {
        return ['annonce' => $annonce];
    }
}
