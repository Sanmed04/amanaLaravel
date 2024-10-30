<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class ShowProductos extends Component
{
    public $search = '';



    public function render()
    {
        $search = $this->search;
        $productos = Producto::when(
            ($search),
            function (Builder $builder, $search) {
                $builder->where('nombre', 'like', "%{$search}%");
            }
        )
            ->orderBy('descuento', 'desc')
            ->orderBy('stock', 'desc')
            ->get();
        return view('livewire.show-productos', [
            'productos' => $productos
        ]);
    }
}
