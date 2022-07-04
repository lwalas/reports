<?php


namespace App\Controller;



use App\Entity\Export;
use App\Entity\Filter;
use App\Form\FilterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ReportController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function home(Request $request) : Response{

        $filter = new Filter();

        $form = $this->createForm(FilterType::class, $filter);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $export = $em->getRepository(Export::class)->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            $export = $em->getRepository(Export::class)
                ->getByDateAndPlace(
                    $form['dateFrom']->getData()->format('Y-m-d H:i:s'),
                    $form['dateTo']->getData()->format('Y-m-d H:i:s'),
                    $form['place']->getData());
        }

        return $this->render('report/index.html.twig', [
            'form' => $form->createView(),
            'export' => $export
        ]);

    }

}