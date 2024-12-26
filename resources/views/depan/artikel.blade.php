<!DOCTYPE html>

<html lang="en-us">
<x-head-artikel :artikel="$artikel"/>

<body>
    <style>
        img.w-100 {
            object-fit: contain;
            width: 100%;
            /* Ensures it stretches the width of the container */
            height: 300px;
            /* Set a fixed height or use auto to preserve aspect ratio */
        }
    </style>
    <x-header :categories="$categories" :menus="$menus" :submenu="$submenu" />
    <main>
        <section class="section">
            <div class="container">
                <div class="row no-gutters-lg">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <article>
                            <img loading="lazy" decoding="async" src="{{ asset('storage/' . $artikel->banner) }}"
                                alt="Post Thumbnail" class="w-100">
                            <ul class="post-meta mb-2 mt-4">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        style="margin-right:5px;margin-top:-4px" class="text-dark" viewBox="0 0 16 16">
                                        <path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                        <path
                                            d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                                    </svg> <span>{{$artikel->created_at}}</span>
                                </li>
                            </ul>
                            <h1 class="my-3">{{$artikel->judul}}</h1>
                            <ul class="post-meta mb-4">
                                <li>
                                    @if (!empty($artikel->tag) && is_array($artikel->tag))
                                    @foreach ($artikel->tag as $tag)
                                    <a href="#">{{ $tag }}</a>
                                    @endforeach
                                    @else
                                    <p>No tags available.</p>
                                    @endif
                                </li>
                            </ul>
                            <div class="content text-left">
                                {!! $artikel->isi !!}
                            </div>
                        </article>
                        <div class="mt-5">
                            <div id="disqus_thread"></div>
                            <script>
                                /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://artikel-aqtnetwork.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a
                                    href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                    </div>
                    <x-sidebar :randartikel="$randartikel" :categories="$categories" />
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

    <script id="dsq-count-scr" src="//artikel-aqtnetwork.disqus.com/count.js" async></script>
</body>

</html>