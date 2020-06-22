# JACS

JACS = Joint Academic Coding System

This is a way of coding different academic subjects, used mainly in the United Kingdom.

## Usage

Simply utilise the static methods of the class.

```php
Jacs::isCode('A000'); // true
```

```php
Jacs::getByCoding('BG57');
```

Returns:
```
array (
        0 =>
        array (
          1 => 'B',
          2 => 5,
          3 => 0,
          4 => 0,
          'level' => 2,
          'name' => 'Ophthalmics',
          'description' => 'The study of the eye, disruption to sight and diseases of the eye. Also includes treatment of eye disorders.',
          'deprecated' => 0,
        ),
        1 =>
        array (
          1 => 'G',
          2 => 7,
          3 => 0,
          4 => 0,
          'level' => 2,
          'name' => 'Artificial Intelligence',
          'description' => 'The study of principles and techniques for the computer-based simulation and modelling of intelligent animal behaviour patterns.',
          'deprecated' => 1,
        ),
      );
```