<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper->add('productName', 'text')
                ->add('car_mark', 'text')
                ->add('car_model', 'text')
                ->add('car_year', 'text')
                ->add('description', 'textarea')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('product_name');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('product_name')
                ->addIdentifier('car_mark')
                ->addIdentifier('car_model')
                ->addIdentifier('car_year')
                ->addIdentifier('description');
    }

}
