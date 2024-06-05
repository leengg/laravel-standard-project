## Information

Simple Laravel API with Job Queue, Database, and Event Handling

### Objective 

Create a Laravel API that demonstrates your proficiency with Laravel's job queues, database operations, migrations, and event handling.

### Requirements

#### API Endpoint: 

    - Develop a single API endpoint `/submit` that accepts a `POST` request with the following JSON payload structure:
    {
        "name": "John Doe",
        "email": "john.doe@example.com",
        "message": "This is a test message."
    }
    - Validate the data (ensure `name`, `email`, and `message` are present).

#### Database Setup: 

    - Use Laravel migrations to create a table named `submissions` with columns for `id`, `name`, `email`, `message`, and timestamps (`created_at` and `updated_at`).

#### Job Queue: 

    - Upon receiving the API request, the data should not be immediately saved to the database. Instead, dispatch a Laravel job to process the data. The job should perform the following tasks:
    - Save the data to the `submissions` table in the database.

#### Events: 

    - After the data is successfully saved to the database, trigger a Laravel event named `SubmissionSaved`. Attach a listener to this event that logs a message indicating a successful save, including the `name` and `email` of the submission.

#### Error Handling: 

    - Implement error handling for the API to respond with appropriate messages and status codes for the following scenarios: 
    - Invalid data input (e.g., missing required fields).
    - Any errors that occur during the job processing.

### Documentation: Briefly document the following in a README file:

 - Instructions on setting up the project and running migrations.
 - A simple explanation of how to test the API endpoint.
 - Write a simple Unit test.

### Deliverables

 - Source code for the Laravel project, including all migrations, models, controllers, jobs, and event classes.
 - A README file with setup and testing instructions.


## Required

- Docker
## Installation

#### Linux / MacOS:
`make setup`
`make migrate`

### Windows:
- `docker-compose up --build -d`
- `docker-compose exec php /bin/sh -c "cp .env.example .env && composer install && php artisan key:generate && chown -R www-data:www-data storage/"`
- `docker-compose exec php /bin/sh -c "php artisan migrate"`

## Application
Try access on browser:
http://localhost:8888