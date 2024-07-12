<?php
header('Content-Type: application/json'); //check if the response is in JSON format

try {
    //Get form data
    $customer_name = $_POST['customer_name'];
    $contact_number = $_POST['contact_number'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'laundry_system');

    //Check connection
    if ($conn->connect_error) {
        throw new Exception('Connection Failed: ' . $conn->connect_error);
    } else {
        //Prepare and bind
        $stmt = $conn->prepare("DELETE FROM service_request WHERE name = ? AND contact_number = ?");
        $stmt->bind_param("si", $customer_name, $contact_number);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            //return a JSON
            echo json_encode([
                'status' => 'success',
                'message' => 'Order canceled successfully!'
            ]);
        } else {
            throw new Exception('No matching order found.');
        }

        $stmt->close();
        $conn->close();
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