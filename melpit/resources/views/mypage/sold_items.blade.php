@extends('layouts.app')

@section('title')
    出品した商品一覧
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-10 offset-1 bg-white">

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">出品した商品</div>

                @foreach ($items as $item)
                    <div class="d-flex mt-3 border position-relative">
                        <div>
                            <img src="/storage/item-images/{{$item->image_file_name}}" class="img-fluid" style="height: 140px;">
                        </div>
                        <div class="flex-fill p-3">
                            <div>
                                @if ($item->isStateSelling)
                                    <span class="badge badge-success px-2 py-2">出品中</span>
                                @else
                                    <span class="badge badge-dark px-2 py-2">売却済</span>
                                @endif
                                <span>{{$item->secondaryCategory->primaryCategory->name}} / {{$item->secondaryCategory->name}}</span>
                            </div>
                            <div class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$item->name}}</div>
                            <div>
                                <i class="fas fa-yen-sign"></i>
                                <span class="ml-1">{{number_format($item->price)}}</span>
                                <i class="far fa-clock ml-3"></i>
                                <span>{{$item->created_at->format('Y年n月j日 H:i')}}</span>
                            </div>
                        </div>
                        <a href="{{ route('item', [$item->id]) }}" class="stretched-link"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
