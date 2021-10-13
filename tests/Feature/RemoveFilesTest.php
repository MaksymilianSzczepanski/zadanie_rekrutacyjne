<?php


namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;


# app/tests/controllers/FileUploadController.php
class RemoveFilesTest extends TestCase
{
   
    /** @test */
    public function testRemove()

    {
        // Arrange
        //Tworzymy plik testowy do usuniecia
        $test = "test.jpg";
        Storage::fake('files');
        $response = $this->json('POST', '/file-upload', [

            'file' => UploadedFile::fake()->image($test)

        ]);
        
        // Act
        //Usuwamy plik testowy
        $response = $this->call('DELETE', '/remove/test.jpg');

        // Assert
        //sprawdzamy czy plik istnieje
        $this->assertTrue(!Storage::disk('local')->exists($test));

    }
}