<?php

namespace LittleThings;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;

class PostCollection implements IteratorAggregate, JsonSerializable
{
    /**
     * Collection of LittleThing\Post objects
     *
     * @var array
     **/
    protected $posts = [];

    /**
     * Constructor
     *
     * @param array $posts
     * @return void
     **/
    public function __construct(array $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get number of posts for current collection
     *
     * @return integer
     **/
    public function count()
    {
        return count($this->posts);
    }

    public function getIterator() {
       return new ArrayIterator( $this->posts );
    }

   public function jsonSerialize() {

   }
}