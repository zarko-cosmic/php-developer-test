<?php

use LittleThings\Post;

class PostTest extends PHPUnit_Framework_TestCase
{
    function setUp()
    {
        $this->post = new Post(1, '2015-01-01', 1, 'Title', 'title');
    }

    /** @test */
     function it_creates_post_object_with_named_constructor()
     {
         $this->assertInstanceOf('LittleThings\Post', $this->post);
     }

    /** @test */
    function it_serializes_properties_when_json_encoded()
    {
        $this->assertJson(json_encode($this->post));

        $keys = array_keys($this->post->jsonSerialize());        
        $post = json_decode(json_encode($this->post), true);

        array_map(function ($key) use ($post) {
            $this->assertArrayHasKey($key, $post);
        }, $keys);
    }
}