<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'api.php';
        
        $api = new api();
        
        // This doesn't work:
        $api->addUser('testmail@mail.com', 'pAs_w0rdd', '111', 'John', 'Lennon'); // 111 is the ID of an existing customer
        
        // This does work (adding customer instead of user):
        //$api->addCustomer("customername", "0622331122", "1122MM", "Kerkstraat 11", "", "Veldhoven", "NB", "NL", "Mr", "John", "Lennon", "0633221111", "31", "johnlennon@email.com", "Finance", "111");
        
        // This also works (adding user on different server with build V 10.2.0.1710)
        // $api->addUserTest(); // parameters are hardcoded for demo purposes in the api.php class
        ?>
    </body>
</html>
