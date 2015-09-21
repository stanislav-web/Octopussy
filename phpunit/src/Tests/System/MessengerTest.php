<?php
namespace Octopussy\Tests\System;

use Octopussy\System\Messenger;
use Phalcon\Script\Color;

/**
 * Class MessengerTest
 *
 * @package Octopussy\Tests\System
 * @subpackage Octopussy\Tests
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 * @filesource /Octopussy/Models/MessengerTest.php
 */
class MessengerTest extends \PHPUnit_Framework_TestCase {

    /**
     * Testing object namespace
     *
     * @const INSTANCE_OBJECT
     */
    const INSTANCE_OBJECT = 'Octopussy\System\Messenger';

    /**
     * Instance testing
     */
    public function testInstance() {

        $data = new Messenger();

        // checking instance object return
        $this->assertInstanceOf(self::INSTANCE_OBJECT, $data);
    }

    /**
     * Start message test
     */
    public function testStart() {
        $this->assertInternalType('string', Messenger::start());
    }

    /**
     * Greeting message test
     */
    public function testOpen() {
        $this->assertInternalType('string', Messenger::open('test'));
    }

    /**
     * Sending message test
     */
    public function testMessage() {
        $this->assertInternalType('string', Messenger::message('test', 'test'));
    }

    /**
     * Closing message test
     */
    public function testClose() {
        $this->assertInternalType('string', Messenger::close('test'));
    }

    /**
     * Error message test
     */
    public function testError() {
        $this->assertInternalType('string', Messenger::error('test'));
    }
}
