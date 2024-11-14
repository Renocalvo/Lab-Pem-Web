<?php

namespace app\Controller;

// include "app/Traits/ApiResponseFormatter.php";
// include "app/Models/Product.php";
include (__DIR__."/../Traits/ApiResponseFormatter.php");
include (__DIR__."/../Models/Product.php");

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    use ApiResponseFormatter;

    public function index()
    {
        error_log("Entering index() method"); // Debugging: Log method entry
        $productModel = new Product();
        $response = $productModel->findAll();
        error_log("index() response: " . print_r($response, true)); // Debugging: Log the response from findAll
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        error_log("Entering getById() method with ID: " . $id); // Debugging: Log method entry and ID
        $productModel = new Product();
        $response = $productModel->findById($id);
        error_log("getById() response: " . print_r($response, true)); // Debugging: Log the response from findById
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        error_log("Entering insert() method"); // Debugging: Log method entry
        $jsonInput = file_get_contents("php://input");
        error_log("Raw input: " . $jsonInput); // Debugging: Log the raw JSON input
        $inputData = json_decode($jsonInput, true);
        
        if (json_last_error()) {
            error_log("JSON Decode Error: " . json_last_error_msg()); // Debugging: Log JSON error
            return $this->apiResponse(400, "Error invalid input", null);
        }

        error_log("Parsed input data: " . print_r($inputData, true)); // Debugging: Log parsed input data
        $productModel = new Product();
        $response = $productModel->create([
            "product_name" => $inputData["product_name"]
        ]);
        error_log("insert() response: " . print_r($response, true)); // Debugging: Log the response from create
        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        error_log("Entering update() method with ID: " . $id); // Debugging: Log method entry and ID
        $jsonInput = file_get_contents("php://input");
        error_log("Raw input: " . $jsonInput); // Debugging: Log the raw JSON input
        $inputData = json_decode($jsonInput, true);

        if (json_last_error()) {
            error_log("JSON Decode Error: " . json_last_error_msg()); // Debugging: Log JSON error
            return $this->apiResponse(400, "Error invalid input", null);
        }

        error_log("Parsed input data: " . print_r($inputData, true)); // Debugging: Log parsed input data
        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData["product_name"]
        ], $id);
        error_log("update() response: " . print_r($response, true)); // Debugging: Log the response from update
        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        error_log("Entering delete() method with ID: " . $id); // Debugging: Log method entry and ID
        $productModel = new Product();
        $response = $productModel->delete($id);
        error_log("delete() response: " . print_r($response, true)); // Debugging: Log the response from delete
        return $this->apiResponse(200, "success", $response);
    }
}
