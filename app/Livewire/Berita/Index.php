<?php

namespace App\Livewire\Berita;

use App\Models\Berita;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data['berita'] = Berita::get();
        return view('livewire.berita.index', $data);
    }
}
