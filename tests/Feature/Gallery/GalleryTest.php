<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Tests\Classes\TestFunctionsMixin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class GalleryTest extends TestCase
{

    use RefreshDatabase;
    use TestFunctionsMixin;

    /**
     * A basic feature test example.
     */
    public function test_can_view_gallery(): void
    {
        $school = $this->seedOneRandomSchool();

        // URL GET: gallery/23 where 23 is the school id
        $response = $this->get('gallery/' .  $school->id );

        $response->assertStatus(200);
    }

    public function text_can_add_to_gallery(): void {

        $image_name = 'gallery_items.jpg';
        $image_path = './' . $image_name;

        Storage::fake('gallary_items');

        // URL POST: gallery/
        $response = $this->json('POST','gallery', [
            'gallery_item' => UploadedFile::fake()->image($image_path)
        ]);

        Storage::disk('gallery_items')->assertExists($image_name);
    }
}
