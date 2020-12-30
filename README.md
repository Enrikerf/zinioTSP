# ZINIO - TSP problem

We are facing a classic problem of computational science. with 32 cities and
hamiltonian and symmetric conditions and maximum execution time of 15 minutes. Exact solutions
are banished of possible solutions then. We must attack with a heuristic solution.

We need to notice the following evidences:

* Invent a solution it is out of discussion
* PHP it is not the best environment to a computational problem
* You should never develop something already well develop and discussed by the community
* You should never ask to solve a well discussed mathematical problem because the result implementation always will be worst or equal to the already implemented.

We are in a technical test environment so for practical pourposes we are going to make the following approach:
* Setup the enviroment
* Develop a strategy pattern wrapper to experiment, easily change and test the possible solutions.
* With a first investigation the most interesting tool for solution
  is solve with a microservice using google [OR-tools](https://developers.google.com/optimization/routing/tsp) I would choose a google cloud function to improve computational power if we needed and call it in our script.

