<?php
/**
 * Rule
 *
 * PHP version 5
 *
 * @category    Frontend
 * @package     Xpressengine\Presenter
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
namespace Xpressengine\Presenter\Html\Tags;

/**
 * Rule
 *
 * @category    Frontend
 * @package     Xpressengine\Presenter
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
class Rule
{
    use AttributeTrait;
    use MinifyTrait;
    use SortTrait;
    use TargetTrait;
    use EmptyStringTrait;

    /**
     * @var Rule[]
     */
    protected static $ruleList = [];

    /**
     * @var bool
     */
    protected static $loaded = false;

    /**
     * 해당 인스턴스에 포함된 rule 이름
     *
     * @var string
     */
    protected $ruleName;

    /**
     * 해당 인스턴스에 포함된 rule 목록
     *
     * @var array
     */
    protected $rules;

    /**
     * 입력 받은 rule 출력
     *
     * @return string
     */
    public static function output()
    {
        $output = '<script type="text/javascript">' . PHP_EOL;

        $list = static::$ruleList;

        foreach ($list as $rule) {
            $output .= $rule->render();
        }

        $output .= '</script>';

        return $output;
    }

    /**
     * init
     *
     * @return void
     */
    public static function init()
    {

    }

    /**
     * create instance
     *
     * @param string $ruleName rule 이름
     * @param array  $rules    rules
     * @throws \Exception
     */
    public function __construct($ruleName, $rules)
    {
        if (isset(self::$ruleList[$ruleName]) ===  true) {
            $rules = array_merge($rules, self::$ruleList[$ruleName]->getRules());
        }
        $this->ruleName       = $ruleName;
        $this->rules       = $rules;
        self::$ruleList[$ruleName] = $this;

        if (static::$loaded === false) {
            static::$loaded = true;
            new Translation([
                'xe::validatorRequired',
                'xe::validatorAlphanum',
                'xe::validatorMin',
            ]);
        }
    }

    /**
     * return rules
     *
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * renders
     *
     * @return string
     */
    public function render()
    {
        $rule = sprintf(
            'System.import(\'xecore:/common/js/modules/validator\')'.
            '.then(function(validator) { validator.setRules("%s", %s); });',
            $this->ruleName,
            json_enc($this->rules)
        ) . PHP_EOL;

        return $rule;
    }
}
