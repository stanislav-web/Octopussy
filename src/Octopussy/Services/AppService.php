<?php
namespace Octopussy\Services;

use Octopussy\Exceptions\AppException;

/**
 * AppService class. Application Service
 *
 * @package Octopussy
 * @subpackage Octopussy\Services
 * @since PHP >=5.6
 * @version 1.0
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 * @filesource /Octopussy/Services/AppService.php
 */
class AppService {

    /**
     * Application configuration
     *
     * @var \Phalcon\Config $config
     */
    private $config;

    /**
     * Socket service
     *
     * @var \Octopussy\Services\SocketService $socketService
     */
    private $socketService;

    /**
     * Initial module configuration params
     *
     * @param \Phalcon\Config $config
     */
    public function __construct(\Phalcon\Config $config) {

        if(!$this->config) {
            $this->config = $config;
        }

        if(!$this->socketService) {

            if(isset($this->config->socket) === false) {
                throw new AppException('There is no option `socket` in your configurations');
            }
            $this->socketService = new SocketService($this->config->socket);
        }
    }

    /**
     * Run socket server
     */
    public function run() {
        $this->socketService->run();
    }
}