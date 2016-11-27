<?php

use PHPUnit\Framework\TestCase;
use ShinkyuMartialArts\Mailtrap\Api\Api;

class MailtrapTest extends TestCase
{
    const API_TOKEN = '0aa0aaa0a0aa00aa000a0a000aaa0000';

    protected $api;

    public function setUp()
    {
        $this->api = new Api(self::API_TOKEN);
    }

    public function testApiCanBeInstantiated()
    {
        $this->assertInstanceOf(Api::class, $this->api);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
