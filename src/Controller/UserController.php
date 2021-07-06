<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\UserType;
use App\Entity\Reservation;
use App\Entity\Vehicule;
use App\Repository\VehiculeRepository;
use App\Repository\ReservationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Form\Vehicule1Type;
use App\Form\ReservationType;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("user/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("user/{id}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * @Route("user/{idus}/reservations", name="mesreservations", methods={"GET","POST"})
     */
    public function mesreservations(Request $request, VehiculeRepository $vehiculerepository, ReservationRepository $reservationrepository,  int $idus): Response
    {

        $reservation = $reservationrepository->findBy(['iduser' => $idus]);
        
        
        
        return $this->render('reservation/mesreservations.html.twig', [
            'vehicules' => $reservation,
        ]);
    }

   
}
