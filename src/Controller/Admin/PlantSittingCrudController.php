<?php

namespace App\Controller\Admin;

use App\Entity\PlantSitting;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Validator\Constraints\DateTime;

class PlantSittingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlantSitting::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            // TextEditorField::new('description'),
        ];
    }
    
}
