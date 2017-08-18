Kata on Symfony compiler passes with chain of responsibility.
=======
> Learn how to use the compilers on Symfony, exploit the paternal design of the chain of responsibility.

# Story

We have several types of messages coming from different social networks, the goal of this Kata is to allow to transform messages that have different format in a single format.

* Create a class that implements the CompilerPassInterface.
* Implement the logical method in progress.
* Save the pass in the AppBundle::build method.
* Create and configure a FaceBookFormatter
* Create and configure a TwitterFormatter
* Manipulate the past-compiler

# Goal

* Create a interface `AppBundle\Transformer\TransformerInterface` with method `transform($item)`.
* Create a chain of responsibility to store transformers `AppBundle\Chain\TransformerChain` implementing the `TransformerChainInterface`.
* Create a class `AppBundle\Transformer\FacebookMessageFormatter` implementing the `TransformerInterface`.
* Create a class `AppBundle\Transformer\TwitterMessageTransformer` implementing the `TransformerInterface`.
* Add a tag named `message.transformer` with alias `facebook` to the service id `AppBundle\Transformer\FacebookMessageFormatter`
* Add a tag named `message.transformer` with alias `twitter` to the service id `AppBundle\Transformer\TwitterMessageTransformer`
* Create a class `AppBundle\DependencyInjection\Compiler\TransformerCompilerPass` implementing the interface `Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface`.
* Implement the `process()` with the following.
* Check if the service `message.transformer` exists.
* Retrieves the definition of the service `message.transformer`.
* Retrieves the list of services' ids containing the tag `message.transformer`.
* For each tagged service, register it in the service `message.transformer`. By adding a call to the method `addTransformer` in it definition. Use the attributes array to retrieves the property format defined in the `service.yml`.
* Override the method `AppBundle::build` to add the `TransformerCompilerPass` in the containerBuilder through the method `ContainerBuilder::addCompilerPass`. (don't forget to call parent::build).
* Add `TransformerChain $transformerChain` in `DefaultController::indexAction`
* Transform the loader data `$facebookItems` `$twittersItems` and transform them! e.g `$transformerChain->getTransformer('twitter')->transform($facebookItems)`.

# Help

* http://symfony.com/doc/current/service_container/compiler_passes.html
* http://symfony.com/doc/current/service_container/tags.html

# Code source

Use the following basis to perform this exercise

1) Clone this repository and execution the commands

```bash
$ composer install
```

2) Run this project

```bash
$ php bin/console server:run
```

3) It's up to you to code!

Have fun :)

