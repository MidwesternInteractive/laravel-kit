# Project Name
*a quick project description*

## Project Description
What this project is and what it does.

## Getting Started 
If you haven't already, please set up your local environment. [HERE](https://github.com/MidwesternInteractive/local-environment)

### Setting up your environment

#### Step 1:
Pull down the repository into your projects directory

#### Step 2:
CD into the newly installed repository

#### Step 3: 
Run `$ sh setup.sh` and this should set up your local environment for you

### Work Flow
For this project, we have 3 branches with their own servers that represent the 3 stages of our development process. We utilize a CI work flow, so any time a change is made to the branch, we deploy to the server.

#### Local - developable out of
This branch represents an accessible server for our own team so they don't have to spin up their own local environments.

#### Staging - update through pr only
This branch represents the site that our client is interacting with, this branch would have new features that the client would like to see.

#### Master - update through pr only with approval from a senior
This branch represents the live site
