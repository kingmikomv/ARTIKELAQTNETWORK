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

    <div class="col-md-12 mb-4">
        <article class="card article-card article-card-sm h-100">
            <div class="card-body px-0 pb-0">
                {!! $datasubmenu->isi !!}
            </div>
        </article>
    </div>
</div>
