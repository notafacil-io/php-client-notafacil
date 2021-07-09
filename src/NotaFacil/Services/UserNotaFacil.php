<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\Traits\RequestTrait;
use NotaFacil\Common\Resources\NotaFacilResource;
/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class UserNotaFacil extends BaseService
{
    use RequestTrait;

   

    public function __construct(Array $credentialsNotaFacil)
    {
        parent::__construct();
        $this->credentialsNotaFacil = $credentialsNotaFacil;
    }

    public function loggedData(): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->user->logged );
    }
    
    public function listAll(): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->user->listAll );
    }

    public function showByID($idUser): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idUser , $this->endpoint->user->byID) );
    }

    public function addUser($payload): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->user->register, 'POST', $payload);
    }

    public function updateUser($idUser, $payload): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idUser , $this->endpoint->user->update), 'PUT', $payload);
    }

    public function deleteUser($idUser): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idUser , $this->endpoint->user->delete), 'DELETE');
    }

   
   

    

    

}
