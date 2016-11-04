<?php
/**
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        https://xpressengine.io
 */

namespace App\FieldSkins\Number;

use Xpressengine\DynamicField\AbstractSkin;
use Xpressengine\Config\ConfigEntity;
use View;

class DefaultSkin extends AbstractSkin
{
    protected static $id = 'FieldType/xpressengine@Number/FieldSkin/xpressengine@NumberDefault';

    /**
     * get name of skin
     *
     * @return string
     */
    public function name()
    {
        return 'Number default';
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

    /**
     * get view file directory path
     *
     * @return string
     */
    public function getPath()
    {
        return 'dynamicField/number/default';
    }

//    public function settings(ConfigEntity $config = null)
//    {
//        return View::make('dynamicField/number/default/createSkin', ['config' => $config,])->render();
//    }

//    public function create(array $inputs)
//    {
//        $config = $this->config;
//        return View::make('dynamicField/number/default/create', [
//            'config' => $config, bhvvgvgggggvgggghyvyvbvc
//        ])->render();
//    }
//
//    public function edit(array $args)
//    {
//        $config = $this->config;
//        $num = '';
//        if (isset($args[$config->get('id') . 'Num'])) {
//            $num = $args[$config->get('id') . 'Num'];
//        }
//
//
//        return View::make('dynamicField/number/default/edit', [
//            'config' => $config,
//            'num' => $num,
//        ])->render();
//    }
//
//    public function show(array $args)
//    {
//        $config = $this->config;
//        $num = '';
//        if (isset($args[$config->get('id') . 'Num'])) {
//            $num = $args[$config->get('id') . 'Num'];
//        }
//
//        return View::make('dynamicField/number/default/show', [
//            'config' => $config,
//            'num' => $num,
//        ])->render();
//    }
//
//    public function search(array $inputs)
//    {
//        $config = $this->config;
//        if ($config->get('searchable') !== true) {
//            return '';
//        }
//
//        $key = $config->get('id').'Num';
//        $num = isset($inputs[$key]) ? $inputs[$key] : '';
//
//        return View::make('dynamicField/number/default/search', [
//            'config' => $config,
//            'num' => $num,
//        ])->render();
//    }
//
//    /**
//     * @param string $name
//     * @param array $args
//     */
//    public function output($name, array $args)
//    {
//        $key = $name.'Num';
//        if (isset($args[$key]) === false || $args[$key] == '') {
//            return null;
//        }
//
//        return $args[$key];
//    }
}

