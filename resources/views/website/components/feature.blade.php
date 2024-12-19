<div class="container-fluid py-5">
    <div class="container py-5">
        @foreach ($categories as $category)
            <div class="row g-4 mb-5">
                <div class="col-lg-7 col-xl-8 mt-0">
                    <h2 class="mb-3">{{ $category->name }}</h2>
                    @if ($category->posts->isNotEmpty())
                        @foreach ($category->posts->take(1) as $post)
                            <div class="position-relative overflow-hidden rounded mb-4">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                    class="img-fluid rounded img-zoomin w-100" alt="{{ $post->title }}">
                                {{-- <div class="d-flex justify-content-center px-4 position-absolute flex-wrap"
                                    style="bottom: 10px; left: 0;">
                                    <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i>
                                        {{ $post->created_at->diffForHumans() }}</a>
                                    <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i>
                                        {{ $post->views ?? 0 }} Views</a>
                                    <a href="#" class="text-white me-3 link-hover"><i
                                            class="fa fa-comment-dots"></i> {{ $post->comments_count ?? 0 }}
                                        Comments</a>
                                    <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i>
                                        {{ $post->shares ?? 0 }} Shares</a>
                                </div> --}}
                            </div>
                            <div class="border-bottom py-3">
                                <a href="{{ route('trangchu.postsDetail', $post->slug) }}"
                                    class="display-4 text-dark mb-0 link-hover">{{ $post->title }}</a>
                            </div>
                            <p class="mt-3 mb-4">{{ Str::limit($post->content, 150) }}</p>
                        @endforeach
                    @else
                        <p>Không có bài viết nào trong danh mục này.</p>
                    @endif
                </div>

                <div class="col-lg-5 col-xl-4">
                    <h3 class="mb-4">Bài viết nổi bật</h3>
                    @foreach ($category->posts->skip(1)->take(5) as $post)
                        <div class="row g-4 align-items-center mb-3">
                            <div class="col-5">
                                <div class="overflow-hidden rounded">
                                    <img src="{{ asset('storage/' . $post->image) }}"
                                        class="img-zoomin img-fluid rounded w-100" alt="{{ $post->title }}">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="features-content d-flex flex-column">
                                    <a href="{{ route('trangchu.postsDetail', $post->slug) }}"
                                        class="h6">{{ $post->title }}</a>
                                    <small><i class="fa fa-clock"></i> {{ $post->created_at->diffForHumans() }}</small>
                                    <small><i class="fa fa-eye"></i> {{ $post->views ?? 0 }} Views</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach


    </div>
</div>
<div class="container-fluid latest-news py-5">
    <div class="container py-5">
        <h2 class="mb-4">VNXPRESS</h2>
        <div class="latest-news-carousel owl-carousel owl-loaded owl-drag">
            @foreach ($rssArticles as $article)
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="{{ $article['image'] }}" class="img-zoomin img-fluid rounded-top w-100"
                                alt="{{ $article['title'] }}">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="{{ $article['link'] }}" target="_blank"
                                class="h4">{{ $article['title'] }}</a>
                            <div class="d-flex justify-content-between">
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                                    {{ date('d M Y', strtotime($article['published_at'])) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
