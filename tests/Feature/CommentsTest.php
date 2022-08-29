<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Film;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test for getting a list of comments.
     *
     * @return void
     * @throws \Exception
     */
    public function testFilmComments()
    {
        $count = random_int(2, 10);
        $film = Film::factory()
            ->has(Comment::factory($count)
                ->for(User::factory()
                    ->create()))
            ->create();
        $comment = $film->comments->first();

        $response = $this->getJson(route('comments.show', $film->id));

        $response->assertStatus(200);
        $response->assertJsonFragment(['count' => $count]);
        $response->assertJsonCount($count, 'data.comments');
        $response->assertJsonFragment([
            'id' => $comment->id,
            'text' => $comment->text,
            'user_id' => $comment->user_id,
            'film_id' => $comment->film_id,
            'comment_id' => $comment->comment_id,
            'created_at' => $comment->created_at,
            'rating' => $comment->rating,
        ]);
    }

    /**
     * Test of adding a new comment.
     *
     * @return void
     */
    public function testAddFilmComment()
    {
        Sanctum::actingAs(User::factory()->create());
        $film = Film::factory()
            ->has(Comment::factory()
                ->for(User::factory()
                    ->create()))
            ->create();

        $newComment = Comment::factory()->make();

        $response = $this->postJson(route('comments.store', [
            'id' => $film->id,
//            'comment_id' => $film->comments()->first(), TODO Decide on adding a comment to a comment
        ]), [
            'text' => $newComment->text,
            'rating' => $newComment->rating
            ]);

        $response->assertStatus(201);
    }

    /**
     * Validation error verification test.
     * When adding a comment without text.
     *
     * @return void
     */
    public function testValidationErrorAddFilmComment()
    {
        Sanctum::actingAs(User::factory()->create());
        $film = Film::factory()
            ->has(Comment::factory()
                ->for(User::factory()
                    ->create()))
            ->create();

        $response = $this->postJson(route('comments.store', [
            'id' => $film->id,
        ]));

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['text']]);
    }

    /**
     * Authentication error test when adding a comment.
     *
     * @return void
     */
    public function testAuthErrorAddFilmComment()
    {
        $film = Film::factory()
            ->has(Comment::factory()
                ->for(User::factory()
                    ->create()))
            ->create();

        $newComment = Comment::factory()->make();

        $response = $this->postJson(route('comments.store', [
            'id' => $film->id,
        ]), [
            'text' => $newComment->text,
            'rating' => $newComment->rating
        ]);

        $response->assertStatus(401);
//        $response->assertJsonFragment(['message' => 'Запрос требует аутентификации.']);
    }

    /**
     * The test of deleting a comment.
     *
     * @return void
     */
    public function testDeleteComment()
    {
        Sanctum::actingAs(User::factory()->moderator()->create());
        $film = Film::factory()->create();
        $comment = Comment::factory()->for(User::factory()->create())->for($film)->create();

        $response = $this->deleteJson(route('comments.destroy', $comment->id));

        $response->assertStatus(201);
    }
}
