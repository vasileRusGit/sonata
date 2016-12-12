<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper->add('title', 'text')
                ->add('body', 'textarea')
                ->add('draft', 'choice', array(
//                            'class' => 'AdminBundle\Entity\BlogPost',
                    'choices_as_values' => true,
                    'choices' => array('Audi' => 'Audi', 'BMW' => 'BMW', 'Volfwagen' => 'Volfwagen'),
                    'required' => false
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('title')->add('body');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('title')->addIdentifier('body')->addIdentifier('draft');
    }

}
