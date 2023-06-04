<?php

namespace App\Controller\Admin;

use App\Entity\Botaniste;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BotanisteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Botaniste::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('email')->onlyOnIndex(),
            ArrayField::new('roles'),
        ];
    }

}
