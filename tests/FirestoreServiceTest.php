<?php


namespace OneSite\NinePay\Firestore\Tests;


use GuzzleHttp\Psr7\Response;
use OneSite\Firestore\FirestoreService;
use PHPUnit\Framework\TestCase;


class FirestoreServiceTest extends TestCase
{

    private $service;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->service = new FirestoreService();
    }

    /**
     *
     */
    public function tearDown(): void
    {
        $this->service = null;

        parent::tearDown();
    }

    /**
     * PHPUnit test: vendor/bin/phpunit --filter testGetData tests/FirestoreServiceTest.php
     */
    public function testGetData()
    {
        $data = $this->service->getData('cities', 'HN');

        echo "\n" . json_encode($data);

        $this->assertTrue(true);
    }

    /**
     * PHPUnit test: vendor/bin/phpunit --filter testInsertData tests/FirestoreServiceTest.php
     */
    public function testInsertData()
    {
        $this->service->insert('cities', 'HCM', [
            'name' => 'Ho Chi Minh'
        ]);

        $this->assertTrue(true);
    }

}
