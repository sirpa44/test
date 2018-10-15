# General

- All code has to be submitted via pull request
- All method has to be documented
- All code has to be compliant with PSR-2 / PSR-4
- Singleton is a bad pratice and should be avoided (as global variable and static method)

# Todo
> 2 weeks represents 10 agile points
> Agile points is estimated following Fibonacci suite (1,2,3,5,8,13)

## Router (3 points)
> A router does not need to know all controller to route
- All existing controller that matching a route should be routed (2 parts of url = controller / method)

## Configuration (10 points)
> As an application can be used in different context it's why hardcoded values must be configurable
- Create a configuration file .ini with sections in `/config`
- The configuration manager is loaded only once from index 
- It should be passed to the processus to avoid reload (2 constructors)
- A section is loaded on demand via a configuration manager
> Check `parse_ini_file`

## Error handling (8 points)
> To be maintainable, an application has to handle all errors thrown by itself
- All components should have his own exception (Create exception class)
- All exception should be hierarchized
- The error handling should be only in one location
- The error handling should transform the exception to http code
- PHP error handling should be covered (`set_error_handler`)

## Business logic 
> Create a service to centralize business intelligence (3 pts)
> Create adapters to be able to inject new behaviour (usage of interface is required) (5 pts)
> Create factory to load adapters based on http parameter (a default parameter (from `config.ini`)should be used if not set) (5 pts) 

# To go deeper

> A recurrent problem for developer is to load a class in a common way (dependencies injection)
> Find a way to encapsulate http request (method/parameters) (PSR-7)
> Separate the list interface from search interface (adapters)
> To be suitable a software should talk via a logger. (monolog) Ideally, logs should be group by session ID (php session)
> Add cache (PSR-6)
> All code has to be unit tested
