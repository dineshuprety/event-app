"Any fool can write code that a computer can understand. Good programmers write code that humans can understand.” – Martin Fowler

# Event App

This is a project where we can add the event to track it. In this project, I used the Laravel framework, Inertia.js, and Vue.js.

## Installation

You can install the project by clone:

```bash
git clone https://github.com/dineshuprety/event-app.git
```

# Run the project

create file named ".env" add copy the content of .env.example and change

```bash
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

so on as required for starting above mention will do the job.
Hopfully you have install composer and npm in your device

Run Command :

```bash
 Composer install
 // To migrate databse tables
 php artisan migrate

```

To disrupt the project's flow, I created a factory for rambling data. You just need to seed the data.

```bash
php artisan db:seed
```

I write a Laravel command to update the previous end event's status to "finished."
After seeding data you need to run this command.
To run this command directly in the terminal:

```bash
php artisan event:update
```

This command was registered in Laravel Task Scheduling. It will run on the server at the end of each Nepal time period.
To run this command in the terminal:

```bash
php artisan schedule:work

// we can list the registered scheduling
php artisan schedule:list
```

To install all the dependency packages for vue js and tailwind css, you need to run this command:

```bash
// To install the packages
 npm install

// To run the npm
  npm run dev
```

After installing dependencies, you need to run vite.
To run Vites, you need to type:

```bash

// To run the npm
  npm run dev
```

At last you need to serve the laravel project:
Now serve:

```bash
php artisan ser
```

## Testing

```bash
composer test
```

**Have Good day developer and Happy Coding.**
