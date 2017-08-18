<?php

/*
 * This file is part of the sf-compiler-pass project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Transformer;

/**
 * Transformer Interface
 *
 * @author Michael COULLERET <michael.coulleret@gmail.com>
 */
interface TransformerInterface
{
    /**
     * Transforms an item retrieved from source to an uniformed message.
     *
     * @param array $item
     *
     * @return mixed
     */
    public function transform(array $item);
}
