<?php

namespace App\Controller\Admin;
use App\Entity\Attributions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AttributionsCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Attributions::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IntegerField::new('id','ID')->onlyOnIndex(),
            DateField::new('Date'),
            AssociationField::new('utlisateur'),
            AssociationField::new('ordinateur'),
            AssociationField::new('horaires'),
                 
        ];
    }
 
}
