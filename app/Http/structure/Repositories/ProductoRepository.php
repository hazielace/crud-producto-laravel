<?php

namespace App\Http\structure\Repositories;

use App\Models\Producto;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductoRepository{
    public static function getAllProductos(){
        return Producto::all();
    }

    public static function getProductoById($id){
        $producto = Producto::where('id', '=', $id)->first();
        return $producto ? [$producto] : []; //
    }

    public static function addProducto($request){
        $data = new Producto();
        $data->nombre = $request['nombre'];
        $data->descripcion = $request['descripcion'];
        $data->precio = $request['precio'];
        $data->stock = $request['stock'];
        return $data->save();
    }

    public static function editProducto($id, $request){
        $data = Producto::where('id', '=', $id)->first();
        $data->nombre = $request['nombre'];
        $data->descripcion = $request['descripcion'];
        $data->precio = $request['precio'];
        $data->stock = $request['stock'];
        return $data->save();
    }

    public static function deleteProducto($id){
        $data = Producto::where('id', '=', $id)->first();
        return $data->delete();
    }
}
