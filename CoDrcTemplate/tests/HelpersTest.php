<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Helpers;

class HelpersTest extends TestCase
{
    /**
     * Test sanitize method without capitalization
     */
    public function testSanitizeWithoutCapitalization()
    {
        $input = '<script>alert("xss")</script>';
        $expected = '&lt;script&gt;alert(&quot;xss&quot;)&lt;/script&gt;';

        $result = Helpers::sanitize($input);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test sanitize method with capitalization
     */
    public function testSanitizeWithCapitalization()
    {
        $input = 'low';
        $expected = 'Low';

        $result = Helpers::sanitize($input, true);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test sanitize with special characters and capitalization
     */
    public function testSanitizeSpecialCharsWithCapitalization()
    {
        $input = '<moderate>';
        $expected = '&lt;moderate&gt;';

        $result = Helpers::sanitize($input, true);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test sanitize with empty string
     */
    public function testSanitizeEmptyString()
    {
        $input = '';
        $expected = '';

        $result = Helpers::sanitize($input);

        $this->assertEquals($expected, $result);
    }
}
