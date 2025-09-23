<?php

namespace App\Livewire;

use App\Models\Tentang;
use Livewire\Component;

class TentangKami extends Component
{
    public $kategoriTerpilih, $konten, $gambar;
    public function render()
    {
        $data['tentang'] = Tentang::get();

        if (!$this->kategoriTerpilih) {
            $data['kategori'] = Tentang::first();
        } else {
            $data['kategori'] = Tentang::find($this->kategoriTerpilih);
        }


        return view('livewire.tentang-kami', $data);
    }

    public function pilihKategori($id)
    {
        $this->kategoriTerpilih = $id;
    }
}
