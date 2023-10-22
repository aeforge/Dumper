
# Dumper

AEForge dumper component. Providing better dump function for any PHP variable


## Installation

To install via composer:

```Composer
  composer require aeforge/dumper
```

To clone the project:

```Cloning
    https://github.com/aeforge/Dumper.git
```

## Usage/Examples

### Example (1)
```php
use Aeforge\Dumper\Dumper;

// This will make it so the script will not exit after dumping the data
$dumper = new Dumper($_SERVER);
$dumper->dump();
```
### Example (2)
```php
use Aeforge\Dumper\Dumper;

// This will make it so the script will exit after dumping data
$dumper = new Dumper($_SERVER);
$dumper->dumpAndDie();
```