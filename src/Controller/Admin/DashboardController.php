<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateurs;
use App\Entity\Ordinateurs;
use App\Entity\Attributions;
use App\Entity\Horaires;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

 /**
  * Require ROLE_ADMIN for *every* controller method in this class.
  *
  * @IsGranted("ROLE_ADMIN")
  */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
     
        // 1. Obtain doctrine manager
        $em = $this->getDoctrine()->getManager();
        
        // 2. Setup repository of some entity
        $repoUtilisateurs = $em->getRepository(Utilisateurs::class);
        $repoOrdinateurs = $em->getRepository(Ordinateurs::class);
        $repoAttributions = $em->getRepository(Attributions::class);
        
        // 3. Query how many rows are there in the Articles table
        $totalUtilisateurs = $repoUtilisateurs->createQueryBuilder('a')
        
            // Filter by some parameter if you want
            // ->where('a.published = 1')
            ->select('count(a.id) as value')
            ->getQuery()
            ->getSingleScalarResult();

        $totalOrdinateurs = $repoOrdinateurs->createQueryBuilder('a')
        // Filter by some parameter if you want
            // ->where('a.published = 1')
            ->select('count(a.id) as value')
            ->getQuery()
            ->getSingleScalarResult();
            //attributions
            $totalAttributions = $repoAttributions->createQueryBuilder('a')
            // Filter by some parameter if you want
                // ->where('a.published = 1')
                ->select('count(a.id) as value')
                ->getQuery()
                ->getSingleScalarResult();

        

        return $this->render('welcome.html.twig',[
            'totalUtilisateurs' => $totalUtilisateurs,
            'totalOrdinateurs' => $totalOrdinateurs,
            'totalAttributions' => $totalAttributions
        ]);
        
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App Centre Culturel');
    }

    public function configureMenuItems(): iterable
    {
        return [
            yield MenuItem::section('Utilisateurs', 'fa fa-users'),
            yield MenuItem::linkToCrud('Tous les utilisateurs', 'fa fa-list', Utilisateurs::class),
            yield MenuItem::section('Ordinateurs', 'fa fa-desktop'),
            yield MenuItem::linkToCrud('Tous les postes', 'fa fa-list', Ordinateurs::class),
            yield MenuItem::section('Attributions postes', 'far fa-calendar-alt'),
            yield MenuItem::linkToCrud('Toutes les attributions', 'fa fa-list', Attributions::class),
            // yield MenuItem::section('Horaires', 'fa fa-clock-o'),
            // yield MenuItem::linkToCrud('Toutes les créneaux', 'fa fa-list', Horaires::class),
            
        ];
    }

}
