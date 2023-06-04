<?php

namespace App\Controller\Admin;

use App\Entity\Advice;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdviceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Advice::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('name'),
            TextEditorField::new('description'),
        ];
    }

}
