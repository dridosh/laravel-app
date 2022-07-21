<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Resources\ArticleResource;
    use App\Services\ArticleService;
    use Illuminate\Http\Request;


    class ArticleController extends Controller {


        protected $service;

        public function __construct(ArticleService $service) {
            $this->service = $service;
        }

        public function show (Request $request) {
            $article = $this->service->getArticleBySlug($request);
            return new ArticleResource($article);
       }

        public function viewsIncrement (Request $request) {
            $article = $this->service->getArticleBySlug($request);
            $article->state->increment('views');
            return new ArticleResource($article);
       }

        public function likesIncrement (Request $request) {
            $article = $this->service->getArticleBySlug($request);
            $inc = $request->get('increment');
            $inc ? $article->state->increment('likes') : $article->state->decrement('likes');
            return new ArticleResource($article);
        }



    }
