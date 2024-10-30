<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        // Calcular el total teniendo en cuenta el descuento
        $total = array_reduce($cart, function ($carry, $item) {
            $descuento = isset($item['descuento']) ? $item['descuento'] : 0;
            $precioConDescuento = $item['precio'] * (1 - $descuento / 100);
            return $carry + ($precioConDescuento * $item['cantidad']);
        }, 0);

        return view('cart.index', compact('cart', 'total'));
    }



    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);

        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            // Actualiza solo la cantidad del producto existente en el carrito
            $cart[$id]['cantidad'] = $request->input('cantidad', 1);
        } else {
            // Si el producto no está en el carrito, añádelo
            $cart[$id] = [
                'nombre' => $producto->nombre,
                'imagen' => $producto->imagen,
                'precio' => $producto->precio,
                'descuento' => $producto->descuento ?? 0,
                'categoria' => $producto->categoria_id,
                'cantidad' => $request->input('cantidad', 1)
            ];
        }

        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto actualizado en el carrito!');
    }


    public function destroy(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);

        $cart = $request->session()->get('cart', []);

        unset($cart[$id]);

        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function clear(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        $request->session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado con éxito.');
    }

}
