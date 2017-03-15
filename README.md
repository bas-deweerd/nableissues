# nableissues

Exception thrown=

Fatal error: Uncaught SoapFault exception: [soap:Receiver] 5000 java.lang.NullPointerException; nested exception is: java.lang.NullPointerException in C:\xampp\htdocs\apitest\api.php:283 Stack trace: #0 C:\xampp\htdocs\apitest\api.php(118): SoapClient->__call('userAdd', Array) #1 C:\xampp\htdocs\apitest\api.php(118): SoapClient->userAdd(Array) #2 C:\xampp\htdocs\apitest\index.php(14): api->addUser('testmail@mail.c...', 'pAs_w0rdd', '111', 'John', 'Lennon') #3 {main} thrown in C:\xampp\htdocs\apitest\api.php on line 118

See index.php for methods which work/ don't work
api.php contains methods to communicate with the n-able API
