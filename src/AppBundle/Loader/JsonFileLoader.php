<?php

/*
 * This file is part of the sf-compiler-pass project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Loader;

/**
 * JsonFileLoader loads from an json file.
 *
 * @author Michael COULLERET <michael.coulleret@gmail.com>
 */
class JsonFileLoader
{
    /**
     * {@inheritdoc}
     */
    public function loadResource($resource)
    {
        $items = [];

        if ($data = file_get_contents($resource)) {
            $items = json_decode($data, true);

            if (0 < $errorCode = json_last_error()) {
                throw new \RuntimeException(sprintf('Error parsing JSON - %s', $this->getJSONErrorMessage($errorCode)));
            }
        }

        return $items;
    }

    /**
     * Translates JSON_ERROR_* constant into meaningful message.
     *
     * @param int $errorCode Error code returned by json_last_error() call
     *
     * @return string Message string
     */
    private function getJSONErrorMessage($errorCode)
    {
        switch ($errorCode) {
            case JSON_ERROR_DEPTH:
                return 'Maximum stack depth exceeded';
            case JSON_ERROR_STATE_MISMATCH:
                return 'Underflow or the modes mismatch';
            case JSON_ERROR_CTRL_CHAR:
                return 'Unexpected control character found';
            case JSON_ERROR_SYNTAX:
                return 'Syntax error, malformed JSON';
            case JSON_ERROR_UTF8:
                return 'Malformed UTF-8 characters, possibly incorrectly encoded';
            default:
                return 'Unknown error';
        }
    }
}
