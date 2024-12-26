<div class="row">
    <style>
        img.w-100 {
            object-fit: contain;
            width: 100%;
            /* Ensures it stretches the width of the container */
            height: 300px;
            /* Set a fixed height or use auto to preserve aspect ratio */
        }
    </style>

    @forelse($artikel as $item)
        @php
            // Clean content by removing <figure> tags first
            $cleaned_content = preg_replace('/<figure.*?<\/figure>/s', '', $item->isi) ?? '';

            // Count words
            $word_count = str_word_count(strip_tags($cleaned_content));

            // Average words per minute (you can adjust this value based on your preference)
            $words_per_minute = 200;

            // Estimate reading time in minutes
            $read_time = ceil($word_count / $words_per_minute);
        @endphp




        <div class="col-md-6 mb-4">
            <article class="card article-card article-card-sm h-100">
                <a href="{{ route('artikel', $item->slug ?? '') }}">
                    <div class="card-image">
                        <div class="post-info"> <span class="text-uppercase">{{ $item->created_at ?? '' }}</span>
                            <span class="text-uppercase">{{ $read_time }} minute{{ $read_time > 1 ? 's' : '' }}
                                read</span>
                        </div>
                        <img loading="lazy" decoding="async" src="{{ asset('storage/' . $item->banner) }}"
                            alt="Post Thumbnail" class="w-100">
                    </div>
                </a>
                <div class="card-body px-0 pb-0">
                    <ul class="post-meta mb-2">
                        <li>
                            @if (!empty($item->tag) && is_array($item->tag))
                                @foreach ($item->tag as $tags)
                                    <a href="#">{{ $tags }}</a>
                                @endforeach
                            @else
                                <p>No tags available.</p>
                            @endif
                        </li>
                    </ul>
                    <h2><a class="post-title" href="{{ route('artikel', $item->slug ?? '') }}">{{ $item->judul }}</a>
                    </h2>
                    <p class="card-text"> {!! Str::limit(preg_replace('/<figure.*?<\/figure>/s', '', $item->isi), 300) !!}
                    </p>
                    <div class="content"> <a class="read-more-btn" href="{{ route('artikel', $item->slug ?? '') }}">Read
                            Full Article</a>
                    </div>
                </div>
            </article>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                <strong>Maaf!</strong> Artikel tidak ditemukan.
            </div>
        </div>
    @endforelse
    {{-- <div class="col-12">
        <div class="row">
            <div class="col-12">
                <nav class="mt-4">
                    <!-- pagination -->
                    <nav class="mb-md-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#!" aria-label="Pagination Arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="page-item active "> <a href="index.html" class="page-link">
                                    1
                                </a>
                            </li>
                            <li class="page-item"> <a href="#!" class="page-link">
                                    2
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#!" aria-label="Pagination Arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </nav>
            </div>
        </div>
    </div> --}}
</div>
