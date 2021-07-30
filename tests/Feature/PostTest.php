<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comment;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    public function testNoBlogPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No posts found!');
    }
    public function testSee1BlogPostWhenThereIs1WithNoComment()
    {   //Arrange
        $post = $this->createDummyBlogPost();


        //Act 
        $response = $this->get('/posts');

        //Assert
        
        $response->assertSeeText('New title');
        // $response->assertSeeText('No comments yet!');

    }
    public function createDummyBlogPost()
    {
        $post = BlogPost::factory()->newTitle()->create();
 
        return $post;
 
    }
}
