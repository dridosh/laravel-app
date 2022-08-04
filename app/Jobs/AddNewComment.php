<?php

    namespace App\Jobs;

    use App\Models\Comment;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Queue\SerializesModels;

    class AddNewComment implements ShouldQueue {
        use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

        public $tries =3;

        protected $subject;
        protected $body;
        protected $article_id;

        /**
         * Create a new job instance.
         *
         * @return void
         */
        public function __construct ($subject, $body, $article_id) {
            $this->subject = $subject;
            $this->body = $body;
            $this->article_id = $article_id;
        }

        /**
         * Execute the job.
         *
         * @return void
         */
        public function handle () {
            $comment = Comment::create([
                'subject'    => $this->subject,
                'body'       => $this->body,
                'article_id' => $this->article_id,
            ]);
        }
    }
