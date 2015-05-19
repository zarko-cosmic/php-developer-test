<?php

use LittleThings\Post;
use LittleThings\PostCollection;

class PostCollectionTest extends PHPUnit_Framework_TestCase
{
    function setUp()
    {
        $this->posts = [
            new Post(1, '2015-01-01', 1, 'Title 1', 'title-1'),
            new Post(2, '2015-01-01', 2, 'Title 2', 'title-2'),
        ];
    }

    /** @test */
    function it_should_instantiate_with_array_of_posts()
    {
        $posts = new PostCollection($this->posts);

        $this->assertInstanceOf('LittleThings\PostCollection', $posts);
    }

    /** @test */
    function it_should_be_enumberable()
    {
        $posts = new PostCollection($this->posts);

        foreach ($posts as $post) {
            $this->assertInstanceOf('LittleThings\Post', $post);
        }
    }

    /** @test */
    function it_serializes_posts_when_json_encoded()
    {
        $posts = new PostCollection($this->posts);

        $this->assertJson(json_encode($posts));

        // Test first post to ensure keys exist
        foreach ($posts as $post) {
            $keys = array_keys($post->jsonSerialize());        
            $post = json_decode(json_encode($post), true);

            array_map(function ($key) use ($post) {
                $this->assertArrayHasKey($key, $post);
            }, $keys);

            break;
        }
    }
}