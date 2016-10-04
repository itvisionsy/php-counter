# php-counter
Simple counter for PHP

## Why needed
Sometimes you need to display a counter steps in a loop where the index of the loop is consumed by a non-serial number.
```php
$workHoursLog = [
    '2016-01-01'=>10,
    '2016-01-02'=>10,
    '2016-01-03'=>8,
    //...
];
```
As you can see, the key is not a serial number, any you may want to display in a table:
```php
<table>
<?php foreach($workHours as $date=>$hours): ?>
    <tr>
        <td><?= Counter::nextOrInit($i, 1) ?></td>
        <td><?= $date ?></td>
        <td><?= $hours ?></td>
    </tr>
<?php endforeach; ?>
</table>
```
result will be
```html
<table>
    <tr>
        <td>1</td>    
        <td>2016-01-01</td>    
        <td>10</td>    
    </tr>
    <tr>
        <td>2</td>    
        <td>2016-01-02</td>    
        <td>10</td>    
    </tr>
    <tr>
        <td>3</td>    
        <td>2016-01-03</td>    
        <td>8</td>    
    </tr>
</table>
```

## How to use
Simply, call the nextOrInit method and pass a unique variable which will hold the counter object, optionally a second parameter which is the start, and a step:
```php
\ItvisionSy\Counter\Counter::nextOrInit($counter,[$start=0,[$step=1]]);
```
Or you can initiate
```php

//initiate
$counter = new Counter(0,1); 
//OR
Counter::nextOrInit($counter, 0, 1);

// get current value
echo $counter; 
//OR
echo $counter(); 
//OR
echo $counter->current();

//next step
$counter->next();
//OR
$counter(true);
```
