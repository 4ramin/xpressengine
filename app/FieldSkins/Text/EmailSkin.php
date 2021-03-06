<?php
/**
 * EmailSkin.php
 *
 * PHP version 7
 *
 * @category    FieldSkins
 * @package     App\FieldSkins\Text
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        https://xpressengine.io
 */

namespace App\FieldSkins\Text;

use Xpressengine\DynamicField\AbstractSkin;

/**
 * Class EmailSkin
 *
 * PHP version 7
 *
 * @category    FieldSkins
 * @package     App\FieldSkins\Text
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        https://xpressengine.io
 */
class EmailSkin extends AbstractSkin
{
    protected static $id = 'fieldType/xpressengine@Text/fieldSkin/xpressengine@TextEmail';
    protected $name = 'Text default';
    protected $description = '문자열 이메일 스킨';


    /**
     * get name of skin
     *
     * @return string
     */
    public function name()
    {
        return 'Text email';
    }

    /**
     * get view file directory path
     *
     * @return string
     */
    public function getPath()
    {
        return 'dynamicField/text/email';
    }

    /**
     * 다이나믹필스 생성할 때 스킨 설정에 적용될 rule 반환
     *
     * @return array
     */
    public function getSettingsRules()
    {
        return [];
    }
}
