<!DOCTYPE html>

<html lang="en-us">
<x-head />
<body>

    <x-header :categories="$categories" :menus="$menus" :submenu="$submenu" />
  <main>
    <section class="section">
      <div class="container">
        <div class="row no-gutters-lg">
          <div class="col-12">
            <h2 class="section-title">Latest Articles</h2>
          </div>
          <div class="col-lg-8 mb-5 mb-lg-0">
            <x-main-article :lt="$lt" :order="$order"/>
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