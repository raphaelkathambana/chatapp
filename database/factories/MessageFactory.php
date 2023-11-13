<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => $this->faker->sentence,
            'read' => false,
            'read_at' => null,
            'sent_at' => now(),
            'received_at' => now(),
            'deleted_at' => null,
            'archived_at' => null,
        ];
    }
}
