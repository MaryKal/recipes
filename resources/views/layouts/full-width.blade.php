@include('layouts.header')

<div class="structure">
  <div>
    @section('sidebar')
    <p>This is the master sidebar.<p>
        @show
  </div>
  <div class="container">
    @yield('content')
  </div>
</div>

  @include('layouts.footer')
