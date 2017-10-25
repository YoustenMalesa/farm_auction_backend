<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

/**
 * Get all customers endpoint
 * @return returns all of the users
 */
$app->get('/api/users', function(Request $request, Response $response){
    $sql = "select * from tbl_users";

    try {
        $db = new DatabaseAccess();
        $db = $db->connect();

        $stmt  = $db->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $utils = new ResponseUtils();
        $utils->setCode(1);
        $utils->setMessage('success');
        $utils->setResponse($users);

        echo json_encode($utils->exponse()); 

    }catch(PDOException $ex) {
        $utils = new ResponseUtils();
        $utils->setCode(0);
        $utils->setMessage('A databse error occured');
        $utils->setResponse($utils->expose());
    }
});


/**
 * Get user by ID endpoint
 * @return returns the user at the specified ID
 * @param The ID of the user
 */
$app->get('/api/users/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "select * from tbl_users where id=$id";

    try {
        $db = new DatabaseAccess();
        $db = $db->connect();

        $stmt  = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $utils = new ResponseUtils();
        $utils->setCode(1);
        $utils->setMessage('success');
        $utils->setResponse($user);

        echo json_encode($utils->exponse()); 

    }catch(PDOException $ex) {
        $utils = new ResponseUtils();
        $utils->setCode(0);
        $utils->setMessage('A databse error occured');
        $utils->setResponse($utils->expose());
    }
});


/**
 * Update user by ID
 * @return returns the results of the operation
 * @param The ID of the user to update
 */
$app->put('/api/users/update/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "select * from tbl_users where id=$id";

    try {
        $db = new DatabaseAccess();
        $db = $db->connect();

        $stmt  = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $utils = new ResponseUtils();
        $utils->setCode(1);
        $utils->setMessage('success');
        $utils->setResponse($user);

        echo json_encode($utils->exponse()); 

    }catch(PDOException $ex) {
        $utils = new ResponseUtils();
        $utils->setCode(0);
        $utils->setMessage('A databse error occured');
        $utils->setResponse($utils->expose());
    }
});


/**
 * Register a user
 * 
 */
$app->post('/api/users/register', function(Request $request, Response $response){
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $id_number = $request->getParam('id_number');
    $cell_number = $request->getParam('cell_number');
    $gender = $request->getParam('gender');
    $email = $request->getParam('email');
    $password = $request->getParam('password');
    $street_info = $request->getParam('street_info');
    $surburb = $request->getParam('surburb');
    $postal_code = $request->getParam('postal_code');
    $city = $request->getParam('city');
    

    $user_sql = "INSERT INTO tbl_user (pk_email,full_names,last_name,id_number,gender,cell_number) VALUES (:email,:first_name,:last_name,:id_number,:gender,:cell_number)";
    $address_sql = "INSERT INTO tbl_address (fk_email,street_info,surburb,city,postal_code) VALUES (:email,:street_info,:surburb,:city,:postal_code)";
    $login_sql = "INSERT INTO tbl_login (fk_email, password) VALUES (:email,:password)";

    try {
        $db = new DatabaseAccess();
        $db = $db->connect();

        $user_stmt = $db->prepare($user_sql);
        $address_stmt = $db->prepare($address_sql);
        $login_stmt = $db->prepare($login_sql);

        $user_stmt->bindParam(':email', $email);
        $user_stmt->bindParam(':first_name', $first_name);
        $user_stmt->bindParam(':last_name', $last_name);
        $user_stmt->bindParam(':id_number', $id_number);
        $user_stmt->bindParam(':gender', $gender);
        $user_stmt->bindParam(':cell_number', $cell_number);

        $address_stmt->bindParam(':email', $email);
        $address_stmt->bindParam(':street_info', $street_info);
        $address_stmt->bindParam(':surburb', $surburb);
        $address_stmt->bindParam(':city', $city);
        $address_stmt->bindParam(':postal_code', $postal_code);

        $login_stmt->bindParam(':email', $email);
        $login_stmt->bindParam(':password', $password);

        $user_stmt->execute();
        $address_stmt->execute();
        $login_stmt->execute();

        $utils = new ResponseUtils();
        $utils->setCode(1);
        $utils->setMessage('success');

        echo json_encode($utils->exponse()); 

    }catch(PDOException $ex) {
        $utils = new ResponseUtils();
        $utils->setCode(0);
        $utils->setMessage('A databse error occured');
        $utils->setResponse($utils->expose());
    }
});

/**
 * Login function
 * 
 */
$app->post('/api/users/login', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "select * from tbl_users where id=$id";

    try {
        $db = new DatabaseAccess();
        $db = $db->connect();

        $stmt  = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $utils = new ResponseUtils();
        $utils->setCode(1);
        $utils->setMessage('success');
        $utils->setResponse($user);

        echo json_encode($utils->exponse()); 

    }catch(PDOException $ex) {
        $utils = new ResponseUtils();
        $utils->setCode(0);
        $utils->setMessage('A databse error occured');
        $utils->setResponse($utils->expose());
    }
});

?>
