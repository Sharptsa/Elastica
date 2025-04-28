<?php

declare(strict_types=1);

namespace Elastica\Test\Query;

use Elastica\Query\Prefix;
use Elastica\Test\Base as BaseTest;

/**
 * @internal
 */
class PrefixTest extends BaseTest
{
    /**
     * @group unit
     */
    public function testToArray(): void
    {
        $query = new Prefix();
        $key = 'name';
        $value = 'ni';
        $boost = 2;
        $query->setPrefix($key, $value, $boost);
        $query->setRewrite(Prefix::REWRITE_SCORING_BOOLEAN);

        $data = $query->toArray();

        $this->assertIsArray($data['prefix']);
        $this->assertIsArray($data['prefix'][$key]);
        $this->assertEquals($data['prefix'][$key]['value'], $value);
        $this->assertEquals($data['prefix'][$key]['boost'], $boost);
        $this->assertEquals($data['prefix'][$key]['rewrite'], 'scoring_boolean');
    }
}
