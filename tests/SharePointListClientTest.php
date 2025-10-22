<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\SharePointListClient;

class SharePointListClientTest extends TestCase
{
    /**
     * Test decodeFieldName with hyphen encoding
     */
    public function testDecodeFieldNameWithHyphen()
    {
        $encoded = 'higher_x002d_elevation';
        $expected = 'higher-elevation';

        $result = SharePointListClient::decodeFieldName($encoded);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test decodeFieldName with space encoding
     */
    public function testDecodeFieldNameWithSpace()
    {
        $encoded = 'Field_x0020_Name';
        $expected = 'Field Name';

        $result = SharePointListClient::decodeFieldName($encoded);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test decodeFieldName with underscore encoding
     */
    public function testDecodeFieldNameWithUnderscore()
    {
        $encoded = 'Field_x005f_Name';
        $expected = 'Field_Name';

        $result = SharePointListClient::decodeFieldName($encoded);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test decodeFieldName with multiple encodings
     */
    public function testDecodeFieldNameWithMultipleEncodings()
    {
        $encoded = 'test_x002d_field_x0020_name';
        $expected = 'test-field name';

        $result = SharePointListClient::decodeFieldName($encoded);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test decodeFieldName with no encoding
     */
    public function testDecodeFieldNameWithNoEncoding()
    {
        $encoded = 'SimpleFieldName';
        $expected = 'SimpleFieldName';

        $result = SharePointListClient::decodeFieldName($encoded);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test decodeFieldName with empty string
     */
    public function testDecodeFieldNameWithEmptyString()
    {
        $encoded = '';
        $expected = '';

        $result = SharePointListClient::decodeFieldName($encoded);

        $this->assertEquals($expected, $result);
    }
}
