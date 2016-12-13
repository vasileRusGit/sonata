<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        // for loop years
        for ($i = 2016; $i >= 1970; $i--) {
            $time = new \DateTime('now');
            $years[$i] = (string)$i;
        }
        
//        var_dump($years);die;

        $formMapper->add('product_name', 'text')
                ->add('car_mark', 'choice', array(
                    'choices_as_values' => true,
                    'choices' => array('Audi' => 'Audi', 'BMW' => 'BMW', 'Volfwagen' => 'Volfwagen'),
                    'required' => false))
                ->add('car_model', 'text')
                ->add('car_year', 'choice', array(
//                    'choices_as_values' => true,
                    'choices' => $years))
                ->add('file', 'file', array('required' => false))
                ->add('description', 'textarea')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('product_name');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('product_name')
                ->add('car_mark')
                ->add('car_model')
                ->add('car_year')
                ->add('imageName')
                ->add('description')
        ;
    }

    // IMAGE UPLOAD
    public function prePersist($product) {
        $this->saveFile($product);
    }

    public function preUpdate($product) {
        $this->saveFile($product);
    }

    public function saveFile($product) {
        $basepath = $this->getRequest()->getBasePath();
        $product->upload($basepath);
    }

}
