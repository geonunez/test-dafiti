<?php

namespace Dafiti\AdminBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
* Product Entity
*
* @ORM\Entity
* @ORM\Table(name="product")
* @ORM\HasLifecycleCallbacks()
*/
class Product
{

    const IMAGE_FOLDER = "uploaded/products";
    /**
     * Id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    protected $id;

    /**
     * Name
     *
     * @ORM\Column(type="string", length=50)
     *
     * @var string
     */
    protected $name;

    /**
     * Description
     *
     * @ORM\Column(type="text")
     *
     * @var string
     */
    protected $description;

    /**
     * Price
     *
     * @ORM\Column(type="decimal", scale=2)
     *
     * @var float
     */
    protected $price;

    /**
     * Image
     *
     * @ORM\Column(type="string", length=1000)
     *
     * @var string
     */
    protected $image;

    /**
     * Image File.
     *
     * @var  UploadedFile
     */
    protected $imageFile;

    /**
     * Created.
     *
     * @ORM\Column(type="datetime")
     *
     * @var DateTime
     */
    protected $created;

    /**
     * Modified.
     *
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var DateTime
     */
    protected $modified;

    /**
     * Gets entity representation as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets description.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets price.
     *
     * @param float $price
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets image path.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets image.
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

   /**
     * @return UploadedFile
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param UploadedFile $imageFile
     *
     * @return self
     */
    public function setImageFile(UploadedFile $imageFile = null)
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    /**
     * Uploads image.
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function uploadImageFile()
    {
        if (!is_null($this->getImageFile())) {
            $this->getImageFile()->move(
                Product::IMAGE_FOLDER,
                $this->getImageFile()->getClientOriginalName()
            );
            $this->image = $this->getImageFile()->getClientOriginalName();
            $this->setImageFile(null);
        }
    }

    /**
     * Gets Created.
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets created.
     *
     * @ORM\PrePersist
     */
    public function setCreated()
    {
        $this->created = new DateTime();
    }

    /**
     * Gets Modified.
     *
     * @return DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Sets Modified.
     *
     * @ORM\PreUpdate
     */
    public function setModified()
    {
        $this->modified = new DateTime();
    }

}
