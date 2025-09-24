<main class="main">
    <section id="hero" class="hero section"></section>

    <section class="light-background p-3">
        <div class="container">
            <h2 class="fw-bold border-5 ps-2 border-start" style="border-color: #14213d !important">
                Galeri
            </h2>
        </div>
    </section>
    <section id="" class="section">
        <div class="container">
            <div class="d-flex justify-content-center mb-4" id="filter-buttons">
                {{-- Tombol Semua --}}
                <button class="btn rounded-pill mx-2 {{ $kategoriTerpilih === null ? 'active' : '' }}"
                    wire:click.prevent="pilihKategori(null)">
                    Semua
                </button>

                {{-- Loop kategori --}}
                @forelse ($kategori as $item)
                    <button class="btn rounded-pill mx-2 {{ $kategoriTerpilih === $item->id ? 'active' : '' }}"
                        wire:click.prevent="pilihKategori({{ $item->id }})">
                        {{ $item->nama }}
                    </button>
                @empty
                    <div class="text-muted">Tidak ada Data</div>
                @endforelse
            </div>
            <div class="row g-3 gallery">
                @forelse ($galeri as $item)
                    <div class="col-3">
                        <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal"
                            data-bs-img-src="{{ asset(Storage::url($item->image)) }}"
                            data-bs-title="{{ $item->nama }}">
                            <img src="{{ asset(Storage::url($item->image)) }}" alt="{{ $item->nama }}" />
                            <div class="overlay">
                                <div class="overlay-text">
                                    <i class="bi bi-zoom-in"></i>
                                    <div>{{ $item->nama }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
    </section>

    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalLabel">Detail Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" class="img-fluid" id="modalImage" alt="Gambar Diperbesar" />
                </div>
            </div>
        </div>
    </div>

    <script>
        const galleryModal = document.getElementById("galleryModal");
        galleryModal.addEventListener("show.bs.modal", (event) => {
            const triggerElement = event.relatedTarget;
            const imageSrc = triggerElement.getAttribute("data-bs-img-src");
            const imageTitle = triggerElement.getAttribute("data-bs-title");
            const modalTitle = galleryModal.querySelector(".modal-title");
            const modalImage = galleryModal.querySelector("#modalImage");
            modalTitle.textContent = imageTitle;
            modalImage.src = imageSrc;
        });
    </script>
</main>
