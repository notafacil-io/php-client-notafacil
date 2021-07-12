<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\Traits\RequestTrait;
use NotaFacil\Common\Resources\NotaFacilResource;
/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class CustomersNotaFacil extends BaseService
{
    use RequestTrait;
                                                                                                                                                                                                               
    public function __construct(Array $credentialsNotaFacil)
    {
        parent::__construct();
        $this->credentialsNotaFacil = $credentialsNotaFacil;
    }

    public function addCustomer($payload): NotaFacilResource
    {
        return $this->request( $this->base_url() .  $this->endpoint->customers->register, 'POST', $payload);
    }

    public function updateCustomer($idCustomer, $payload): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCustomer , $this->endpoint->customers->update), 'PUT', $payload);
    }

    public function showByID($idCustomer): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCustomer , $this->endpoint->customers->byID ));
    }
    
    public function deleteCustomer($idCustomer): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCustomer , $this->endpoint->customers->delete), 'DELETE');
    }

    public function listAll(): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->customers->listAll );
    }



    public function addAddlAddress($idCustomer, $payload): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCustomer , $this->endpoint->customers->additional->address->register), 'POST', $payload);
    }

    public function updateAddlAddress($idCustomer, $idAddress, $payload): NotaFacilResource
    {

        return $this->request( $this->base_url() . str_replace([':id_customer',':id_address'], [$idCustomer, $idAddress] , $this->endpoint->customers->additional->address->update), 'PUT', $payload);
    }

    public function deleteAddlAddress($idCustomer, $idAddress): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace([':id_customer',':id_address'], [$idCustomer, $idAddress] , $this->endpoint->customers->additional->address->delete), 'DELETE');
    }
    
    public function listAllAddlAddress($idCustomer): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id_customer', $idCustomer , $this->endpoint->customers->additional->address->listAll));
    }

    public function getAddlAddressByID($idCustomer, $idAddress): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace([':id_customer',':id_address'], [$idCustomer, $idAddress] , $this->endpoint->customers->additional->address->byID));
    }


   
    public function addAddlPhone($idCustomer, $payload): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCustomer , $this->endpoint->customers->additional->telephone->register), 'POST', $payload);
    }

    public function updateAddlPhone($idCustomer, $idPhone, $payload): NotaFacilResource
    {

        return $this->request( $this->base_url() . str_replace([':id_customer',':id_telephone'], [$idCustomer, $idPhone] , $this->endpoint->customers->additional->telephone->update), 'PUT', $payload);
    }

    public function deleteAddlPhone($idCustomer, $idPhone): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace([':id_customer',':id_telephone'], [$idCustomer, $idPhone] , $this->endpoint->customers->additional->telephone->delete), 'DELETE');
    }
    
    public function listAllAddlPhone($idCustomer): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id_customer', $idCustomer , $this->endpoint->customers->additional->telephone->listAll));
    }
    
    public function getAddlPhoneByID($idCustomer, $idPhone): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace([':id_customer',':id_telephone'], [$idCustomer, $idPhone] , $this->endpoint->customers->additional->telephone->byID));
    }
    
   

}
