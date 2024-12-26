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
    <div class="col-12 mb-4">

        @php
            // Clean content by removing <figure> tags first
            $cleaned_content1 = preg_replace('/<figure.*?<\/figure>/s', '', $lt->isi ?? '');

            // Count words
            $word_count1 = str_word_count(strip_tags($cleaned_content1));

            // Average words per minute (you can adjust this value based on your preference)
            $words_per_minutes = 200;

            // Estimate reading time in minutes
            $read_time1 = ceil($word_count1 / $words_per_minutes);
        @endphp
        <article class="card article-card">
            <a href="{{ route('artikel', $lt->slug ?? '') }}">
                <div class="card-image">
                    <div class="post-info"> <span class="text-uppercase">{{ $lt->created_at ?? ''}}</span>
                        <span class="text-uppercase">{{ $read_time1 }} minute{{ $read_time1 > 1 ? 's' : '' }}
                            read</span>
                    </div>
                    @if(isset($lt->banner))
                    <img loading="lazy" decoding="async" src="{{ asset('storage/' . $lt->banner) }}" alt="Post Thumbnail"
                    class="w-100 img-fluid">
                    @else
   
@endif
                    
                </div>
            </a>
            <div class="card-body px-0 pb-1">
                <ul class="post-meta mb-2">
                    <li>
                        @if (!empty($lt->tag) && is_array($lt->tag))
                            @foreach ($lt->tag as $tag)
                                <a href="{{route('kategori', $tag)}}">{{ $tag }}</a>
                               
                            @endforeach
                        @else
                            <p>No tags available.</p>
                        @endif

                    </li>
                </ul>
                <h2 class="h1"><a class="post-title" href="{{ route('artikel', $lt->slug ?? '') }}">{{ $lt->judul ?? ''}}</a></h2>
                <p class="card-text"> {!! Str::limit(preg_replace('/<figure.*?<\/figure>/s', '', $lt->isi ?? ''), 300) !!}
                </p>
                <div class="content"> <a class="read-more-btn" href="{{ route('artikel', $lt->slug ?? '') }}">Read Full Article</a>
                </div>
            </div>
        </article>
    </div>

    @foreach ($order as $item)
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




        <div class="col-md-6 mb-4 content-container">
            <article class="card article-card article-card-sm h-100">
                <a href="{{ route('artikel', $item->slug ?? '') }}">
                    <div class="card-image">
                        <div class="post-info"> <span class="text-uppercase">{{ $item->created_at ?? ''}}</span>
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
                                    <a href="{{route('kategori', $tags)}}">{{ $tags }}</a>
                                @endforeach
                            @else
                                <p>No tags available.</p>
                            @endif
                        </li>
                    </ul>
                    <h2><a class="post-title" href="{{ route('artikel', $item->slug ?? '') }}">{{ $item->judul }}</a></h2>
                    <p class="card-text"> {!! Str::limit(preg_replace('/<figure.*?<\/figure>/s', '', $item->isi), 300) !!}
                    </p>
                    <div class="content"> <a class="read-more-btn" href="{{ route('artikel', $item->slug ?? '') }}">Read Full Article</a>
                    </div>
                </div>
            </article>
        </div>
    @endforeach
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <!-- Previous Button -->
                        <li class="page-item {{ $order->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $order->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Previous</span>
                            </a>
                        </li>
    
                        <!-- Pagination Numbers -->
                        @foreach ($order->getUrlRange(1, $order->lastPage()) as $page => $url)
                            <li class="page-item {{ $order->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
    
                        <!-- Next Button -->
                        <li class="page-item {{ $order->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $order->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo; Next </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
</div>
