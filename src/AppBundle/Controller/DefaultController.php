<?php

namespace AppBundle\Controller;

use AppBundle\Chain\TransformerChain;
use AppBundle\Loader\JsonFileLoader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Default controller.
 *
 * @author Michael COULLERET <michael.coulleret@gmail.com>
 */
class DefaultController extends AbstractController
{
    /**
     * @var
     */
    private $resourceDirectory;

    /**
     * @param $resourceDirectory
     */
    public function __construct($resourceDirectory)
    {
        $this->resourceDirectory = $resourceDirectory;
    }

    /**
     * @Route("/", name="homepage")
     *
     * @param JsonFileLoader $jsonFileLoader
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(JsonFileLoader $jsonFileLoader, TransformerChain $transformerChain)
    {
        $facebookItems = $jsonFileLoader->loadResource($this->resourceDirectory.'facebook.json');
        $twittersItems = $jsonFileLoader->loadResource($this->resourceDirectory.'twitter.json');

//        dump($transformerChain->getTransformer('facebook')->transform($facebookItems['267969896964780']['data'][0]));
//        dump($transformerChain->getTransformer('twitter')->transform($twittersItems));die;

        return $this->render('kata/index.html.twig');
    }
}
