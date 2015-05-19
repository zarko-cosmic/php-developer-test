<?php

require 'bootstrap.php';

use LittleThings\JsonPostRepository;
use LittleThings\Post;

$postsJson = STORAGE_PATH . '/posts-copy.json';
copy(config()['posts_json'], $postsJson);

$repo = new JsonPostRepository($postsJson);

// Ensure that post with ID of 24280 works
var_dump($repo->findById(24280));

// Add new post to repository and ensure it persists
$repo->add(new Post(123, '2015-01-01', 1, 'This is the Title', 'this-is-the-title'));
var_dump($repo->findById(123));

// Get all posts and ensure json_encode works
echo json_encode($repo->all());
