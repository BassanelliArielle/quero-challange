# Quero Educação - Test Backend (Offers API)

### Objetivo:

O Quero Bolsa é um marketplace de bolsas de estudo, que já ajudou milhares de alunos a escolher e ingressar no curso ideal, por um preço que podem pagar. A missão do teste é criar uma API para exibição e filtragem de ofertas de curso.

### Sobre a API:
O sistema foi desenvolvido utilizando Laravel Framework 8.13, PHP 7.3, e a máquina virtual do Laravel Homestead, conforme recomendado na documentação ([https://laravel.com/docs/8.x/installation](https://laravel.com/docs/8.x/installation)).


A API possui dois endpoints, sendo eles:

- **[GET] - /api/courses**: responsável por listar os cursos, além de permitir filtrar pelo nome da universidade, kind, level e/ou shift.

	Os parâmetros esperados para o filtro são:
		-- university (string) : para filtrar pelo nome da universidade;
		-- kind (string) : para filtrar pelo tipo de curso ( Ex: Presencial, EAD );
		-- level (string) : para filtrar o nível do curso ( Ex: Bacharelado, Tecnólogo);
		-- shift (string): para filtrar o período do curso ( Ex: tarde, noite);


	 Retorno esperado:

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


- **[GET] - /api/on-sales**: responsável por listar e filtrar as ofertas dos cursos pelo nome da universidade, kind, level e/ou shift e permitir ordenar por menor e maior preço com desconto.

	Os parâmetros esperados para o filtro são:
		-- university (string) : para filtrar pelo nome da universidade;
		-- kind (string) : para filtrar pelo tipo de curso ( Ex: Presencial, EAD );
		-- level (string) : para filtrar o nível do curso ( Ex: Bacharelado, Tecnólogo);
		-- shift (string): para filtrar o período do curso ( Ex: tarde, noite);
		-- order_direction: para ordenar por menor preço com desconto use  'asc' e por maior preço use 'desc'.

	 Retorno esperado:

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


Foi implementado um sistema de cache nos endpoints da API baseado nas rotas e filtros utilizados na requisição.

### SetUp:
O teste pode ser feito de duas formas, com o uso da Vagrant, ou em um Servidor Web. Para instalação e configuração da Vagrant consulte o seguinte link:  [https://laravel.com/docs/8.x/homestead](https://laravel.com/docs/8.x/homestead)

Para um Servidor Web são necessários os seguintes requisitos:

- NGINX ou Apache;
- MySql;
- PHP 7.3 ( com as dependencias exigidas pelo Laravel Framework 8.x);
- Composer.

Depois de instalada e configurada o ambiente, acesse o diretório do projeto e execute os seguintes comandos:

    composer install
    php artisan key:generate
    php artisan migrate:fresh --seed


Em caso de dúvidas, estou a disposição para esclarecimentos.