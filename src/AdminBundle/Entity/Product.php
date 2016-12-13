<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Product
 * 
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProductRepository")
 */
class Product {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="imageName", type="string", length=255)
     */
    protected $imageName;

    protected $file;

    function getId() {
        return $this->id;
    }

    function getImageName() {
        return $this->imageName;
    }

    function getFile() {
        return $this->file;
    }

    function setImageName($imageName) {
        $this->imageName = $imageName;
    }

    function setFile($file) {
        $this->file = $file;
    }

    public function getAbsolutePath() {
        return null === $this->imageName ? null : $this->getUploadRootDir() . '/' . $this->imageName;
    }

    public function getWebPath() {
        return null === $this->imageName ? null : $this->getUploadDir() . '/' . $this->imageName;
    }

    protected function getUploadRootDir($basepath) {
        // the absolute directory path where uploaded documents should be saved
        return $basepath . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/products';
    }

    public function upload($basepath) {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        if (null === $basepath) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and then the target filename to move to
        $this->file->move($this->getUploadRootDir($basepath), $this->file->getClientOriginalName());

        // set the path property to the filename where you'ved saved the file
        $this->setImageName($this->file->getClientOriginalName());

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

}
