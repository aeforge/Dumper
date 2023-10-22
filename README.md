
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

## Global Functions

The following are functions that can be accessed globaly and will do the same as Calling the dumper class
```php
  dd() //Will dump and die
  dump() //Will dump only without exiting
```