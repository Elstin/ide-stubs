<?php

namespace Phalcon\Application;

/**
 * Base class for Phalcon\Cli\Console and Phalcon\Mvc\Application.
 */
abstract class AbstractApplication extends \Phalcon\Di\Injectable implements \Phalcon\Events\EventsAwareInterface
{
    /**
     * @var DiInterface
     */
    protected $container;

    /**
     * @var string
     */
    protected $defaultModule;

    /**
     * @var null | ManagerInterface
     */
    protected $eventsManager;

    /**
     * @var array
     */
    protected $modules = array();


    /**
     * Phalcon\AbstractApplication constructor
     *
     * @param \Phalcon\Di\DiInterface $container
     */
    public function __construct(\Phalcon\Di\DiInterface $container = null) {}

    /**
     * Returns the default module name
     *
     * @return string
     */
    public function getDefaultModule(): string {}

    /**
     * Returns the internal event manager
     *
     * @return \Phalcon\Events\ManagerInterface
     */
    public function getEventsManager(): ManagerInterface {}

    /**
     * Gets the module definition registered in the application via module name
     *
     * @param string $name
     * @return array|object
     */
    public function getModule(string $name): array {}

    /**
     * Return the modules registered in the application
     *
     * @return array
     */
    public function getModules(): array {}

    /**
     * Handles a request
     */
    abstract public function handle();

    /**
     * Register an array of modules present in the application
     *
     * ```php
     * $this->registerModules(
     *     [
     *         "frontend" => [
     *             "className" => \Multiple\Frontend\Module::class,
     *             "path"      => "../apps/frontend/Module.php",
     *         ],
     *         "backend" => [
     *             "className" => \Multiple\Backend\Module::class,
     *             "path"      => "../apps/backend/Module.php",
     *         ],
     *     ]
     * );
     * ```
     *
     * @param array $modules
     * @param bool $merge
     * @return Application
     */
    public function registerModules(array $modules, bool $merge = false): Application {}

    /**
     * Sets the module name to be used if the router doesn't return a valid module
     *
     * @param string $defaultModule
     * @return Application
     */
    public function setDefaultModule(string $defaultModule): Application {}

    /**
     * Sets the events manager
     *
     * @param \Phalcon\Events\ManagerInterface $eventsManager
     * @return Application
     */
    public function setEventsManager(\Phalcon\Events\ManagerInterface $eventsManager): Application {}

}