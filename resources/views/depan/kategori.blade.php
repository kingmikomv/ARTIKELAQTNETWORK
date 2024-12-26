<!DOCTYPE html>

<html lang="en-us">
<x-head />
<body>

    <x-header />
  <main>
    <section class="section">
      <div class="container">
        <div class="row no-gutters-lg">
          <div class="col-12">
            <h2 class="section-title">Categories : {{$slug_tag}}</h2>
          </div>
          <div class="col-lg-8 mb-5 mb-lg-0">
            <x-kateg :artikel="$artikel"/>
          </div>
            <x-sidebar :randartikel="$randartikel" :categories="$categories"/>
        </div>
      </div>
    </section>
  </main>

  <x-footer />


  <!-- # JS Plugins -->
  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap/bootstrap.min.js')}}"></script>

  <!-- Main Script -->
  <script src="{{asset('assets/js/script.js')}}"></script>

</body>

</html>