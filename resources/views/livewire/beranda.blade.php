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
                                     <a href="{{ route('berita.detail', $item->slug) }}"
                                         class="text-decoration-none text-dark stretched-link">
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



     <section id="logo-grid" class="section py-5" style="background-color:#a3a3a3;">
         <div class="container">

             @php
                 // Bagi data menjadi grup per 4 logo (desktop: 4, mobile: 2)
                 $chunks = $linkTerkait->chunk(4);
                 $isMultiple = $chunks->count() > 1;
             @endphp

             <div id="logoCarousel" class="carousel slide"
                 @if ($isMultiple) data-bs-ride="carousel" data-bs-interval="3000" @endif>

                 <div class="carousel-inner">
                     @foreach ($chunks as $index => $chunk)
                         <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                             <div class="row g-4 justify-content-center">
                                 @foreach ($chunk as $item)
                                     <div class="col-6 col-md-3 d-flex justify-content-center">
                                         <a href="{{ $item->link }}" target="_blank" rel="noopener">
                                             <img src="{{ asset(Storage::url($item->logo)) }}"
                                                 alt="{{ $item->nama ?? 'Logo' }}" class="logo-img img-fluid">
                                             <div class="text-center">{{ $item->nama }}</div>
                                         </a>
                                     </div>
                                 @endforeach
                             </div>
                         </div>
                     @endforeach
                 </div>

                 @if ($isMultiple)
                     <!-- Navigasi hanya muncul jika logo > 4 -->
                     <button class="carousel-control-prev" type="button" data-bs-target="#logoCarousel"
                         data-bs-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Sebelumnya</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#logoCarousel"
                         data-bs-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Berikutnya</span>
                     </button>
                 @endif
             </div>

         </div>
     </section>

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

     <style>
         .logo-img {
             max-height: 70px;
             /* jaga konsisten tinggi logo */
             width: auto;
             transition: transform .25s ease, filter .25s ease;
             filter: brightness(.95);
             display: block;
         }

         .logo-img:hover {
             transform: scale(1.08);
             filter: brightness(1.1);
         }

         /* padding kecil untuk area carousel */
         #logo-grid .carousel {
             padding: 10px 0 30px;
         }

         .carousel-control-prev-icon,
         .carousel-control-next-icon {
             background-color: rgba(0, 0, 0, .35);
             border-radius: 50%;
         }
     </style>


 </main>
