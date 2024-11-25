# Laravel Project with Elasticsearch

This project is a Laravel application that integrates with Elasticsearch. Follow the steps below to set up and run the
project.

## Prerequisites

- PHP >= 8.3.*
- Elasticsearch
- MySQL

## Installation

1. **Clone the repository:**
    ```sh
    git clone https://www.github.com/rampesna/elasticSearchDemo.git
    cd elasticSearchDemo
    ```

2. **Install PHP dependencies:**
    ```sh
    composer install
    ```

4. **Copy the `.env.example` file to `.env` and configure your environment variables:**
    ```sh
    cp .env.example .env
    ```

5. **Generate an application key:**
    ```sh
    php artisan key:generate
    ```

6. **Set up Elasticsearch:**
   Ensure Elasticsearch is running and accessible. Update the `.env` file with your Elasticsearch configuration:

    ```env
    ELASTICSEARCH_HOST=localhost
    ELASTICSEARCH_PORT=9200
    ELASTICSEARCH_USER=your-username
    ELASTICSEARCH_PASS=your-password
    ```

7. **Run database migrations:**
    ```sh
    php artisan migrate
    ```

8. **Create the Elasticsearch index:**
    ```sh
    php artisan elasticsearch:create-index products
    ```

## Running the Application

1. **Start the Laravel development server:**

    ```sh
    php artisan serve
    ```

2. **Access the application:**
   Open your browser and navigate to `http://localhost:8000`.

## Test APIs

### Index

```shell
curl --location --request GET 'http://HOST:PORT/api/products/index' \
--data-raw 'pageIndex=0&pageSize=10'
```

### Create

```shell
curl --location --request POST 'http://HOST:PORT/api/products/create' \
--header 'Content-Type: application/json' \
--data-raw '{
    "name": "Product Name",
    "description": "Product Description",
    "price": 100.00
}'
```

### Show

```shell
curl --location --request GET 'http://HOST:PORT/api/products/show' \
--data-raw 'id=1'
```

### Update

```shell
curl --location --request PUT 'http://HOST:PORT/api/products/update' \
--header 'Content-Type: application/json' \
--data-raw '{
    "id": 1,
    "name": "Product Name",
    "description": "Product Description",
    "price": 100.00
}'
```

### Delete

```shell
curl --location --request DELETE 'http://HOST:PORT/api/products/delete' \
--data-raw 'id=1'
```

### Search

```shell    
curl --location --request GET 'http://HOST:PORT/api/products/search' \
--data-raw 'query=Product Name'
```

## License

This project is licensed under the MIT License.
