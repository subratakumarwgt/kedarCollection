<div class="card">
    <div class="profile-img-style">
        <h3>{{$post->header}}</h3>
        <p>{{$post->text}}</p>
        <div class="row mt-4 pictures my-gallery" id="aniimated-thumbnials-2" itemscope="" data-pswp-uid="2">
            @foeach($post->postImage as $image)
            <figure class="col-sm-6" itemprop="associatedMedia" itemscope="">
                <a href="{{$post->url}}" itemprop="contentUrl" data-size="1600x950" data-bs-original-title="" title=""><img class="img-fluid rounded" src="{{$image->path}}" itemprop="thumbnail" alt="gallery"></a>
                <figcaption itemprop="caption description">Image caption  1</figcaption>
            </figure>
            @endfroeach
        </div>     
    </div>
</div>