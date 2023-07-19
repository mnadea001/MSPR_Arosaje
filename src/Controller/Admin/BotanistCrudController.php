<?php

namespace App\Controller\Admin;

use App\Entity\Botanist;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BotanistCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Botanist::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            // TextField::new('title'),
            // TextEditorField::new('description'),
            TextField::new('email'),
            TextField::new('username'),
            
            TextField::new('address'),
            
            TextField::new('city'),
            
            TextField::new('country'),
            ArrayField::new('roles'),
        ];
    }

}
