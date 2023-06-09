<?php

namespace App\Controller\Admin;

use App\Entity\Plant;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plant::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }

}
