<?php
/* @noinspection ALL */
// @formatter:off
// phpcs:ignoreFile

/**
 * A helper file for Laravel, to provide autocomplete information to your IDE
 * Generated for Laravel 12.20.0.
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 * @see https://github.com/barryvdh/laravel-ide-helper
 */
namespace Barryvdh\Debugbar\Facades {
    /**
     * @method static void alert(mixed $message)
     * @method static void critical(mixed $message)
     * @method static void debug(mixed $message)
     * @method static void emergency(mixed $message)
     * @method static void error(mixed $message)
     * @method static void info(mixed $message)
     * @method static void log(mixed $message)
     * @method static void notice(mixed $message)
     * @method static void warning(mixed $message)
     * @see \Barryvdh\Debugbar\LaravelDebugbar
     */
    class Debugbar extends \DebugBar\DebugBar {
        /**
         * Returns the HTTP driver
         * 
         * If no http driver where defined, a PhpHttpDriver is automatically created
         *
         * @return \DebugBar\HttpDriverInterface
         * @static
         */
        public static function getHttpDriver()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getHttpDriver();
        }

        /**
         * Enable the Debugbar and boot, if not already booted.
         *
         * @static
         */
        public static function enable()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->enable();
        }

        /**
         * Boot the debugbar (add collectors, renderer and listener)
         *
         * @static
         */
        public static function boot()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->boot();
        }

        /**
         * @static
         */
        public static function shouldCollect($name, $default = false)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->shouldCollect($name, $default);
        }

        /**
         * Adds a data collector
         *
         * @param \DebugBar\DataCollector\DataCollectorInterface $collector
         * @throws DebugBarException
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function addCollector($collector)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addCollector($collector);
        }

        /**
         * Handle silenced errors
         *
         * @param $level
         * @param $message
         * @param string $file
         * @param int $line
         * @param array $context
         * @throws \ErrorException
         * @static
         */
        public static function handleError($level, $message, $file = '', $line = 0, $context = [])
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->handleError($level, $message, $file, $line, $context);
        }

        /**
         * Starts a measure
         *
         * @param string $name Internal name, used to stop the measure
         * @param string $label Public name
         * @param string|null $collector
         * @param string|null $group
         * @static
         */
        public static function startMeasure($name, $label = null, $collector = null, $group = null)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->startMeasure($name, $label, $collector, $group);
        }

        /**
         * Stops a measure
         *
         * @param string $name
         * @static
         */
        public static function stopMeasure($name)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->stopMeasure($name);
        }

        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Exception $e
         * @deprecated in favor of addThrowable
         * @static
         */
        public static function addException($e)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addException($e);
        }

        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Throwable $e
         * @static
         */
        public static function addThrowable($e)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addThrowable($e);
        }

        /**
         * Returns a JavascriptRenderer for this instance
         *
         * @param string $baseUrl
         * @param string $basePath
         * @return \Barryvdh\Debugbar\JavascriptRenderer
         * @static
         */
        public static function getJavascriptRenderer($baseUrl = null, $basePath = null)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getJavascriptRenderer($baseUrl, $basePath);
        }

        /**
         * Modify the response and inject the debugbar (or data in headers)
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param \Symfony\Component\HttpFoundation\Response $response
         * @return \Symfony\Component\HttpFoundation\Response
         * @static
         */
        public static function modifyResponse($request, $response)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->modifyResponse($request, $response);
        }

        /**
         * Check if the Debugbar is enabled
         *
         * @return boolean
         * @static
         */
        public static function isEnabled()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->isEnabled();
        }

        /**
         * Collects the data from the collectors
         *
         * @return array
         * @static
         */
        public static function collect()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->collect();
        }

        /**
         * Injects the web debug toolbar into the given Response.
         *
         * @param \Symfony\Component\HttpFoundation\Response $response A Response instance
         * Based on https://github.com/symfony/WebProfilerBundle/blob/master/EventListener/WebDebugToolbarListener.php
         * @static
         */
        public static function injectDebugbar($response)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->injectDebugbar($response);
        }

        /**
         * Checks if there is stacked data in the session
         *
         * @return boolean
         * @static
         */
        public static function hasStackedData()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->hasStackedData();
        }

        /**
         * Returns the data stacked in the session
         *
         * @param boolean $delete Whether to delete the data in the session
         * @return array
         * @static
         */
        public static function getStackedData($delete = true)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getStackedData($delete);
        }

        /**
         * Disable the Debugbar
         *
         * @static
         */
        public static function disable()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->disable();
        }

        /**
         * Adds a measure
         *
         * @param string $label
         * @param float $start
         * @param float $end
         * @param array|null $params
         * @param string|null $collector
         * @param string|null $group
         * @static
         */
        public static function addMeasure($label, $start, $end, $params = [], $collector = null, $group = null)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addMeasure($label, $start, $end, $params, $collector, $group);
        }

        /**
         * Utility function to measure the execution of a Closure
         *
         * @param string $label
         * @param \Closure $closure
         * @param string|null $collector
         * @param string|null $group
         * @return mixed
         * @static
         */
        public static function measure($label, $closure, $collector = null, $group = null)
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->measure($label, $closure, $collector, $group);
        }

        /**
         * Collect data in a CLI request
         *
         * @return array
         * @static
         */
        public static function collectConsole()
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->collectConsole();
        }

        /**
         * Adds a message to the MessagesCollector
         * 
         * A message can be anything from an object to a string
         *
         * @param mixed $message
         * @param string $label
         * @static
         */
        public static function addMessage($message, $label = 'info')
        {
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->addMessage($message, $label);
        }

        /**
         * Checks if a data collector has been added
         *
         * @param string $name
         * @return boolean
         * @static
         */
        public static function hasCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->hasCollector($name);
        }

        /**
         * Returns a data collector
         *
         * @param string $name
         * @return \DebugBar\DataCollector\DataCollectorInterface
         * @throws DebugBarException
         * @static
         */
        public static function getCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getCollector($name);
        }

        /**
         * Returns an array of all data collectors
         *
         * @return array[DataCollectorInterface]
         * @static
         */
        public static function getCollectors()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getCollectors();
        }

        /**
         * Sets the request id generator
         *
         * @param \DebugBar\RequestIdGeneratorInterface $generator
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setRequestIdGenerator($generator)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setRequestIdGenerator($generator);
        }

        /**
         * @return \DebugBar\RequestIdGeneratorInterface
         * @static
         */
        public static function getRequestIdGenerator()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getRequestIdGenerator();
        }

        /**
         * Returns the id of the current request
         *
         * @return string
         * @static
         */
        public static function getCurrentRequestId()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getCurrentRequestId();
        }

        /**
         * Sets the storage backend to use to store the collected data
         *
         * @param \DebugBar\StorageInterface $storage
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setStorage($storage = null)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setStorage($storage);
        }

        /**
         * @return \DebugBar\StorageInterface
         * @static
         */
        public static function getStorage()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getStorage();
        }

        /**
         * Checks if the data will be persisted
         *
         * @return boolean
         * @static
         */
        public static function isDataPersisted()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->isDataPersisted();
        }

        /**
         * Sets the HTTP driver
         *
         * @param \DebugBar\HttpDriverInterface $driver
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setHttpDriver($driver)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setHttpDriver($driver);
        }

        /**
         * Returns collected data
         * 
         * Will collect the data if none have been collected yet
         *
         * @return array
         * @static
         */
        public static function getData()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getData();
        }

        /**
         * Returns an array of HTTP headers containing the data
         *
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return array
         * @static
         */
        public static function getDataAsHeaders($headerName = 'phpdebugbar', $maxHeaderLength = 4096, $maxTotalHeaderLength = 250000)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getDataAsHeaders($headerName, $maxHeaderLength, $maxTotalHeaderLength);
        }

        /**
         * Sends the data through the HTTP headers
         *
         * @param bool $useOpenHandler
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function sendDataInHeaders($useOpenHandler = null, $headerName = 'phpdebugbar', $maxHeaderLength = 4096)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->sendDataInHeaders($useOpenHandler, $headerName, $maxHeaderLength);
        }

        /**
         * Stacks the data in the session for later rendering
         *
         * @static
         */
        public static function stackData()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->stackData();
        }

        /**
         * Sets the key to use in the $_SESSION array
         *
         * @param string $ns
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setStackDataSessionNamespace($ns)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setStackDataSessionNamespace($ns);
        }

        /**
         * Returns the key used in the $_SESSION array
         *
         * @return string
         * @static
         */
        public static function getStackDataSessionNamespace()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->getStackDataSessionNamespace();
        }

        /**
         * Sets whether to only use the session to store stacked data even
         * if a storage is enabled
         *
         * @param boolean $enabled
         * @return \Barryvdh\Debugbar\LaravelDebugbar
         * @static
         */
        public static function setStackAlwaysUseSessionStorage($enabled = true)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->setStackAlwaysUseSessionStorage($enabled);
        }

        /**
         * Checks if the session is always used to store stacked data
         * even if a storage is enabled
         *
         * @return boolean
         * @static
         */
        public static function isStackAlwaysUseSessionStorage()
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->isStackAlwaysUseSessionStorage();
        }

        /**
         * @static
         */
        public static function offsetSet($key, $value)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->offsetSet($key, $value);
        }

        /**
         * @static
         */
        public static function offsetGet($key)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->offsetGet($key);
        }

        /**
         * @static
         */
        public static function offsetExists($key)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->offsetExists($key);
        }

        /**
         * @static
         */
        public static function offsetUnset($key)
        {
            //Method inherited from \DebugBar\DebugBar 
            /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
            return $instance->offsetUnset($key);
        }

            }
    }

namespace L5Swagger {
    /**
     */
    class L5SwaggerFacade {
        /**
         * Generate necessary documentation files by scanning and processing the required data.
         *
         * @return void
         * @throws L5SwaggerException
         * @throws Exception
         * @static
         */
        public static function generateDocs()
        {
            /** @var \L5Swagger\Generator $instance */
            $instance->generateDocs();
        }

            }
    }

namespace Illuminate\Support {
    /**
     * @template TKey of array-key
     * @template-covariant TValue
     * @implements \ArrayAccess<TKey, TValue>
     * @implements \Illuminate\Support\Enumerable<TKey, TValue>
     */
    class Collection {
        /**
         * @see \Barryvdh\Debugbar\ServiceProvider::register()
         * @static
         */
        public static function debug()
        {
            return \Illuminate\Support\Collection::debug();
        }

            }
    }

namespace Illuminate\Http {
    /**
     */
    class Request extends \Symfony\Component\HttpFoundation\Request {
        /**
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestValidation()
         * @param array $rules
         * @param mixed $params
         * @static
         */
        public static function validate($rules, ...$params)
        {
            return \Illuminate\Http\Request::validate($rules, ...$params);
        }

        /**
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestValidation()
         * @param string $errorBag
         * @param array $rules
         * @param mixed $params
         * @static
         */
        public static function validateWithBag($errorBag, $rules, ...$params)
        {
            return \Illuminate\Http\Request::validateWithBag($errorBag, $rules, ...$params);
        }

        /**
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @param mixed $absolute
         * @static
         */
        public static function hasValidSignature($absolute = true)
        {
            return \Illuminate\Http\Request::hasValidSignature($absolute);
        }

        /**
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @static
         */
        public static function hasValidRelativeSignature()
        {
            return \Illuminate\Http\Request::hasValidRelativeSignature();
        }

        /**
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @param mixed $ignoreQuery
         * @param mixed $absolute
         * @static
         */
        public static function hasValidSignatureWhileIgnoring($ignoreQuery = [], $absolute = true)
        {
            return \Illuminate\Http\Request::hasValidSignatureWhileIgnoring($ignoreQuery, $absolute);
        }

        /**
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @param mixed $ignoreQuery
         * @static
         */
        public static function hasValidRelativeSignatureWhileIgnoring($ignoreQuery = [])
        {
            return \Illuminate\Http\Request::hasValidRelativeSignatureWhileIgnoring($ignoreQuery);
        }

            }
    }


namespace  {
    class Debugbar extends \Barryvdh\Debugbar\Facades\Debugbar {}
    class L5Swagger extends \L5Swagger\L5SwaggerFacade {}
}





