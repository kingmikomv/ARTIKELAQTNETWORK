<div class="col-lg-4">
  <div class="widget-blocks">
    <div class="row">
      <div class="col-lg-12 col-md-6">
        <div class="widget">
          <h2 class="section-title mb-3">Recommended</h2>
          <div class="widget-body">
            <div class="widget-list">
              @foreach($randartikel as $random)
              <a class="media align-items-center" href="{{ route('artikel', $random->slug) }}">
                <img loading="lazy" decoding="async" src="{{ asset('storage/' . $random->banner) }}"
                  alt="{{$random->judul}}" class="w-100">
                <div class="media-body ml-3">
                  <h3 style="margin-top:-5px">
                    {{ Str::limit($random->judul ?? 'Judul tidak tersedia', 20, '...') }}
                  </h3>
                  <p class="mb-0 small">
                    {!! Str::limit(
                      preg_replace('/<figure.*?<\/figure>/s', '', $random->isi ?? 'Isi tidak tersedia'),
                      20
                  ) !!}
                  
                  </p>
                  <p class="mb-0 small">
                    {{ $random->created_at }}
                  </p>

                </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-6">
        <div class="widget">
          <h2 class="section-title mb-3">Categories</h2>
          <div class="widget-body">
            <ul class="widget-list" >

              @foreach($categories as $category)
              <li>
                  <a href="{{route('kategori', $category->tag)}}" style="background-color: {{$category->color}};">
                      
                      <span class="ml-auto" >({{ $category->tag }})</span>
                  </a>
              </li>
          @endforeach
          
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>