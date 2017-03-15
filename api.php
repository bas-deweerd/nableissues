<?php

/**
 * Class which allows communication with the N-able API.
 * See @link: https://rmm.cloudnet.services/dms/javadocei2/index.html for API JavaDoc
 * @author bas de weerd
 *
 */
class api {
    private $username;
    private $password;
    private $wsdl;
    private $soapClient;

    public function __construct() {
        $this->username = 'productadmin@n-able.com';
        $this->password = ''; // Removed for demonstration purposes

        $this->wsdl = 'https://rmm.cloudnet.services/dms2/services2/ServerEI2?wsdl';
        $this->soapClient = new Soapclient($this->wsdl, array(
            'soap_version' => SOAP_1_2,
            'trace' => TRUE
                )
        );
    }
    
    /**
     * Adds a new customer or site under the specified SO/customer.
     * Does not check input validity.
     * @param customerName - Desired name for the new customer or site. Maximum of 120 characters.
     * @param telephone - Phone number of the customer/site
     * @param zip/postalcode - (Value) Customer's zip/ postal code
     * @param street1 - (Value) Address line 1 for the customer. Maximum of 100 characters
     * @param street2 - (Value) Address line 2 for the customer. Maximum of 100 characters
     * @param city - (Value) Customer/site's city
     * @param province - (Value) Customer/site's state/ province
     * @param country - (Value) Customer's country. Two character country code, see http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 for a list of country codes
     * @param contactTitle - Customer/site contact's title
     * @param contactFirstName - Customer/site contact's first name
     * @param contactLastName - Customer/site contact's first name
     * @param contactTelephone - Customer/site contact's telephone number
     * @param contactTelephoneExtension - Customer/site contact's telephone extension
     * @param contactEmail - Customer/site contact's email. Maximum of 100 characters
     * @param contactDepartment - Customer/site contact's department
     * @param parentID - ID of the parent (SO/customer)
     */
    public function addCustomer(
    		$customerName,
    		$telephone,
    		$zip,
    		$street1,
    		$street2,
    		$city,
    		$province,
    		$country,
    		$contactTitle,
    		$contactFirstName,
    		$contactLastName,
    		$contactTelephone,
    		$contactTelephoneExtension,
    		$contactEmail,
    		$contactDepartment,
    		$parentID
    		){
        $params = array(
            'username' => $this->username,
            'password' => $this->password,
            'settings' => array(
                array('key' => 'customername',		'value' => $customerName),
            	array('key' => 'telephone', 		'value' => $telephone),
            	array('key' => 'zip/postalcode', 	'value' => $zip),
            	array('key' => 'street1', 			'value' => $street1),
            	array('key' => 'street2', 			'value' => $street2),
            	array('key' => 'city', 				'value' => $city),
            	array('key' => 'state/province', 	'value' => $province),
            	array('key' => 'country', 			'value' => $country),
            	array('key' => 'title', 			'value' => $contactTitle),
            	array('key' => 'firstname', 		'value' => $contactFirstName),
            	array('key' => 'lastname', 			'value' => $contactLastName),
            	array('key' => 'contact_telephone', 'value' => $contactTelephone),
            	array('key' => 'ext', 				'value' => $contactTelephoneExtension),
            	array('key' => 'email', 			'value' => $contactEmail),
            	array('key' => 'department', 		'value' => $contactDepartment),      	
            	array('key' => 'parentid', 			'value' => $parentID)
            )
        );
        $this->soapClient->customerAdd($params);
    }
    
    /**
     * Adds a new user to specified SO/customer/site.
     * Does NOT check input validity.
     * @param Login email for the new user. Maximum of 100 characters $email
     * @param Password for the new user. Must meet configured password complexity level $password
     * @param The customerID of the site/customer/SO that the user is associated with $customerId
     * @param User's first name. $firstName
     * @param User's last name $lastName
     * @return The ID number of the new user
     */
    public function addUser(
    		$email,
    		$password,
    		$customerId,
    		$firstName,
    		$lastName
    		){
        $params = array(
            'username' => $this->username,
            'password' => $this->password,
            'settings' => array(
                array('key' => 'email', 		'value' => $email),
                array('key' => 'password', 		'value' => $password),
                array('key' => 'customerID', 		'value' => '111'),
                array('key' => 'firstname', 		'value' => $firstName),
                array('key' => 'lastname', 		'value' => $lastName)
            )
        );
        $this->soapClient->userAdd($params);
    }
    
    /**
     * Works on a server with build V10 instead of V11
     */
        public function addUserTest(){
        $username2 = 'bas.de.weerd@copaco.com';
        $password2 = ''; // Removed for demonstration purposes

        $wsdl2 = 'https://ncentral.weritech.nl/dms2/services2/ServerEI2?wsdl';
        $soapClient2 = new Soapclient($wsdl2, array(
            'soap_version' => SOAP_1_2,
            'trace' => TRUE
            )
        );
        
        $params = array(
            'username' => $username2,
            'password' => $password2,
            'settings' => array(
                array('key' => 'email',         'value'=> 'testmail@mail.com'),
                array('key' => 'password',      'value'=> 'p@sSw0rd'),
                array('key' => 'customerID',    'value'=> '158'), //TEST CUSTOMER
                array('key' => 'firstname',     'value'=> 'firstname'),
                array('key' => 'lastname',      'value'=> 'lastname'),
                array('key' => 'type',          'value'=> 'Admin')
            )
        );
        $soapClient2->userAdd($params);
    }
    
}
