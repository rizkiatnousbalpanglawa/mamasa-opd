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
                <div class="col-lg-6">
                    <div class="h2 mb-3">
                        {{ $berita->judul }}
                    </div>
                    <div class="text-muted mb-3">{{ $berita->created_at->format('D, d M Y H:i') }} WITA</div>
                    <div class="border-0">
                        <img src="{{ asset(Storage::url($berita->image)) }}" class="img-fluid rounded-3 mb-3"
                            alt="{{ $berita->judul }}" />
                        <div class="">
                            {!! $berita->konten !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
