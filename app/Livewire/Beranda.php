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
        $data['berita'] = Berita::limit(4)->latest()->get();
        $data['slider'] = Slider::get();
        $identitas = IdentitasOpd::exists();

        if (!$identitas) {
            return redirect('/admin');
        }
        return view('livewire.beranda', $data);
    }
}
