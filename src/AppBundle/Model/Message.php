<?php

namespace AppBundle\Model;

/**
 * The model for message.
 *
 * @author Michael COULLERET <michael.coulleret@gmail.com>
 */
class Message
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $profileAvatar;

    /**
     * @var string
     */
    protected $profileUsername;

    /**
     * @var string
     */
    protected $profileHandle;

    /**
     * @param string $text
     *
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $profileAvatar
     *
     * @return self
     */
    public function setProfileAvatar($profileAvatar)
    {
        $this->profileAvatar = $profileAvatar;

        return $this;
    }

    /**
     * @return string
     */
    public function getProfileAvatar()
    {
        return $this->profileAvatar;
    }

    /**
     * @param string $profileUsername
     *
     * @return self
     */
    public function setProfileUsername($profileUsername)
    {
        $this->profileUsername = $profileUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getProfileUsername()
    {
        return $this->profileUsername;
    }

    /**
     * @param string $profileHandle
     *
     * @return self
     */
    public function setProfileHandle($profileHandle)
    {
        $this->profileHandle = $profileHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getProfileHandle()
    {
        return $this->profileHandle;
    }
}
