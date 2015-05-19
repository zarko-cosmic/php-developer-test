<?php

namespace LittleThings;

interface PostRepository
{
    /**
     * Return collection of all posts
     *
     * @return PostCollection
     */
    public function all();

    /**
     * Add new post to repository
     *
     * @param Post $post
     * @return boolean
     */
    public function add(Post $post);

    /**
     * Find post by specific ID
     *
     * @param integer $id
     * @return Post
     */
    public function findById($id);
}