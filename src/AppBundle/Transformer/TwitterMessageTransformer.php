<?php

/*
 * This file is part of the sf-compiler-pass project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Transformer;

use AppBundle\Model\Message;

/**
 * Class responsible for transforming message of type Facebook.
 *
 * @author Michael COULLERET <michael.coulleret@gmail.com>
 */
class TwitterMessageTransformer implements TransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform(array $item)
    {
        $message = (new Message())
            ->setText($item['text'])
            ->setProfileHandle($item['user']['screen_name'])
            ->setProfileUsername($item['user']['name'])
            ->setProfileAvatar($item['user']['profile_image_url_https'])
        ;

        return $message;
    }
}
