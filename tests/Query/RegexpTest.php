<?php

declare(strict_types=1);

namespace Elastica\Test\Query;

use Elastica\Query\Regexp;
use Elastica\Test\Base as BaseTest;

/**
 * @internal
 */
class RegexpTest extends BaseTest
{
    /**
     * @group unit
     */
    public function testToArray(): void
    {
        $field = 'name';
        $value = 'ruf';
        $boost = 2;

        $query = new Regexp($field, $value, $boost);
        $query->setRewrite(Regexp::REWRITE_SCORING_BOOLEAN);

        $expectedArray = [
            'regexp' => [
                $field => [
                    'value' => $value,
                    'boost' => $boost,
                    'rewrite' => 'scoring_boolean',
                ],
            ],
        ];

        $this->assertequals($expectedArray, $query->toArray());
    }
}
