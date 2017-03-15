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
        
        // This does work:
        //$api->addCustomer("customername", "0622331122", "1122MM", "Kerkstraat 11", "", "Veldhoven", "NB", "NL", "Mr", "John", "Lennon", "0633221111", "31", "johnlennon@email.com", "Finance", "111");
        
        ?>
    </body>
</html>
