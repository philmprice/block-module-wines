Block: Users Module
====================
This is the users module for the 'Blocks' system. It drives management and authentication of users.

### About the Blocks system
The Blocks system is a way to package, distribute, and deploy web application modules that:
- Deploy and pull-dependancies with Composer
- Bootstrap into an MVC Framework (PhalconPHP at time of writing)
- Keep core code separate from extended project code

In this way, all Blocks (even the host):
- Are extendable
- Bring their dependencies along
- May be upgraded by replacing core
- Arrange extended project assets in a mirrored folder structure that can be independantely code-controlled

It is currently in development, more info to come as things progress.
