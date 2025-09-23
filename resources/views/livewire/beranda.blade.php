 <main class="main">
     <section id="hero" class="hero section"></section>

     <section class="section" data-aos="fade-up" data-aos-delay="100">
         <div class="container">
             <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                 <!-- Indicators -->
                 <div class="carousel-indicators">
                     <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
                     <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
                     <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
                 </div>

                 <!-- Carousel inner -->
                 <div class="carousel-inner rounded-4">
                     <div class="carousel-item active">
                         <img src="https://picsum.photos/1200/400?random=1" class="d-block w-100" alt="Slide 1" />
                     </div>

                     <div class="carousel-item">
                         <img src="https://picsum.photos/1200/400?random=2" class="d-block w-100" alt="Slide 2" />
                     </div>

                     <div class="carousel-item">
                         <img src="https://picsum.photos/1200/400?random=3" class="d-block w-100" alt="Slide 3" />
                     </div>
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
                     <div class="col-lg-3 col-md-6">
                         <div class="card h-100 shadow-sm border-0 news-card">
                             <img src="https://picsum.photos/400/250?random=11" class="card-img-top" alt="..." />
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
     </section>
     <!-- /Features Section -->
 </main>
