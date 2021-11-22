# Quero Educação - Test Backend (Offers API)

### Goal:

Quero Bolsa is a scholarship marketplace, which has already analyzed students to choose and enroll in the ideal course, at a price they can afford. The test's mission is to create an API for viewing and filtering offers.

### About the API:
The system was developed using Laravel Framework 8.13, PHP 7.3, and the Laravel Homestead virtual machine, as recommended in the documentation ([https://laravel.com/docs/8.x/installation](https://laravel.com/docs/8.x/installation)).


The API has two endpoints:

- **[GET] - /api/courses**: responsible for listing the courses, in addition to allowing filtering by university name, kind, level and/or shift.

    
    The expected parameters for the filter are:
        -- university (string) : to filter by university name;
        -- kind (string) : to filter by the type of course ( Ex: Presential, EAD );;
        -- level (string) : to filter the level of the course (Ex: Bachelor, Technologist);
        -- shift (string): to filter the course period (Ex: afternoon, night);


	 Expected return:

       { "data": [
            {
                "course": {
                    "name": "Traffic Technician",
                    "kind": "aperiam",
                    "level": "ullam",
                    "shift": "autem",
                    "university": {
                        "name": "Mike Douglas IV University",
                        "score": 0.21,
                        "logo_url": "https://via.placeholder.com/640x480.png/006600?text=dolores"
                        },
                    "campus": {
                        "name": "Rosemary Green Campus",
                        "city": "North Gilesfort"
                        }
                    }
            },
            {
                "course": {
                    "name": "Traffic Technician",
                    "kind": "aperiam",
                    "level": "ullam",
                    "shift": "autem",
                    "university": {
                        "name": "Mike Douglas IV University",
                        "score": 0.21,
                        "logo_url": "https://via.placeholder.com/640x480.png/006600?text=dolores"
                    },
                    "campus": {
                        "name": "Shana Wisozk Campus",
                        "city": "West Ignaciofort"
                    }
                }
            }
        ]}


- **[GET] - /api/on-sales**: responsible for listing and filtering offers by university name, kind, level and/or shift and allowing ordering by lowest and highest discounted prices.

	The expected parameters for the filter are:
        -- university (string) : to filter by university name;
        -- kind (string) : to filter by the type of course (Ex: presential, EAD );
        -- level (string) : to filter the level of the course (Ex: Bachelor, Technologist);
        -- shift (string): to filter the course period (Ex: afternoon, night);
        -- order_direction: to order by lowest price with discount use 'asc' and for highest price use 'desc'.

	 Expected return:

      { "data": [
            {
                "full_price": 485.09,
                "price_with_discount": 273.3,
                "discount_percentage": 67.86,
                "start_date": "11/11/2020",
                "enrollment_semester": "culpa",
                "enabled": false,
                "course": {
                    "name": "Traffic Technician",
                    "kind": "aperiam",
                    "level": "ullam",
                    "shift": "autem"
                },
                "university": {
                    "name": "Mike Douglas IV University",
                    "score": 0.21,
                    "logo_url": "https://via.placeholder.com/640x480.png/006600?text=dolores"
                },
                "campus": {
                    "name": "Rosemary Green Campus",
                    "city": "North Gilesfort"
                }
            },
            {
                "full_price": 485.09,
                "price_with_discount": 273.3,
                "discount_percentage": 67.86,
                "start_date": "11/11/2020",
                "enrollment_semester": "culpa",
                "enabled": false,
                "course": {
                    "name": "Traffic Technician",
                    "kind": "aperiam",
                    "level": "ullam",
                    "shift": "autem"
                },
                "university": {
                    "name": "Mike Douglas IV University",
                    "score": 0.21,
                    "logo_url": "https://via.placeholder.com/640x480.png/006600?text=dolores"
                },
                "campus": {
                    "name": "Shana Wisozk Campus",
                    "city": "West Ignaciofort"
                }
            }
        ]}


A caching system was implemented in the API endpoints based on the routes and filters used in the request.

### SetUp:
The test can be done in two ways, using Vagrant, or on a Web Server. For Vagrant installation and configuration see the following link: [https://laravel.com/docs/8.x/homestead](https://laravel.com/docs/8.x/homestead)

For a Web Server the following requirements are necessary:

- NGINX or Apache;
- MySql;
- PHP 7.3 (with dependencies required by Laravel Framework 8.x);
- Composer.

Once the environment is installed and configured, access the project directory and execute the following commands:

    composer install
    php artisan key:generate
    php artisan migrate:fresh --seed


In case of doubts, I am available for clarification.   :)
