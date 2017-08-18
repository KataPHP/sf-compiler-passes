<?php

namespace AppBundle\Chain;

use AppBundle\Transformer\TransformerInterface;

/**
 * Transformer chain.
 *
 * @author Michael COULLERET <michael.coulleret@gmail.com>
 */
class TransformerChain implements TransformerChainInterface
{
    private $transformers = [];

    /**
     * Add transformer.
     *
     * @param TransformerInterface $transformer
     * @param string $alias
     *
     * @return self
     */
    public function addTransformer(TransformerInterface $transformer, $alias)
    {
        $this->transformers[$alias] = $transformer;

        return $this;
    }

    /**
     * Get transformer with alias.
     *
     * @param string $alias
     *
     * @return TransformerInterface
     */
    public function getTransformer($alias)
    {
        if (array_key_exists($alias, $this->transformers)) {
            return $this->transformers[$alias];
        }

        return null;
    }

    /**
     * Get all transformers.
     *
     * @return array
     */
    public function getTransformers()
    {
        return $this->transformers;
    }
}
