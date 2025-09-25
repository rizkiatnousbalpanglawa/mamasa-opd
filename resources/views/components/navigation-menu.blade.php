  <nav id="navmenu" class="navmenu">
      <ul>
          <x-nav-link wire:navigate :active="request()->is('/')" href="/">Beranda</x-nav-link>
          <x-nav-link wire:navigate :active="request()->is(['berita/*', 'berita'])" href="/berita">Berita</x-nav-link>
          <x-nav-link wire:navigate :active="request()->is('tentang-kami')" href="/tentang-kami">Tentang Kami</x-nav-link>
          <x-nav-link wire:navigate :active="request()->is('galeri')" href="/galeri">Galeri</x-nav-link>
          <x-nav-link wire:navigate :active="request()->is('informasi')" href="/informasi">Informasi</x-nav-link>
          <x-nav-link href="{{ url('https://www.lapor.go.id') }}">Pengaduan</x-nav-link>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>
