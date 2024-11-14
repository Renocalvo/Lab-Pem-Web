<?php

namespace app\Routes;
//include "app/Controller/ProductController.php";
include (__DIR__."/../Controller/ProductController.php");

use app\Controller\ProductController;

class ProductRoutes
{
    public function handle($method, $path)
    {
        // JIKA REQUEST METHOD GET DAN PATH SAMA DENGAN '/api/product'
        if ($method == "GET" && $path == '/app/api/product') {
            $controller = new ProductController();
            $response = $controller->index(); // Debugging: Log the response
            echo $response;
        }

        // JIKA REQUEST METHOD GET DAN PATH SAMA DENGAN '/api/product/{id}'
        if ($method == "GET" && strpos($path, '/app/api/product') === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            $response = $controller->getById($id); 
            echo $response;
        }

        // JIKA REQUEST METHOD POST DAN PATH SAMA DENGAN '/api/product'
        if ($method == "POST" && $path == '/app/api/product') {
            $controller = new ProductController();
            $response = $controller->insert();
            //var_dump("POST /api/product Response:", $response); // Debugging: Log the response
            echo $response;
        }

        // JIKA REQUEST METHOD PUT DAN PATH SAMA DENGAN '/api/product/{id}'
        if ($method == "PUT" && strpos($path, '/app/api/product') === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];
            
            //var_dump("Extracted ID for PUT /api/product/{id}:", $id); // Debugging: Log the extracted ID

            $controller = new ProductController();
            $response = $controller->update($id);
            //var_dump("PUT /api/product/{id} Response:", $response); // Debugging: Log the response
            echo $response;
        }

        // JIKA REQUEST METHOD DELETE DAN PATH SAMA DENGAN '/api/product/{id}'
        if ($method == "DELETE" && strpos($path, '/app/api/product') === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];
            
            //var_dump("Extracted ID for DELETE /api/product/{id}:", $id); // Debugging: Log the extracted ID

            $controller = new ProductController();
            $response = $controller->delete($id);
            //var_dump("DELETE /api/product/{id} Response:", $response); // Debugging: Log the response
            echo $response;
        }
    }
}
