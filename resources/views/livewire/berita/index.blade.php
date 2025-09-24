<main class="main">
    <section id="hero" class="hero section"></section>

    <section class="light-background p-3">
        <div class="container">
            <h2 class="fw-bold border-5 ps-2 border-start" style="border-color: #14213d !important">
                Berita
            </h2>
        </div>
    </section>
    <section id="" class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row g-4">
                        @forelse ($berita as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="card h-100 shadow-sm border-0 news-card">
                                    <img src="{{ asset(Storage::url($item->image)) }}" class="card-img-top"
                                        alt="{{ $item->judul }}" />
                                    <div class="card-body">
                                        <h6 class="text-muted small">{{ $item->penulis->nama }}</h6>
                                        <h5 class="card-title">
                                            {{ $item->judul }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="h4 text-center">
                                Data Masih Kosong!
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
