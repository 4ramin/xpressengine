<?php
/**
 *  This file is part of the Xpressengine package.
 *
 * PHP version 5
 *
 * @category    User
 * @package     Xpressengine\User
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
namespace Xpressengine\User\Repositories;

use Xpressengine\User\UserInterface;

/**
 * 이 인터페이스는 회원 정보 저장소가 구현해야 하는 인터페이스이다.
 *
 * @category    User
 * @package     Xpressengine\User
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
interface UserRepositoryInterface
{
    /**
     * 이메일 주소를 소유한 회원을 조회한다.
     *
     * @param string $address 이메일 주소
     *
     * @return UserInterface
     */
    public function findByEmail($address);

    /**
     * 이메일의 이름 영역을 사용하여 회원을 조회한다.
     *
     * @param string $emailPrefix 조회할 이메일의 이름영역
     *
     * @return UserInterface
     */
    public function searchByEmailPrefix($emailPrefix);
}