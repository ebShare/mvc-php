<?php
namespace Application\Model\Post;
require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/comment.php');

use Application\Model\Post\PostRepository;

function post(string $identifier)
{
    $connection = new DatabaseConnection();

    $postRepository = new Application\Model\Post\PostRepository();
    $postRepository->connection=$connection;
    $post = $postRepository->getPost($identifier);

    $commentRepository=new CommentRepository();
    $commentRepository-> connection=$connection;
    $comments = $commentRepository->getComments($identifier);

    require('templates/post.php');
}
