# ZINIO - TSP problem

We are facing a classic problem of computational science. with 32 cities,
hamiltonian and symmetric conditions and maximum execution time of 15 minutes, therefore exact solutions
are not an option. We must face the problem with a heuristic solution.

We need to highlight the following assumptions:
## Assumptions
* We are not inventing a new mathematical solution. Don't develop something already well-developed and discussed by the community
* PHP is not the best language for computational problems

We are in a technical test environment so for practical purposes we are going to make the following approach:
* Setup the environment
* Develop a strategy pattern to experiment, easily change and test the possible solutions.
* At a first glance, the most interesting solution is to create a microservice using google
function to improve computational power if required. Then, using an already implemented solution [OR-tools](https://developers.google.com/optimization/routing/tsp)
and call it from the created script
  
## Approach:

* Setup docker: php-fpm with xdebug and composer
  * I reused my own images from dockerhub. They aren't optimized for the problem but It is better optimize time in this case
* Access to php container with composer and setup symfony environment
  * symfony flex basic with phpunit bridge dev dependency
* Prove Command configuration to use not default configuration and choose the file name: solve.php
* Implement strategy pattern to isolate the mathematical problem
    * at first, we only implement an empty algorithm to focus development in the architecture and testing
* Implement hexagonal architecture to wrap the problem
    * isolate retrieve data problematic
    * isolate call to domain with use case

Whole process it was made by DDD and TDD principles. 

## Setup

>Tip: Assuming Docker desktop it is installed 

* docker-compose up
* docker ps to see php-fpm container name
* docker exec -it ziniotsp_php-fpm_<NAME> /bin/sh
* composer install
* run tests
  

    $ phpunit php bin/phpunit --testdox
   
````
PHPUnit 7.5.20 by Sebastian Bergmann and contributors.

Testing Project Test Suite
App\Tests\Unitary\Adapter\out\Persistence\CityRepository
✔ Get cities on empty file can load file can close file return null
✔ Get cities on empty file can load file cant close file return null
✔ Get cities on empty file cant load file can close file return null
✔ Get cities on empty file cant load file cant close file return null
✔ Get cities on not empty file can load file can close file return array
✔ Get cities on not empty file can load file cant close file return null
✔ Get cities on not empty file cant load file can close file return null
✔ Get cities on not empty file cant load file cant close file return null

App\Tests\Unitary\Adapter\out\Persistence\LoadCitiesAdapter
✔ Empty dataset return null
✔ Filled dataset wit bad format return null
✔ Filled dataset wit good format return array

App\Tests\Unitary\Application\Service\SolveTSPService
✔ On calculator error return response with not ok code and errors array in message
✔ On calculator success return response with code ok and cities array

App\Tests\Unitary\Domain\TSPCalculator\TSPAlgorithms\TSPEmptyAlgorithm
✔ Execution time should by less than 15 min with 32 cities
→ Cities visited only one time
→ All cities have been visited
→ Resulted distance is less than maximum
→ On error return null and get errors an array
→ On success get errors return null

App\Tests\Unitary\Domain\TSPCalculator\TSPCalculator
✔ On calculate failure return null and get errors an array
✔ On calculate success return array with resulted graph and get errors null

Time: 3.36 seconds, Memory: 8.00 MB

Summary of non-successful tests:

App\Tests\Unitary\Domain\TSPCalculator\TSPAlgorithms\TSPEmptyAlgorithm
→ Cities visited only one time
→ All cities have been visited
→ Resulted distance is less than maximum
→ On error return null and get errors an array
→ On success get errors return null
OK, but incomplete, skipped, or risky tests!
Tests: 21, Assertions: 21, Skipped: 5.
````

We could see what it is missing yet, the algorithm


* to "solve" the problem with the given dataset we could run

  $ phpunit bin/console app:solve

````
Beijing
Tokyo
Vladivostok
Dakar
Singapore
San Francisco
Auckland
London
Reykjavík
Paris
Prague
New York
New Delhi
Rio
Mexico City
Lima
Moscow
Cairo
Toronto
Santiago
Caracas
San Jose
Lusaka
Casablanca
Astana
Bangkok
Perth
Melbourne
Vancouver
Anchorage
Accra
Jerusalem
````

We could see what we gets, the same file formatted at it is asked but without rearrangement process