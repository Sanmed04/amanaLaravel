<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class PagoController extends Controller
{
    public function finalizar(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
        }

        foreach ($cart as $id => $item) {
            if (isset($item['cantidad'])) {
                $product = Producto::find($id);
                if ($product) {
                    $product->stock -= $item['cantidad'];
                    $product->save();
                } else {
                    return redirect()->route('cart.index')->with('error', 'Producto no encontrado.');
                }
            } else {
                return redirect()->route('cart.index')->with('error', 'El carrito contiene productos inválidos.');
            }
        }

        $request->session()->forget('cart');

        return view('pago.finalizar')->with('success', 'Compra finalizada con éxito!');
    }
}
