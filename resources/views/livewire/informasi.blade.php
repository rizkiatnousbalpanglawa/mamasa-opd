<main class="main">
    <style>
        /* Navbar & Footer */
        .bg-primary-custom {
            background-color: #14213d;
        }

        /* Card (untuk Sidebar Filter) */
        .card-header-custom {
            background-color: #14213d;
            color: white;
            border-bottom: none;
        }

        /* List Group (untuk Daftar Informasi) */
        .custom-list-group-item {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .custom-list-group-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .custom-list-group-item i.bi {
            color: #fca311;
            transition: transform 0.2s ease-in-out;
        }

        .custom-list-group-item:hover i.bi {
            transform: scale(1.1);
        }

        /* Pagination */
        .pagination .page-item.active .page-link {
            background-color: #fca311;
            border-color: #fca311;
            color: #14213d;
            font-weight: bold;
        }

        .pagination .page-link {
            color: #14213d;
        }

        .pagination .page-link:hover {
            background-color: #fdeac7;
        }

        /* -- 3. Layout -- */
        .sidebar {
            position: sticky;
            top: 1rem;
        }
    </style>

    <section id="hero" class="hero section"></section>

    <section class="light-background p-3">
        <div class="container">
            <h2 class="fw-bold border-5 ps-2 border-start" style="border-color: #14213d !important">
                Informasi
            </h2>
        </div>
    </section>
    <section id="" class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header card-header-custom">
                                <strong><i class="bi bi-funnel-fill"></i> Filter Informasi</strong>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="searchInput" class="form-label">Pencarian</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control" id="searchInput"
                                            placeholder="Cari informasi..." />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="filterKategori" class="form-label">Kategori</label>
                                    <select class="form-select" id="filterKategori">
                                        <option selected>Semua Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="filterTahun" class="form-label">Tahun</label>
                                    <select class="form-select" id="filterTahun">
                                        <option selected>Semua Tahun</option>
                                        @foreach ($tahun as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <h2 class="mb-2">Daftar Informasi</h2>
                    <hr class="">
                    <div class="list-group">
                        @foreach ($informasi as $item)
                            @php
                                $link = Str::startsWith($item->lampiran, 'informasi/')
                                    ? Storage::url($item->lampiran)
                                    : url($item->lampiran);
                            @endphp

                            <a href="#" wire:click.prevent="incrementView({{ $item->id }})"
                                onclick="window.open('{{ $link }}', '_blank')"
                                class="custom-list-group-item custom-list-group-item-action d-flex align-items-start border-0 shadow-sm mb-3 rounded px-3 py-2">

                                <i class="bi bi-file-text fs-4 me-3"></i>
                                <div>
                                    <h6 class="mb-1">
                                        {{ $item->judul }}
                                    </h6>
                                    <small class="text-muted">
                                        <i class="bi bi-eye me-1"></i> {{ $item->views }} Dilihat &bull;
                                        <i class="bi bi-calendar-date me-1"></i> {{ $item->tanggal->format('d M Y') }}
                                    </small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
</main>
