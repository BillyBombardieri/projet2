<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Entity\Reservation;
use App\Form\Vehicule1Type;
use App\Form\ReservationType;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Repository\ReservationRepository;

/**
 * @Route("/vehicule")
 */
class VehiculeController extends AbstractController
{
    

    /**
     * @Route("/new", name="vehicule_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(Vehicule1Type::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicule);
            $entityManager->flush();

            return $this->redirectToRoute('vehicule_index');
        }

        return $this->render('vehicule/new.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vehicule_show", methods={"GET"})
     */
    public function show(Vehicule $vehicule): Response
    {
        return $this->render('vehicule/show.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }

    

    /**
     * @Route("/{id}/edit", name="vehicule_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vehicule $vehicule): Response
    {
        $form = $this->createForm(Vehicule1Type::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehicule_index');
        }

        return $this->render('vehicule/edit.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vehicule_delete", methods={"POST"})
     */
    public function delete(Request $request, Vehicule $vehicule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vehicule->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vehicule_index');
    }

    /**
     * @Route("/", name="vehiculedispo", methods={"GET"})
     */
    public function vehiculedispo(VehiculeRepository $vehiculeRepository): Response
    {
        return $this->render('vehicule/indexall.html.twig', [
            'vehicules' => $vehiculeRepository->findAll(),
        ]);
    }

    



    /**
     * @Route("/user/{id}/reservation", name="vehicule_reservation", methods={"GET","POST"})
     */
    public function reservation(Request $request, Vehicule $vehicule, int $id): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(reservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager(); 
            $entityManager->persist($reservation);
            $entityManager->flush();

            
            $entityManager = $this->getDoctrine()->getManager();
            $product = $entityManager->getRepository(Vehicule::class)->find($id);
            $product->setDisponible(0);
            $entityManager->flush();
            

            return $this->redirectToRoute('vehicule_index');
        }

        return $this->render('vehicule/reservation.html.twig', [
            'vehicule' => $vehicule,
            'reservationform' => $form->createView(),
        ]);
    }

    

    
   
}
