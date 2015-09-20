<?php
namespace Octopussy\Services;

use Octopussy\Exceptions\QueueServiceException;
use Octopussy\Mappers\Queue\BeanstalkMapper;
use Octopussy\Exceptions\BeanstalkMapperException;
/**
 * Class QueueService. Queue service
 *
 * @package Octopussy\Services
 * @subpackage Octopussy
 * @since PHP >=5.5
 * @version 1.0
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 * @filesource /Octopussy/Services/QueueService.php
 */
class QueueService {

    /**
     * Beanstalk server's mapper
     *
     * @var \Octopussy\Mappers\Queue\BeanstalkMapper $beanstalkMapper
     */
    private $beanstalkMapper;

    /**
     * Implement configurations
     *
     * @param \Phalcon\Config $config $config
     * @throws \Octopussy\Exceptions\QueueServiceException
     */
    public function __construct(\Phalcon\Config $config) {

        if($this->beanstalkMapper === null) {

            try {
                $this->beanstalkMapper = new BeanstalkMapper($config->toArray());
            }
            catch(BeanstalkMapperException $e) {
                throw new QueueServiceException($e->getMessage());
            }
        }
    }

    /**
     * Push data to task
     *
     * @param array $message
     * @param callable $messageHandler
     * @return null
     */
    public function push(array $message, callable $messageHandler) {

        $this->beanstalkMapper->put(serialize(
            array_merge(
                $messageHandler(), $message
            )
        ));

        return null;
    }

    /**
     * Pull data from task
     *
     * @param array $credentials
     * @param callable $messageHandler
     * @return array
     */
    public function pull(array $credentials, callable $messageHandler) {

        return $messageHandler($this->beanstalkMapper->read($credentials));
    }
}