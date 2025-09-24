 <main class="main">
     <section id="hero" class="hero section"></section>

     <section class="section" data-aos="fade-up" data-aos-delay="100">
         <div class="container">
             <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                 <!-- Indicators -->
                 <div class="carousel-indicators">
                     @forelse ($slider as $item)
                         <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $loop->iteration }}"
                             class="{{ $loop->iteration === 1 ? 'active' : '' }}"></button>
                     @empty
                     @endforelse
                 </div>

                 <!-- Carousel inner -->
                 <div class="carousel-inner rounded-4">
                     @forelse ($slider as $item)
                         <div class="carousel-item {{ $loop->iteration === 1 ? 'active' : '' }}">
                             <img src="{{ asset(Storage::url($item->image)) }}" class="d-block w-100"
                                 alt="Slide {{ $loop->iteration }}" />
                         </div>
                     @empty
                     @endforelse
                 </div>

                 <!-- Controls -->
                 <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                     <span class="visually-hidden">Sebelumnya</span>
                 </button>

                 <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                     <span class="carousel-control-next-icon"></span>
                     <span class="visually-hidden">Berikutnya</span>
                 </button>
             </div>
         </div>
     </section>
     <!-- Features Section -->
     <section id="" class="section">
         <!-- Section Title -->
         <div class="container section-title" data-aos="fade-up">
             <h2>Berita</h2>
         </div>
         <!-- End Section Title -->

         <div class="container my-4">
             <div class="row g-4">
                 @forelse ($berita as $item)
                     <div class="col-lg-3 col-md-6 mb-4">
                         <div class="card h-100 shadow-sm border-0 news-card">
                             <img src="{{ asset(Storage::url($item->image)) }}" class="card-img-top"
                                 alt="{{ $item->judul }}" />
                             <div class="card-body">
                                 {{-- Bagian yang ditambahkan --}}
                                 <div class="d-flex justify-content-between align-items-center text-muted small mb-2">
                                     <span class="text-truncate">
                                         <i class="bi bi-person me-1"></i>
                                         {{ $item->penulis->nama }}
                                     </span>
                                     <span>
                                         <i class="bi bi-calendar3 me-1"></i>
                                         {{-- Format tanggal agar lebih mudah dibaca --}}
                                         {{ $item->created_at->format('d M Y') }}
                                     </span>
                                 </div>
                                 {{-- Akhir bagian tambahan --}}

                                 <h5 class="card-title">
                                     <a href="#" class="text-decoration-none text-dark stretched-link">
                                         {{ $item->judul }}
                                     </a>
                                 </h5>
                             </div>
                         </div>
                     </div>
                 @empty
                     <div class="col">
                         <div class="h4 text-center">
                             Data Masih Kosong!
                         </div>
                     </div>
                 @endforelse
             </div>
         </div>
     </section>
     <!-- /Features Section -->
 </main>
