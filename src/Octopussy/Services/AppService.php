<?php
namespace Octopussy\Services;

use Octopussy\Exceptions\AppException;
use Octopussy\Exceptions\SocketException;

/**
 * Class AppService. Application Service
 *
 * @package Octopussy\Services
 * @subpackage Octopussy
 * @since PHP >=5.5
 * @version 1.0
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 * @filesource /Octopussy/Services/AppService.php
 */
class AppService {

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
     * @throws \Octopussy\Exceptions\AppException
     */
    public function __construct(\Phalcon\Config $config) {

        if(!$this->socketService) {

            if(isset($config->socket) === false) {
                throw new AppException('There is no option `socket` in your configurations');
            }

            $this->socketService = new SocketService($config);
        }
    }

    /**
     * Run socket server
     * @throws \Octopussy\Exceptions\AppException
     */
    public function run() {

        try {
            $this->socketService->run();
        }
        catch(SocketException $e) {
            throw new AppException($e->getMessage());
        }
    }

}