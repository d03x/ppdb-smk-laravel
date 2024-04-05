@props(['pageTitle'=>false])
<x-main-layout>
    <x-navbar>
        <ul class="mb-2 navbar-nav me-auto mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('peserta.index') }}">
                    <i class="bi bi-house"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('peserta.pendaftaran.form') }}">
                <i class="bi bi-input-cursor"></i>
                Formulir
                </a>
            </li>
            
            <li class="nav-item">
                <a href='' class="nav-link">
                    <i class="bi bi-bell"></i>
                    Pengumuman
                </a>
            </li>
        </ul>
        <ul class="ml-auto navbar-nav">
            <li class="nav-item text-light">
                {{ auth()->user()->name }}
            </li>
        </ul>
    </x-navbar>
    <div class="alert alert-warning border-warning tw-rounded-none tw-border-t-0 tw-border-l-0 tw-border-r-0 tw-text-sm tw-text-black">
      <div class="container">
          <i class="bi bi-bell"></i>
          Ada <span class="tw-font-bold text-primary">5 Pengumuman Baru</span> Yang belum dibaca
      </div>
    </div>
    <div class="container">
        @if ($pageTitle)
        <div class="tw-flex tw-items-center tw-my-3 tw-justify-between">
            <div class="tw-text-lg tw-uppercase text-secondary tw-font-bold">
                <h1>{{ $pageTitle }}</h1>
            </div>
        </div>
        @endif
        {{ $slot }}
    </div>
    @include('vendor.sweetalert.alert')
</x-main-layout>