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

    /**
     * Test prop method with simple key
     */
    public function testPropWithSimpleKey()
    {
        $props = ['name' => 'Test Name'];
        $result = Helpers::prop($props, 'name');

        $this->assertEquals('Test Name', $result);
    }

    /**
     * Test prop method with nested key (dot notation)
     */
    public function testPropWithNestedKey()
    {
        $props = [
            'dispatchInfo' => [
                'base_path' => '/test/path'
            ]
        ];

        $result = Helpers::prop($props, 'dispatchInfo.base_path');

        $this->assertEquals('/test/path', $result);
    }

    /**
     * Test prop method with deeply nested key
     */
    public function testPropWithDeeplyNestedKey()
    {
        $props = [
            'level1' => [
                'level2' => [
                    'level3' => 'deep value'
                ]
            ]
        ];

        $result = Helpers::prop($props, 'level1.level2.level3');

        $this->assertEquals('deep value', $result);
    }

    /**
     * Test prop method with missing key returns default
     */
    public function testPropWithMissingKeyReturnsDefault()
    {
        $props = ['name' => 'Test'];
        $result = Helpers::prop($props, 'missing.key', 'default value');

        $this->assertEquals('default value', $result);
    }

    /**
     * Test prop method with missing key returns empty string by default
     */
    public function testPropWithMissingKeyReturnsEmptyString()
    {
        $props = ['name' => 'Test'];
        $result = Helpers::prop($props, 'missing.key');

        $this->assertEquals('', $result);
    }

    /**
     * Test prop method with partially missing nested key
     */
    public function testPropWithPartiallyMissingNestedKey()
    {
        $props = [
            'dispatchInfo' => [
                'name' => 'Test Center'
            ]
        ];

        $result = Helpers::prop($props, 'dispatchInfo.base_path', '/default');

        $this->assertEquals('/default', $result);
    }
}
