# Outdated browsers warnings
  
[![Latest Version on Packagist](https://img.shields.io/packagist/v/enflow/laravel-outdated-browser.svg?style=flat-square)](https://packagist.org/packages/enflow/laravel-outdated-browser)  
![GitHub Workflow Status](https://github.com/enflow/laravel-outdated-browser/workflows/run-tests/badge.svg)  
[![Total Downloads](https://img.shields.io/packagist/dt/enflow/laravel-outdated-browser.svg?style=flat-square)](https://packagist.org/packages/enflow/laravel-outdated-browser)  
  
The `enflow/laravel-outdated-browser` package provides a easy way to warn your users about an outdated browser.  
  
The user is presented with a full-screen page to encourage them to upgrade to the latest's browser. They may skip this message, after which they can continue in their (crappy) browser.  
  
## Installation  
You can install the package via composer:  
  
``` bash  
composer require enflow/laravel-outdated-browser  
```  
  
## Usage  
You should add the `\Enflow\OutdatedBrowser\OutdatedBrowserMiddleware` class to your `App\Http\Kernel` file.
  
Add it to the bottom of the `web` group:  

```php  
'web' => [  
 ...,
 \Enflow\OutdatedBrowser\OutdatedBrowserMiddleware::class,  
],  
```  
  
## Config  
  
Pushing the config file by running:  
``` bash  
php artisan vendor:publish --provider="Enflow\OutdatedBrowser\OutdatedBrowserServiceProvider" --tag=config  
```  
  
## Detector classes  
A detector class can be specified via the config file, which should implement the `Enflow\OutdatedBrowser\Detector\Detector` interface.   

This class is responsible for determining if the user should be presented with an outdated browser message.  
By default, the `UserAgentDetector` is used, which searches for the `outdated-browser.blocked_user_agent_regexes` key for regexes to match the user agent against. 

For the `UserAgentDetector`, all users with Internet Explorer are presented with the gate. You may change the regexes to your need.
  
## Memory classes
A memory class can be specified via the config file, which should implement the `Enflow\OutdatedBrowser\Memory\Memory` interface.   

This class is responsible for checking if the user continued through the gate, and responsible for saving when the user pressed 'continue'.  
  
## Inspector classes
A inspector class can be specified via the config file, which should implement the `Enflow\OutdatedBrowser\Inspector\Inspector` interface.   

This class is responsible for checking the request and determining if now is the right time to show the 'outdated browser' gate. By default, the `FirstRequest` inspector is used, which will show the gate on the first request, excluding ajax requests.
  
## View  
You may publish the `gate` view to overrule it's styling and make it your own:  

```bash  
php artisan vendor:publish --provider="Enflow\OutdatedBrowser\OutdatedBrowserServiceProvider" --tag=views  
```  
  
## Testing  
``` bash  
$ composer test  
```  
  
## Contributing  
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.  
  
## Security  
If you discover any security related issues, please email michel@enflow.nl instead of using the issue tracker.  
  
## Credits  
- [Michel Bardelmeijer](https://github.com/mbardelmeijer)  
- [All Contributors](../../contributors)  
  
## About Enflow  
Enflow is a digital creative agency based in Alphen aan den Rijn, Netherlands. We specialize in developing web applications, mobile applications and websites. You can find more info [on our website](https://enflow.nl/en).  
  
## License  
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
