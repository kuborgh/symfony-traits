symfony-traits
==============
Collection of traits to inject common symfony services

Usage
-----

### Logger
```php
use LoggerTrait;
...
try {
    doSomeStuff($id);
} catch (\Exception $exc) {
    // Log Exception text and type in context
    $logCtx = $this->logContextFromException($exc);
    // Add additional specific context
    $logCtx['id'] = $id;
    // Log away
    $this->logError('Error in doing some stuff', $logCtx);
}
```
