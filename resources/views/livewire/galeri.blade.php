<main class="main">
    <style>
        /* --- Gaya Tombol Filter Kustom --- */
        #filter-buttons .btn {
            border-color: #14213d;
            /* Warna border default */
            color: #14213d;
            /* Warna teks default */
        }

        /* Gaya untuk tombol saat di-hover atau dalam kondisi 'active' */
        #filter-buttons .btn:hover,
        #filter-buttons .btn.active {
            background-color: #14213d;
            /* Background biru gelap */
            border-color: #14213d;
            color: #ffffff;
            /* Teks menjadi putih agar kontras */
        }

        .gallery .gallery-item {
            position: relative;
            cursor: pointer;
            overflow: hidden;
            border-radius: 4px;
        }

        .gallery .gallery-item img {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            transition: transform 0.3s ease;
            background-color: #eee;
        }

        .gallery .gallery-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery .gallery-item:hover .overlay {
            opacity: 1;
        }

        .gallery .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery .overlay-text {
            text-align: center;
            font-size: 1.1rem;
        }

        .gallery .overlay-text i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        #galleryModal .modal-lg {
            max-width: 800px;
        }
    </style>
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
                <button class="btn rounded-pill mx-2 active" data-filter="all">Semua</button>
                <button class="btn rounded-pill mx-2" data-filter="alam">Alam</button>
                <button class="btn rounded-pill mx-2" data-filter="kota">Perkotaan</button>
                <button class="btn rounded-pill mx-2" data-filter="lainnya">Lainnya</button>
            </div>
            <div class="row g-3 gallery">
                <div class="col-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal"
                        data-bs-img-src="https://picsum.photos/1200/1200?random=1" data-bs-title="Gambar Acak 1">
                        <img src="https://picsum.photos/400/400?random=1" alt="Gambar Acak 1" />
                        <div class="overlay">
                            <div class="overlay-text">
                                <i class="bi bi-zoom-in"></i>
                                <div>Gambar Acak 1</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal"
                        data-bs-img-src="https://picsum.photos/1200/1200?random=2" data-bs-title="Gambar Acak 2">
                        <img src="https://picsum.photos/400/400?random=2" alt="Gambar Acak 2" />
                        <div class="overlay">
                            <div class="overlay-text">
                                <i class="bi bi-zoom-in"></i>
                                <div>Gambar Acak 2</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal"
                        data-bs-img-src="https://picsum.photos/1200/1200?random=3" data-bs-title="Gambar Acak 3">
                        <img src="https://picsum.photos/400/400?random=3" alt="Gambar Acak 3" />
                        <div class="overlay">
                            <div class="overlay-text">
                                <i class="bi bi-zoom-in"></i>
                                <div>Gambar Acak 3</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal"
                        data-bs-img-src="https://picsum.photos/1200/1200?random=4" data-bs-title="Gambar Acak 4">
                        <img src="https://picsum.photos/400/400?random=4" alt="Gambar Acak 4" />
                        <div class="overlay">
                            <div class="overlay-text">
                                <i class="bi bi-zoom-in"></i>
                                <div>Gambar Acak 4</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal"
                        data-bs-img-src="https://picsum.photos/1200/1200?random=5" data-bs-title="Gambar Acak 5">
                        <img src="https://picsum.photos/400/400?random=5" alt="Gambar Acak 5" />
                        <div class="overlay">
                            <div class="overlay-text">
                                <i class="bi bi-zoom-in"></i>
                                <div>Gambar Acak 5</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal"
                        data-bs-img-src="https://picsum.photos/1200/1200?random=6" data-bs-title="Gambar Acak 6">
                        <img src="https://picsum.photos/400/400?random=6" alt="Gambar Acak 6" />
                        <div class="overlay">
                            <div class="overlay-text">
                                <i class="bi bi-zoom-in"></i>
                                <div>Gambar Acak 6</div>
                            </div>
                        </div>
                    </div>
                </div>
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
