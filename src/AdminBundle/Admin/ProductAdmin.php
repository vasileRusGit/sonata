<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * Description of ProductAdmin
 */
class ProductAdmin extends AbstractAdmin{

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper->add('file', 'file', array('required' => false));
    }
    
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('imageName')
                ->add('file');
    }

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
