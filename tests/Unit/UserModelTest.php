<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Checking the operation of the method verifying the role of the user, for the moderator user.
     *
     * @return void
     */
    public function testModeratorMethod()
    {
        $user = User::factory()->moderator()->create();

        $this->assertTrue($user->isModerator());
    }
}
