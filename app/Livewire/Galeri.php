<?php

namespace App\Livewire;

use App\Models\Galeri as ModelsGaleri;
use App\Models\GaleriKategori;
use Livewire\Component;

class Galeri extends Component
{
    public $kategoriTerpilih = null;

    public function render()
    {
        $data['kategori'] = GaleriKategori::get();
        if (!$this->kategoriTerpilih) {
            $data['galeri'] = ModelsGaleri::get();
        } else {
            $data['galeri'] = ModelsGaleri::where('kategori_id', $this->kategoriTerpilih)->get();
        }

        return view('livewire.galeri', $data);
    }

    public function pilihKategori($id)
    {
        $this->kategoriTerpilih = $id;
    }
}
