<?php


namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;


# app/tests/controllers/FileUploadController.php
class UploadsTest extends TestCase
{

    /** @test */
    public function testdropzoneFileUpload1()

    {
        // Arrange
        //Generujemy dane
        Storage::fake('files');

        // Act
        //Wysyłamy plik
        $response = $this->json('POST', '/file-upload', [

            'file' => UploadedFile::fake()->image('indeks.jpg')

        ]);

        // Assert
        // Sprawdzamy czy plik został dodany
        Storage::disk('local')->assertExists('indeks.jpg');

    }
}