<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;


class AdminShowProductos extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $search = $this->search;
        $productos = Producto::when(
            ($search),
            function (Builder $builder, $search) {
                $builder->where('nombre', 'like', "%{$search}%")
                    ->orWhereHas('categoria', function ($builder) use ($search) {
                        $builder->where('nombre', 'like', "%{$search}%");
                    });
            }
        )
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin-show-productos', [
            'productos' => $productos
        ]);
    }
}
