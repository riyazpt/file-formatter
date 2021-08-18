<?php

namespace Tests\Unit;

use Tests\TestCase;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Response;
use App\FileConvertStrategy\FileConvertStrategy;

class FileFormatterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    /**
     * Console command test
     *
     * @return void
     */
    public function test_console_command_user_input()
    {
        $this->artisan('file:convert D:laravel/htdocs/sacoor-test/tests/Unit/riyas.csv')
            ->expectsQuestion('Please type 0 or 1 to convert file', 'Xml')
            ->expectsOutput("you have selected Xml format")
            ->assertExitCode(0);
    }
    /**
     * File strategy class testing
     *
     * @return void
     */
    public function test_file_created_or_not()
    {
        $fileType = 'Xml';
        $filePath = 'D:/laravel/htdocs/sacoor-test/tests/Unit/riyas.csv';
        $result = new FileConvertStrategy($filePath);
        $result1 = $result->fileConvertStrategy($filePath);

        $this->assertTrue($result1);
    }
    /**
     * File filter
     *
     * @return void
     */
    public function test_json_file_filter()
    {
        $payload = [
            'pvp' => 'asd',
        ];
        $this->json('get', 'api/v1/file/search', $payload)
            ->assertStatus(Response::HTTP_OK);
    }
}
