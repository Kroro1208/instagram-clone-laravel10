<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $url = $this->getUrl('post');
        $mime = $this->getMime($url);
        return [
            'url' => $url,
            'mime' => $mime,
            'mediable_id' => Post::factory(),
            'mediable_type' => function (array $attributes) {
                return Post::find($attributes['mediable_id'])->getMorphClass();
            }
        ];
    }

    function getUrl($type = 'post'): string
    {
        switch ($type) {
            case 'post':
                $urls = [
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4',
                    "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4",
                    'https://images.unsplash.com/photo-1682687219570-4c596363fd96?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8',
                    'https://plus.unsplash.com/premium_photo-1708566712193-d7cef7c794c6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxM3x8fGVufDB8fHx8fA%3D%3D'
                ];
                return $this->faker->randomElement($urls);
            case 'reel':
                $urls = [
                    "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4",
                    "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4",
                    "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/VolkswagenGTIReview.mp4"
                ];
                return $this->faker->randomElement($urls);
            default:
                // 処理
                break;
        }
    }

    function getMime($url): string
    {
        if (str_contains($url, 'gtv-videos-bucket')) {
            return 'video';
        } elseif (str_contains($url, 'images.unsplash.com')) {
            return 'image';
        } else {
            return 'unknown';
        }
    }

    // chainable methods
    function reel(): Factory
    {
        $url = $this->getUrl('reel');
        $mime = $this->getMime($url);
        return $this->state(function ($attributes) use ($url, $mime) {
            return [
                'mime' => $mime,
                'url' => $url
            ];
        });
    }

    function post(): Factory
    {
        $url = $this->getUrl('post');
        $mime = $this->getMime($url);
        return $this->state(function ($attributes) use ($url, $mime) {
            return [
                'mime' => $mime,
                'url' => $url
            ];
        });
    }
}
