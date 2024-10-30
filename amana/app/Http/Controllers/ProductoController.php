<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

use App\Models\Producto;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::orderBy('stock', 'asc')->get();
        return view('productos.index', compact('productos'));
    }

    public function show(int $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function indexDestacados()
    {
        $productosNuevos = Producto::where('stock', '>', 0)
            ->orderBy('id', 'desc')
            ->orderBy('stock', 'asc')
            ->get();
        $productosOferta = Producto::where('descuento', '>', 0)
            ->where('stock', '>', 0)
            ->orderBy('stock', 'asc')
            ->get();
        return view('index.amana', compact('productosNuevos', 'productosOferta'));
    }

    public function indexAdmin()
    {
        $productos = Producto::orderBy('nombre', 'asc')->paginate(10);
        return view('admin.admin-productos', compact('productos'));
    }

    public function crear()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('admin.admin-crear-producto', [
            'categorias' => $categorias
        ]);
    }

    public function almacenarProducto(Request $request)
    {



        $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'precio' => 'required|numeric|min:1',
            'descuento' => 'required|numeric|min:0|max:100',
            'stock' => 'required|numeric|min:0',
            'categoria_id' => 'required|string|min:1|max:255',
            'imagen' => 'mimes:jpeg,jpg,png,webp'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen_nombre = time() . $request->file('imagen')->getClientOriginalName();
            $imagen = $request->file('imagen')->storeAs('productos', $imagen_nombre, 'public');
        } else {
            $imagen = 'default_image.jpg';
        }



        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion ?? 'Sin descripción',
            'precio' => $request->precio,
            'descuento' => $request->descuento,
            'categoria_id' => $request->categoria_id,
            'stock' => $request->stock,
            'imagen' => $imagen
        ]);

        return redirect()
            ->route('admin.admin-productos')
            ->with('status', 'Producto creado correctamente');
    }

    public function eliminar(Producto $producto)
    {
        $producto->delete();
        return redirect()
            ->route('admin.admin-productos')
            ->with('status', 'Producto eliminado correctamente');
    }

    public function editar(Producto $producto)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('admin.admin-editar-producto', [
            'categorias' => $categorias,
            'producto' => $producto
        ]);
    }

    public function actualizar(Request $request, Producto $producto)
    {



        $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'precio' => 'required|numeric|min:1',
            'descuento' => 'required|numeric|min:0|max:100',
            'stock' => 'required|numeric|min:0',
            'categoria_id' => 'required|string|min:1|max:255'
        ]);

        if ($request->hasFile('imagen')) {
            $request->validate([
                'imagen' => 'required|mimes:jpeg,jpg,png,webp'
            ]);
            $imagen_nombre = time() . $request->file('imagen')->getClientOriginalName();
            $imagen = $request->file('imagen')->storeAs('productos', $imagen_nombre, 'public');
        } else {
            $imagen = $producto->imagen ?? 'default_image.jpg';
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion ?? 'No description provided',
            'precio' => $request->precio,
            'descuento' => $request->descuento,
            'categoria_id' => $request->categoria_id,
            'stock' => $request->stock,
            'imagen' => $imagen,
        ]);

        return redirect()
            ->route('admin.admin-productos')
            ->with('status', 'Producto actualizado correctamente');
    }
}
