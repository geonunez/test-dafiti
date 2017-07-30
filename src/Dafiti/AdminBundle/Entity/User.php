<?php

 namespace Dafiti\AdminBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

 /**
 * User Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 * @ORM\HasLifecycleCallbacks()
 */
 class User extends BaseUser
 {
    /**
     * Id.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    protected $id;

    /**
     * Hashes password.
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function hashPassword()
    {
        if (strlen($this->password) !== 60) {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        }
    }

    /**
     * Gets entity representation as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->username;
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
}
