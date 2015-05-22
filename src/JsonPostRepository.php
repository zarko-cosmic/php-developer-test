<?php

namespace LittleThings;

class JsonPostRepository implements PostRepository, JsonRepository
{
   protected $path;
   protected $posts;

   function __construct($path) {
      $this->path = $path;
      $postsArray = json_decode( $this->readJson(), true );
      $this->posts = $this->hydrate($postsArray);
   }

    /**
     * Creates array of posts from associative array
     *
     * @param array $posts
     * @return array
     **/
    protected function hydrate(array $posts)
    {
        return array_map(function ($post) {
            return new Post(
                $post['id'],
                $post['date'],
                $post['authorId'],
                $post['title'],
                $post['slug']
            );
        }, $posts);
    }

   public function readJson() {
      return file_get_contents($this->path);
   }

   public function writeJson(array $data) {

   }

   public function add(Post $post) {
      $this->posts[] = $post;

   }

   public function findById($postId) {
      foreach($this->posts as $post) {
         if($post->id == $postId)
            return $post;
      }

      return NULL;
   }

   public function all() {
      return new PostCollection($this->posts);
   }
}