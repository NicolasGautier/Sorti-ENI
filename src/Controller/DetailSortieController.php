<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailSortieController extends AbstractController
{
    /**
     * @Route("sortie/{id}", name="detail_sortie" requirements={"id":"\d+"})
     * @param $id
     * @param EntityManagerInterface $emi
     * @return Response
     */
    public function detailSortie ($id, EntityManagerInterface $emi)
    {
        $sortie = $emi->getRepository(Sortie::class)->find($id);
        if ($sortie ==null){
            throw $this ->createNotFoundException("La sortie est absente de la base de données.");
        }
        return $this->render('detail_sortie/index.html.twig', [
           'infosSortie' => $sortie
        ]);
    }
}
