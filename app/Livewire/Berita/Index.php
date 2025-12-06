<?php

namespace App\Livewire\Berita;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data['berita'] = Berita::latest()->paginate(8);
        return view('livewire.berita.index', $data);
    }
}
