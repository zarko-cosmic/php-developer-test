<?php

use LittleThings\JsonPostRepository;
use LittleThings\Post;
use LittleThings\PostCollection;

class JsonPostRepositoryTest extends PHPUnit_Framework_TestCase
{
    function setUp()
    {
        $this->jsonFile = STORAGE_PATH . '/posts-test.json';
        copy(STORAGE_PATH . '/posts.json', $this->jsonFile);
        $this->repo = new JsonPostRepository($this->jsonFile);
    }

    function tearDown()
    {
        if (file_exists($this->jsonFile)) {
            unlink($this->jsonFile);
        }
    }

    /** @test */
    function it_should_find_a_post_by_id()
    {
        $post = $this->repo->findById(24280);

        $this->assertInstanceOf('LittleThings\Post', $post);
    }

    /** @test */
    function it_should_not_find_a_post_by_id_when_doesnt_exist()
    {
        $post = $this->repo->findById(100000);

        $this->assertNull($post);
    }

    /** @test */
    function it_should_get_all_posts()
    {
        $posts = $this->repo->all();

        $this->assertInstanceOf('LittleThings\PostCollection', $posts);
        $this->assertEquals(8, $posts->count());
    }

    /** @test */
    function it_should_add_post_to_repository()
    {
        $this->repo->add(new Post(5, '2015-04-20', 1, 'Title 5', 'slug-5'));

        $newRepo = new JsonPostRepository($this->jsonFile);

        $this->assertEquals(9, $this->repo->all()->count());
        $this->assertEquals(9, $newRepo->all()->count());
    }
}