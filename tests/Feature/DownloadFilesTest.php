<?php
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;


# app/tests/controllers/FileUploadController.php
class DonloadFilesTest extends TestCase
{

    /** @test */
    public function testDownload()

    {
        // Arrange
        // Tworzymy plik testowy do pobrania
        $test = "test.jpg";
        Storage::fake('files');
        $response = $this->json('POST', '/file-upload', [

            'file' => UploadedFile::fake()->image($test)

        ]);

        // Act
        //Pobieramy plik
        $response = $this->get('/download/test.jpg');

        // Assert
        // Sprawdzamy czy plik został pobrany
        $response->assertStatus(200);

    }
}