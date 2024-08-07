<?php
/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) NPO baser foundation <https://baserfoundation.org/>
 *
 * @copyright     Copyright (c) NPO baser foundation
 * @link          https://basercms.net baserCMS Project
 * @since         5.0.0
 * @license       https://basercms.net/license/index.html MIT License
 */

namespace BcThemeFile\Test\TestCase\Model\Entity;
use BaserCore\TestSuite\BcTestCase;
use BcThemeFile\Model\Entity\ThemeFile;

/**
 * Class ThemeFileTest
 */
class ThemeFileTest extends BcTestCase
{
    /**
     * @var ThemeFile
     */
    public $ThemeFile;

    /**
     * Set Up
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->ThemeFile = new ThemeFile(['fullpath' => TMP_TESTS]);
    }

    /**
     * test __construct
     */
    public function test__construct()
    {
        //$options['new'] == empty
        $this->assertEquals('/var/www/html/tmp/', $this->ThemeFile->parent);

        //$options['new'] != empty & type = css
        $this->ThemeFile = new ThemeFile(['fullpath' => TMP_TESTS], ['new' => true, 'type' => 'css']);
        $this->assertEquals('/var/www/html/tmp/tests/', $this->ThemeFile->parent);
        $this->assertEquals('css', $this->execPrivateMethod($this->ThemeFile, '_getExt', []));

        //$options['new'] != empty & type はCssとJsではない
        $this->ThemeFile = new ThemeFile(['fullpath' => TMP_TESTS], ['new' => true, 'type' => 'php']);
        $this->assertEquals('/var/www/html/tmp/tests/', $this->ThemeFile->parent);
        $this->assertEquals('php', $this->execPrivateMethod($this->ThemeFile, '_getExt', []));
    }

    /**
     * test _getType
     * @dataProvider getTypeDataProvider
     * @param $fullpath
     * @param $expect
     */
    public function test_getType($fullpath, $expect)
    {
        $this->ThemeFile->fullpath = $fullpath;
        $rs = $this->execPrivateMethod($this->ThemeFile, '_getType', []);
        $this->assertEquals($expect, $rs);
    }

    public static function getTypeDataProvider()
    {
        return [
            ['/var/www/html/plugins/BcThemeSample/templates/layout/default.ctp', 'text'],
            ['/var/www/html/plugins/BcThemeSample/templates/layout/default.php', 'text'],
            ['/var/www/html/plugins/BcThemeSample/templates/layout/css/default.css', 'text'],
            ['/var/www/html/plugins/BcThemeSample/templates/layout/js/default.js', 'text'],
            ['/var/www/html/plugins/BcThemeSample/templates/layout/image/default.png', 'image'],
            ['/var/www/html/plugins/BcThemeSample/templates/layout/image/default.gif', 'image'],
            ['/var/www/html/plugins/BcThemeSample/templates/layout/image/default.jpg', 'image'],
            ['/var/www/html/plugins/BcThemeSample/templates/layout/image/default.jpeg', 'image'],
            ['/var/www/html/plugins/BcThemeSample/templates/layout/other/default.html', 'file'],
        ];
    }

    /**
     * test _getName
     */
    public function test_getName()
    {
        $this->markTestIncomplete('このテストは、まだ実装されていません。');
    }

    /**
     * test _getBaseName
     * @dataProvider getBaseNameDataProvider
     * @param $fullpath
     * @param $expect
     *
     */
    public function test_getBaseName($fullpath, $expect)
    {
        $this->ThemeFile->fullpath = $fullpath;
        $rs = $this->execPrivateMethod($this->ThemeFile, '_getBaseName', []);
        $this->assertEquals($expect, $rs);
    }

    public static function getBaseNameDataProvider()
    {
        return [
            ['/var/www/html/tmp/', ''], //isNew = true
            ['/var/www/html/tmp/default.php', 'default'] //isNew = false
        ];
    }

    /**
     * test _getExt
     * @dataProvider getExtDataProvider
     * @param $fullpath
     * @param $expect
     */
    public function test_getExt($fullpath, $expect)
    {
        $this->ThemeFile->fullpath = $fullpath;
        $rs = $this->execPrivateMethod($this->ThemeFile, '_getExt', []);
        $this->assertEquals($expect, $rs);
    }

    public static function getExtDataProvider()
    {
        return [
            ['/var/www/html/tmp/', ''], //isNew = true
            ['/var/www/html/tmp/default.php', 'php'] //isNew = false
        ];
    }

    /**
     * test _getContents
     */
    public function test_getContents()
    {
        $this->markTestIncomplete('このテストは、まだ実装されていません。');
    }

    /**
     * test isNew
     */
    public function test_isNew()
    {
        $this->markTestIncomplete('このテストは、まだ実装されていません。');
    }
}