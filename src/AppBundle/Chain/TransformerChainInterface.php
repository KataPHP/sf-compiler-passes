<?php

namespace AppBundle\Chain;

use AppBundle\Transformer\TransformerInterface;

/**
 * Interface transformer chain.
 *
 * @author Michael COULLERET <michael.coulleret@gmail.com>
 */
interface TransformerChainInterface
{
    /**
     * Add transformer.
     *
     * @param TransformerInterface $transformer
     * @param string               $alias
     *
     * @return self
     */
    public function addTransformer(TransformerInterface $transformer, $alias);

    /**
     * Get transformer with alias.
     *
     * @param string $alias
     *
     * @return TransformerInterface
     */
    public function getTransformer($alias);

    /**
     * Get all transformers.
     *
     * @return array
     */
    public function getTransformers();
}
