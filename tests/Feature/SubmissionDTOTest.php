<?php

namespace Tests\Feature;

use App\DTO\SubmissionDTO;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionDTOTest extends TestCase
{
    /**
     * Test creation of SubmissionDTO and its toArray method.
     *
     * @return void
     */
    public function test_submission_dto_creation_and_to_array()
    {
        // Arrange
        $name = 'John Doe';
        $email = 'john@example.com';
        $message = 'This is a test message';

        // Act
        $submissionDTO = new SubmissionDTO($name, $email, $message);
        $array = $submissionDTO->toArray();

        // Assert
        $this->assertEquals($name, $submissionDTO->name);
        $this->assertEquals($email, $submissionDTO->email);
        $this->assertEquals($message, $submissionDTO->message);

        $this->assertIsArray($array);
        $this->assertArrayHasKey('name', $array);
        $this->assertArrayHasKey('email', $array);
        $this->assertArrayHasKey('message', $array);
        $this->assertEquals($name, $array['name']);
        $this->assertEquals($email, $array['email']);
        $this->assertEquals($message, $array['message']);
    }

    /**
     * Test creation of SubmissionDTO from an array.
     *
     * @return void
     */
    public function test_submission_dto_from_array()
    {
        // Arrange
        $data = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'Another test message',
        ];

        // Act
        $submissionDTO = SubmissionDTO::fromArray($data);

        // Assert
        $this->assertInstanceOf(SubmissionDTO::class, $submissionDTO);
        $this->assertEquals($data['name'], $submissionDTO->name);
        $this->assertEquals($data['email'], $submissionDTO->email);
        $this->assertEquals($data['message'], $submissionDTO->message);
    }
}
