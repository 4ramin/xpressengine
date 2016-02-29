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
namespace Xpressengine\User;

use Closure;
use Intervention\Image\ImageManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Xpressengine\Media\MediaManager;
use Xpressengine\Storage\File;
use Xpressengine\Storage\Storage;
use Xpressengine\User\Models\User;

/**
 * 회원의 프로필 이미지 및 프로필 배경이미지를 저장하고, 조회하는 역할을 담당하는 클래스
 *
 * @category    User
 * @package     Xpressengine\User
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
class UserImageHandler
{
    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var MediaManager
     */
    private $mediaManager;

    /**
     * @var Closure
     */
    private $imageManagerResolver;
    /**
     * @var array
     */
    private $profileImgConfig;

    /**
     * MemberImageHandler constructor.
     *
     * @param Storage      $storage              Storage
     * @param MediaManager $mediaManager         Media
     * @param Closure      $imageManagerResolver intervention's ImageManager를 반환하는 callback
     * @param array        $profileImgConfig     프로필 이미지 정보
     */
    public function __construct(
        Storage $storage,
        MediaManager $mediaManager,
        Closure $imageManagerResolver,
        array $profileImgConfig
    ) {
        $this->storage = $storage;
        $this->mediaManager = $mediaManager;
        $this->imageManagerResolver = $imageManagerResolver;
        $this->profileImgConfig = $profileImgConfig;
    }

    /**
     * 회원의 프로필 이미지를 등록한다.
     *
     * @param User         $user        프로필 이미지를 등록할 회원
     * @param UploadedFile $profileFile 프로필 이미지 파일
     *
     * @return string 등록한 프로필이미지 ID
     */
    public function updateUserProfileImage(User $user, UploadedFile $profileFile)
    {
        $disk = array_get($this->profileImgConfig, 'storage.disk');
        $path = array_get($this->profileImgConfig, 'storage.path');
        $size = array_get($this->profileImgConfig, 'size');

        // make fitted image
        /** @var ImageManager $imageManager */
        $imageManager = call_user_func($this->imageManagerResolver);
        $image = $imageManager->make($profileFile->getRealPath());
        $image = $image->fit($size['width'], $size['height']);

        // remove old profile image
        if (!empty($user->profileImageId)) {
            $file = File::find($user->profileImageId);
            if($file !== null) {
                $this->storage->remove($file);
            }
        }

        // save image to storage
        $id = $user->getId();
        $file = $this->storage->create($image->encode()->getEncoded(), $path."/$id", $id, $disk);

        return $file->id;
    }
}
