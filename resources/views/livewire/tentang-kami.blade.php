<main class="main">
    <section id="hero" class="hero section"></section>

    <section class="light-background p-3">
        <div class="container">
            <h2 class="fw-bold border-5 ps-2 border-start" style="border-color: #14213d !important">
                Tentang Kami
            </h2>
        </div>
    </section>
    <section id="" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card sidebar-card p-3">
                        <h5 class="mb-3">Kategori</h5>
                        <ul class="list-group list-group-flush">
                            @forelse ($tentang as $item)
                                <li class="list-group-item">
                                    <a href="#" wire:click.prevent="pilihKategori({{ $item->id }})"
                                        class="{{ $kategori && $kategori->id === $item->id ? 'active' : '' }}">
                                        {{ $item->kategori }}
                                    </a>
                                </li>
                            @empty
                                <li class="list-group-item text-muted">Tidak ada data</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <h4 class="fw-bold ">
                        <span class="">
                            {{ $kategori->kategori }}

                        </span>
                    </h4>
                    <hr>

                    @if ($kategori->image)
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <img src="{{ asset(Storage::url($kategori->image)) }}" alt="{{ $kategori->kategori }}"
                                    class="img-fluid rounded-3">
                            </div>
                            <div class="col-lg-8 konten-berita">
                                {!! $kategori->konten !!}
                            </div>
                        </div>
                    @else
                        <div class="konten-berita">
                            {!! $kategori->konten !!}
                        </div>
                    @endif

                </div>
            </div>
    </section>
</main>
