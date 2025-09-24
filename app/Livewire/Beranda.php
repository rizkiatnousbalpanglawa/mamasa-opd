<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\IdentitasOpd;
use App\Models\Slider;
use Livewire\Component;

class Beranda extends Component
{
    public function render()
    {
        $data['berita'] = Berita::get();
        $data['slider'] = Slider::get();
        return view('livewire.beranda', $data);
    }
}
