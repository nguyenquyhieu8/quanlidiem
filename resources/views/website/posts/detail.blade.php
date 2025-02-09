@extends('website.components.layout');
@section('title')
    Chào mừng bạn đến với
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <ol class="breadcrumb justify-content-start mb-4">
                <li class="breadcrumb-item"><a href="/trang-chu">trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">bài viết</a></li>
                <li class="breadcrumb-item active text-dark">{{ $introduct->title }}</li>
            </ol>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <a href="#" class="h1 display-5">{{ $introduct->title }}</a>
                    </div>
                    <div class="position-relative rounded overflow-hidden mb-3">
                    </div>
                    {{-- <div class="d-flex justify-content-between">
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i>
                            {{ \Carbon\Carbon::parse($introduct->published_at)->diffInMinutes() }} minute read</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i>
                            {{ $introduct->views }} Views</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i>
                            {{ $introduct->comments_count }} Comment</a>
                        <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i>
                            {{ $introduct->shares }} Share</a>
                    </div> --}}
                    <p class="my-4">{!! $introduct->content !!}</p>
                </div>
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="p-3 rounded border">
                                <h4 class="my-4">Thời sự (Vnexpress)</h4>
                                <div class="row g-4">
                                    <div class="col-12">
                                        @foreach (array_slice($rssArticles, 7, 7) as $index => $rssPost)
                                            <div class="row g-4 align-items-center features-item mb-3">
                                                <div class="col-4">
                                                    <div class="rounded-circle position-relative">
                                                        <div class="overflow-hidden rounded-circle">
                                                            <img src="{{ $rssPost['image'] }}"
                                                                class="img-zoomin img-fluid rounded-circle w-100"
                                                                alt="{{ $rssPost['title'] }}">
                                                        </div>
                                                        <span
                                                            class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute"
                                                            style="top: 10%; right: -10px;">{{ $index + 1 }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">Thời sự</p>
                                                        <a href="{{ $rssPost['link'] }}" target="_blank" class="h6">
                                                            {{ $rssPost['title'] }}
                                                        </a>
                                                        <small class="text-body d-block">
                                                            <i class="fas fa-calendar-alt me-1"></i>
                                                            {{ date('d M Y, H:i', strtotime($rssPost['published_at'])) }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
