<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\IdentitasOpd;
use Livewire\Component;

class Beranda extends Component
{
    public function render()
    {
        $data['berita'] = Berita::get();
        return view('livewire.beranda', $data);
    }
}
