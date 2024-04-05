<nav class="navbar navbar-expand-lg sticky-top bg-gradient tw-shadow-lg navbar-dark bg-ary" style="background: #003366">
    <div class="container">
      <a class="navbar-brand" href="#">
        <div class="tw-font-bold">{{ config('app.name') }}</div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
       
        {{ $slot }}
       
      </div>
    </div>
  </nav>