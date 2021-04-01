<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'conversation_id' => Conversation::factory(),
            'body' => $this->faker->paragraph()
        ];
    }
}
