<?php
/**
 * NotConfigurationWidgetException
 *
 * PHP version 7
 *
 * @category  Widget
 * @package   Xpressengine\Widget
 * @author    XE Developers <developers@xpressengine.com>
 * @copyright 2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license   http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link      https://xpressengine.io
 */

namespace Xpressengine\Widget\Exceptions;

use Exception;
use Xpressengine\Widget\WidgetException;

/**
 * NotConfigurationWidgetException
 *
 * PHP version 7
 *
 * @category    Widget
 * @package     Xpressengine\Widget
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license   http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        https://xpressengine.io
 */
class NotConfigurationWidgetException extends WidgetException
{
    protected $message = 'Widget configuration is not set.';
}
