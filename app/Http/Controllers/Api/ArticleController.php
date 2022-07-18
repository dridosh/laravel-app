<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Resources\ArticleResource;
    use App\Models\Article;
    use App\Services\ArticleService;
    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;


    class ArticleController extends Controller {


        protected $service;

        public function __construct(ArticleService $service) {
            $this->service = $service;
        }

        public function show (Request $request) {
    //        $article = $this->service->getArticleBySlug($request);
            $slug=$request->get('slug');
          //  dump($slug);
            $article=Article::FindBySlug($slug);
            return new ArticleResource($article);
       }

        public function viewsIncrement (Request $request) {
            $slug=$request->get('slug');
            $article=Article::FindBySlug($slug);
            $article->state->increment('views');
            return new ArticleResource($article);
       }

        public function likesIncrement (Request $request) {
            $slug=$request->get('slug');
            $article=Article::FindBySlug($slug);

       }


    }
