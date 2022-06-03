<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Str;

    class Article extends Model {
        use HasFactory;

        protected $dates = ['published_at'];

        protected $fillable = ['title', 'body', 'img', 'slug'];

        public function comments () {
            return $this->hasMany(Comment::class);
        }

        public function state () {
            return $this->hasOne(State::class);
        }

        public function tags () {
            return $this->belongsToMany(Tag::class);

        }

        public function getBodyPreview () {
            return Str::limit($this->body, 100);
        }

        public function createdAtForHumans () {
            return $this->created_at->diffForHumans();
        }

        public function publishedAtForHumans () {
            return $this->published_at->diffForHumans();
        }

        public function scopeLastLimit ($query, $numbers) {
            return $query->with('state', 'tags')->orderBy('created_at', 'desc')->take($numbers)->get();
        }

        public function scopeAllPaginate ($query, $number) {
            return $query->with('state', 'tags')->orderBy('created_at', 'desc')->paginate($number);

        }

        public function scopeFindBySlug ($query, $slug) {
            return $query->with('comments', 'tags', 'state')->where('slug', $slug)->firstOrFail();
        }

       public function scopeFindByTag ($query) {
            return $query->with('state', 'tags')->orderBy('created_at', 'desc')->paginate(6);
        }

    }
