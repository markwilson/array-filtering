# ArrayFiltering

Simplified array filtering.

````

use MarkWilson\ArrayFiltering\ArrayFiltering;

$myArray = [ ... ];
$filter = new MyFilter(...); // a FilterInterface instance

$filtering = new ArrayFiltering($myData);

$filteredArray = $filtering->filterBy($filter);

````
