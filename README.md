# SmileEzEECountryFormFieldBundle

Add new eZStudio Form Field named *Country* displaying select field with country list

## Installation

### Get the bundle using composer

Add SmileEzEECountryFormFieldBundle by running this command from the terminal at the root of
your eZStudio project:

```bash
composer require smile/ezee-countryformfield-bundle
```


### Enable the bundle

To start using the bundle, register the bundle in your application's kernel class:

```php
// ezpublish/EzPublishKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Smile\EzEECountryFormFieldBundle\SmileEzEECountryFormFieldBundle(),
        // ...
    );
}
```

