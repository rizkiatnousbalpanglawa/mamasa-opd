<?php

namespace App\Livewire;

use App\Models\Informasi as ModelsInformasi;
use App\Models\InformasiKategori;
use Livewire\Component;

class Informasi extends Component
{
    public function render()
    {
        $data['kategori'] = InformasiKategori::get();
        $data['tahun'] = ModelsInformasi::selectRaw('YEAR(tanggal) as tahun')
            ->distinct()
            ->pluck('tahun');
        $data['informasi'] = ModelsInformasi::get();
        return view('livewire.informasi', $data);
    }
}
