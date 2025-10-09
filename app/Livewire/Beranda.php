<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\IdentitasOpd;
use App\Models\LinkTerkait;
use App\Models\Slider;
use Livewire\Component;

class Beranda extends Component
{
    public function mount()
    {
        $identitas = IdentitasOpd::exists();

        if (! $identitas) {
            $this->redirect('/admin');
        }
    }

    public function render()
    {
        $data['berita'] = Berita::limit(4)->latest()->get();
        $data['slider'] = Slider::get();
        $data['linkTerkait'] = LinkTerkait::get();
        return view('livewire.beranda', $data);
    }
}
