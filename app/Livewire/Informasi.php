<?php

namespace App\Livewire;

use App\Models\Informasi as ModelsInformasi;
use App\Models\InformasiKategori;
use Livewire\Component;

class Informasi extends Component
{
    public $tahunTerpilih = '', $kategoriTerpilih, $pencarian = '';
    public function incrementView($id)
    {
        $item = ModelsInformasi::find($id);

        if ($item) {
            $item->increment('views');
        }
    }

    public function render()
    {
        $data['kategori'] = InformasiKategori::get();
        $data['tahun'] = ModelsInformasi::selectRaw('YEAR(tanggal) as tahun')
            ->distinct()
            ->pluck('tahun');

        $query = ModelsInformasi::query();

        if ($this->kategoriTerpilih) {
            $query->where('kategori_id', $this->kategoriTerpilih);
        }

        if ($this->pencarian) {
            $query->where('judul', 'LIKE', '%' . $this->pencarian . '%');
        }

        if ($this->tahunTerpilih) {
            $query->WhereYear('tanggal', $this->tahunTerpilih);
        }

        $data['informasi'] = $query->get();

        return view('livewire.informasi', $data);
    }
}
