<?php

namespace App\Controller\Admin;

use App\Entity\GroupeHotelier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GroupeHotelierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GroupeHotelier::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
