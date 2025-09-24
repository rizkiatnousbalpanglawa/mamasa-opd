<?php

namespace App\Livewire\Berita;

use App\Models\Berita;
use Livewire\Component;

class Detail extends Component
{
    public Berita $berita;

    public function mount($slug)
    {
        $this->berita = Berita::firstWhere('slug', $slug);
    }

    public function render()
    {
        return view('livewire.berita.detail');
    }
}
