<?php

namespace Adrenth\Thetvdb\Model;

use Illuminate\Support\Collection;
use InvalidArgumentException;

/**
 * Class SeriesActors
 *
 * @category Thetvdb
 * @package  Adrenth\Thetvdb\Model
 * @author   Alwin Drenth <adrenth@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link     https://github.com/adrenth/thetvdb2
 *
 * @method Collection getData()
 */
class SeriesActors extends ValueObject
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $values)
    {
        if (!array_key_exists('data', $values)) {
            throw InvalidArgumentException::expectedIndex('data');
        }

        $items = [];

        foreach ($values['data'] as $seriesActorsData) {
            $items[] = new SeriesActorsData($seriesActorsData);
        }

        parent::__construct([
            'data' => new Collection($items)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return [
            'data'
        ];
    }
}
