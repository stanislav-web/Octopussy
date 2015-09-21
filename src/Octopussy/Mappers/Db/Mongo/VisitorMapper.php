<?php
namespace Octopussy\Mappers\Db\Mongo;

use Octopussy\Aware\AbstractMongoMapper;
use Octopussy\Models\Visitor;
use Octopussy\Exceptions\MongoMapperException;

/**
 * Class VisitorMapper. Mongo DB Mapper
 *
 * @package Octopussy\Mappers\Db\Mongo
 * @subpackage Octopussy\Mappers\Db
 * @since PHP >=5.5
 * @version 1.0
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanislav WEB
 * @filesource /Octopussy/Mappers/Db/Mongo/VisitorMapper.php
 */
class VisitorMapper extends AbstractMongoMapper {

    /**
     * Using collection
     *
     * @const COLLECTION
     */
    const COLLECTION = Visitor::COLLECTION;

    /**
     * Add records to collection
     *
     * @param array $data
     * @throws \Octopussy\Exceptions\MongoMapperException
     * @return \MongoId
     */
    public function add(array $data) {

        try {
            $document = (new Visitor($data))->toArray();
            $this->collection->insert($document, ['w' => true]);

            return new \MongoId($document['_id']);
        }
        catch (\MongoCursorException $e) {
            throw new MongoMapperException($e->getMessage());
        }
        catch (\MongoException $e) {
            throw new MongoMapperException($e->getMessage());
        }
    }

    /**
     * Remove records from collection
     *
     * @param array $criteria
     * @throws \Octopussy\Exceptions\MongoMapperException
     */
    public function remove(array $criteria) {}
}