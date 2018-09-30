<?php

namespace MitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * TmUser
 *
 * @ORM\Table(name="tm_user")
 * @ORM\Entity(repositoryClass="MitBundle\Repository\TmUserRepository")
 */
class TmUser implements UserInterface {

    /**
     * @var integer
     *
     * @ORM\Column(name="u_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uId;

    /**
     * @var string
     *
     * @ORM\Column(name="u_nom", type="string", length=256, nullable=false)
     */
    private $uNom;

    /**
     * @var string
     *
     * @ORM\Column(name="u_prenom", type="string", length=256, nullable=false)
     */
    private $uPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="u_mail", type="string", length=256, nullable=false)
     */
    private $uMail;

    /**
     * @var string
     *
     * @ORM\Column(name="u_password", type="string", length=256, nullable=false)
     */
    private $uPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="u_salt", type="string", length=256, nullable=false)
     */
    private $uSalt;

    /**
     * @var string
     *
     * @ORM\Column(name="u_role", type="array", length=256, nullable=false)
     */
    private $uRole;

    public function __construct() {
        $this->uSalt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    /**
     * Get uId
     *
     * @return integer
     */
    public function getUId() {
        return $this->uId;
    }

    /**
     * Set uNom
     *
     * @param string $uNom
     *
     * @return TmUser
     */
    public function setUNom($uNom) {
        $this->uNom = $uNom;

        return $this;
    }

    /**
     * Get uNom
     *
     * @return string
     */
    public function getUNom() {
        return $this->uNom;
    }

    /**
     * Set uPrenom
     *
     * @param string $uPrenom
     *
     * @return TmUser
     */
    public function setUPrenom($uPrenom) {
        $this->uPrenom = $uPrenom;

        return $this;
    }

    /**
     * Get uPrenom
     *
     * @return string
     */
    public function getUPrenom() {
        return $this->uPrenom;
    }

    /**
     * Set uMail
     *
     * @param string $uMail
     *
     * @return TmUser
     */
    public function setUMail($uMail) {
        $this->uMail = $uMail;

        return $this;
    }

    /**
     * Get uMail
     *
     * @return string
     */
    public function getUMail() {
        return $this->uMail;
    }

    /**
     * Set uPassword
     *
     * @param string $uPassword
     *
     * @return TmUser
     */
    public function setUPassword($uPassword) {
        $this->uPassword = $uPassword;

        return $this;
    }

    /**
     * Get uPassword
     *
     * @return string
     */
    public function getUPassword() {
        return $this->uPassword;
    }

    /**
     * Set uSalt
     *
     * @param string $uSalt
     *
     * @return TmUser
     */
    public function setUSalt($uSalt) {
        $this->uSalt = $uSalt;

        return $this;
    }

    /**
     * Get uSalt
     *
     * @return string
     */
    public function getUSalt() {
        return $this->uSalt;
    }

    /**
     * Set uRole
     *
     * @param string $uRole
     *
     * @return TmUser
     */
    public function setURole($uRole) {
        $this->uRole = $uRole;

        return $this;
    }

    /**
     * Get uRole
     *
     * @return string
     */
    public function getURole() {
        return $this->uRole;
    }

    public function eraseCredentials() {
        
    }

    public function getPassword(): string {
        
    }

    public function getRoles() {
        
    }

    public function getSalt() {
        
    }

    public function getUsername(): string {
        
    }

}
