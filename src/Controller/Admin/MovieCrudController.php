<?php

namespace App\Controller\Admin;

use App\Entity\Movie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MovieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movie::class;
    }

    public function configureFields(string $pageName): iterable
    {

        //pour eviter de mettre le chemin de l'image en dur
        $mappingsParam = $this->getParameter('vich_uploader.mappings');
        
        $moviesImagePath = $mappingsParam['movies']['uri_prefix'];

        yield TextField::new('name', 'Nom');
        yield DateField::new('release_date', 'Date de sortie');
        yield TimeField::new('duration', 'Durée');
        yield TextEditorField::new('synopsis', 'synopsis');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();// N'AFFICHE APS LE FORMULAIRE DANS LA LISTE
        //met l'image dans movie mais pas dans le form
        yield ImageField::new('imageName')->setBasePath($moviesImagePath)->hideOnForm();
        yield AssociationField::new('directors', 'Réalisateur');
        yield AssociationField::new('genres', 'Genre'); 
    }
}
