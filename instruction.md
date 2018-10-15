# General

- All code has to be submitted via pull request
- All method has to be documented
- All code has to be compliant with PSR-2 / PSR-4

## Unit test
- What is a unit test
- All code has to be unit tested

# Todo

## Router
> A router does not need to know all controller to route
- All existing controller that matching a route should be routed

## Configuration
> As an application can be used in different context it's why hardcoded value must be configurable
- Create a configuration file .ini with section
- A section is loaded on demand via a configuration manager
- The configuration manager is loaded only once from index and pass to the processus

## Error handling
> To be maintenable, an application has to handle all errors thrown by itself
- All components should have his own exception
- All exception should be hierarchized
- The error handling should be only in one location
- The error handling should transform the exception to http code
- PHP error handling should be covered

## Business logic 
> Create a service to centralize business intelligence
> Create adapters to be able to inject new behaviour
> Create factory to load adapters based on http parameter (usage of interface is required)

# To go deeper
## Dependency injection
> A recurrent problem for developer is to load a class in a common way (dependencies injection)
> Find a way to encapsulate http request (method/parameters)
> Separate the list interface from search interface (adapters)
> To be suitable a software should talk via a logger. (monolog) Ideally, logs should be group by session ID (php session)