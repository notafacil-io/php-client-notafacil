<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\Traits\RequestTrait;
/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class UserService extends BaseService
{
    use RequestTrait;

   

    public function __construct(Array $credentialsNotaFacil)
    {
        parent::__construct();
        $this->credentialsNotaFacil = $credentialsNotaFacil;
    }

    public function loggedData(): array
    {
        return $this->request( $this->base_url() . $this->endpoint->user->logged );
    }
    
    public function listAll(): array
    {
        return $this->request( $this->base_url() . $this->endpoint->user->listAll );
    }

    public function showByID($idUser): array
    {
        return $this->request( $this->base_url() . str_replace(':id', $idUser , $this->endpoint->user->byID) );
    }

    public function addUser($payload): array
    {
        return $this->request( $this->base_url() . $this->endpoint->user->register, 'POST', $payload);
    }

    public function updateUser($idUser, $payload): array
    {
        return $this->request( $this->base_url() . str_replace(':id', $idUser , $this->endpoint->user->update), 'PUT', $payload);
    }

    public function deleteUser($idUser): array
    {
        return $this->request( $this->base_url() . str_replace(':id', $idUser , $this->endpoint->user->delete), 'DELETE');
    }

   
   

    

    

}
