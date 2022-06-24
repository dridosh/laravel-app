@extends('layouts.app')
@section('content')
    <div id="app">
        <article-component></article-component>

        <hr>
        <div class="row">
            <form action="">
                <div class="mb-3">
                    <label for="commentSubject" class="form-label">Тема комментария</label>
                    <input type="text" class="form-control" id="commentSubject">
                </div>
                <div class="mb-3">
                    <label for="commentBody" class="form-label">Комментарий</label>
                    <textarea class="form-control" name="" id="commentBody" rows="3"></textarea>
                </div>
                <button class="btn btn-success" type="submit"> Отправить</button>
            </form>
            <div class="toast-container pb-2 mt-5 mx-auto" style="min-width: 100%;">
                @foreach($article->comments as $comment)
                    <div class="toast show" style="min-width: 100%;">
                        <div class="toast-header">
                            <img src="https://via.placeholder.com/50/5F113B/FFFFFF/?text=User" class="rounded me-2"
                                 alt="...">
                            <strong class="me-auto">{{$comment->subject}}</strong>
                            <small class="text-muted">{{$comment->createdAtForHumans()}}</small>
                        </div>
                        <div class="toast-body">
                            {{$comment->body}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('vue')
    <script src="{{mix('js/app.js')}}"></script>
@endsection
