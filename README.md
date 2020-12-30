# ZINIO - TSP problem

We are facing a classic problem of computational science. with 32 cities,
hamiltonian and symmetric conditions and maximum execution time of 15 minutes, therefore exact solutions
are not an option. We must face the problem with a heuristic solution.

We need to highlight the following assumptions:

* We are not inventing a new mathematical solution. Don't develop something already well-developed and discussed by the community
* PHP is not the best language for computational problems

We are in a technical test environment so for practical purposes we are going to make the following approach:
* Setup the environment
* Develop a strategy pattern to experiment, easily change and test the possible solutions.
* At a first glance, the most interesting solution is to create a microservice using google
function to improve computational power if required. Then, using an already implemented solution [OR-tools](https://developers.google.com/optimization/routing/tsp)
and call it from the created script



