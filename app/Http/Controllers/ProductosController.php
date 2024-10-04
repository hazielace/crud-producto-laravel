<?php

namespace App\Http\Controllers;

use App\Http\structure\Helpers\ResponseHelper;
use App\Http\structure\Repositories\ProductoRepository;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProductosController extends Controller
{
    public function getProductos(){
        $productos = ProductoRepository::getAllProductos();
        if ($productos->isEmpty()) {
            return (object) ResponseHelper::json_success(array(), "No se encontraron productos");
        }
        return (object) ResponseHelper::json_success($productos, "Productos obtenidos exitosamente!");
    }

    public function getProductoById($id){
        $producto = ProductoRepository::getProductoById($id);
        if(!$producto){
            return (object) ResponseHelper::json_success(array(), "No se encontro producto");
        }
        return (object) ResponseHelper::json_success($producto, "Producto obtenido exitosamente!");
    }

    public function addProducto(Request $request){
        $validator = Validator::make($request->all(),[
            "nombre" => "string|required|max:255",
            "descripcion" => "required",
            "precio" => "numeric|required|min:0",
            "stock" => "integer|required|min:0",
        ]);
        if($validator->fails()){
            return (object) ResponseHelper::json_fail($validator);
        }
        $response = ProductoRepository::addProducto($request);
        if (!$response) {
            return (object) ResponseHelper::json_failnoV($response);
        }
        return (object) ResponseHelper::json_success(array(), "Guardado exitosamente!");
    }

    public function editProducto($id, Request $request){
        $validator = Validator::make($request->all(),[
            "nombre" => "string|required|max:255",
            "descripcion" => "nullable",
            "precio" => "numeric|required|min:0",
            "stock" => "integer|required|min:0",
        ]);
        if($validator->fails()){
            return (object) ResponseHelper::json_fail_puts($validator);
        }
        $response = ProductoRepository::editProducto($id, $request);
        if(!$response){
            return (object) ResponseHelper::json_fail($response);
        }
        return (object) ResponseHelper::json_success(array(), "Editado exitosamente!");
    }

    public function deleteProducto($id){
        $response = ProductoRepository::deleteProducto($id);
        if(!$response){
            return (object) ResponseHelper::json_fail($response);
        }
        return (object) ResponseHelper::json_success(array(), "Eliminado exitosamente!");
    }
}
