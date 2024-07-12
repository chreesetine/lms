<?php
header('Content-Type: application/json');  //check if the response is in JSON format

try {
    //Get form data
    $customer_name = $_POST['customer_name'];
    $contact_number = $_POST['contact_number'];
    $quantity = $_POST['quantity'];
    $laundry_service_option = $_POST['laundry_service_option'];
    $laundry_category_option = $_POST['laundry_category_option'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];

    //database connection
    $conn = new mysqli('localhost', 'root', '', 'laundry_system');

    //Check connection
    if ($conn->connect_error) {
        throw new Exception('Connection Failed: ' . $conn->connect_error);
    } else {
        //Prepare and bind
        /*siissidd
        s - string  i - integer d - double */
        $stmt = $conn->prepare("INSERT INTO service_request (customer_name, contact_number, quantity, laundry_service_option, laundry_category_option, weight, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siissdd", $customer_name, $contact_number, $quantity, $laundry_service_option, $laundry_category_option, $weight, $price);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        //return a JSON response
        echo json_encode([
            'status' => 'success',
            'message' => 'Order added successfully!',
            'customer_name' => $customer_name,
            'contact_number' => $contact_number
        ]);
    }
} catch (Exception $e) {
    //return a JSON response with the error
    http_response_code(500); //internal Server Error
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}

?>