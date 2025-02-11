# Project Setup

This repository provides a Docker-based development environment that includes an NGINX web server, a PHP application, and support for multiple database connections: MySQL, MSSQL, and PostgreSQL. It simplifies the setup process, allowing developers to work in a consistent and isolated environment.

## Prerequisites

### 1. `.env` File Configuration
Define the necessary environment variables before running the project.

#### `serverName`
Specify a unique name for your server according to the application you are running.

#### `port`
Set the port that will be exposed for your application.

#### `pathApp`
Define the path of your project that will be mounted inside the Docker container.
```env
pathApp='./RepositoryName'
```

### 2. Clone Your Repository Inside Docker
Run the following command inside your Docker environment:
```
git clone https://github.com/userName/repository.git
```

### 3. Start Your Containers
Execute the following command inside the `docker-PIS` directory:
```
docker-compose up --build
```
> For subsequent runs, you do not need to include `--build` unless there are changes to the Docker configuration.

## Xdebug Support
If you need Xdebug for debugging, an example configuration is provided in `launch.Example.json`.
> Replace `nameAppFolder` with the cloned repository folder name and rename the file to `launch.json`.

## PHP Extensions
You can add or remove PHP extensions as needed in the `dockerfile`. By default, it includes the minimal set required for database connections and essential PHP functionalities.

---

## Additional Setup for SQL Server
Unlike MySQL, SQL Server does not automatically create a database. You need to manually create the database you want to work with. In this example, we will create a database named `test` by connecting to the default `master` database using the `SA` user.

### Connect to SQL Server from Terminal

Ensure your Docker container is running before executing the commands below.

#### 1. Enter the SQL Server Container
```
docker exec -ti container_name_MSSQL bash
```
> If successful, you should see a prompt similar to: `mssql@36460947b4d1:/$`
> To exit, type `exit`

#### 2. Access the SQL Server Database
Replace `password` with the value set in the `.env` file under `passwordMSSQL`.
```
/opt/mssql-tools/bin/sqlcmd -S localhost -U SA -P 'password'
```
> If successful, the console should display `1>`
> To exit, press `CTRL+C`

#### 3. Run SQL Queries from Terminal
To execute a query, type the command followed by `go`.
```
select name from sys.databases
go
```

Alternatively, split the query into multiple lines:
```
select name from
sys.databases
go
```

#### 4. Create a Test Database
Run the following command to create a database named `test`.
```
CREATE DATABASE test
go
```
Once created, run the query from step 3 again to verify that your database appears in the list.

## Connecting via Azure Data Studio (SQL Login)

#### 1. Connection Details
- **Server:** `localhost`
- **Username:** `sa`
- **Password:** The value set in `.env` under `passwordMSSQL`
- **Database:** Specify the database name (leave empty to connect to `master`)

#### 2. Create a Database
Once connected, run:
```
CREATE DATABASE test;
```

## Documentation & References
For more information, refer to:
- [Docker & SQL Server](https://blog.logrocket.com/docker-sql-server/)
- [Granting DB Owner Permissions](https://stackoverflow.com/questions/54519615/how-to-grant-db-owner-permissions-to-an-application-role)
- [PHP & MSSQL with Docker](https://github.com/Namoshek/docker-php-mssql)

---

## Ready to Code!
With the environment set up, you can now start developing your application within this fully containerized PHP and NGINX stack, with seamless database integration for MySQL, MSSQL, and PostgreSQL.

## Contributions
If you wish to contribute, feel free to fork the repository and submit a pull request.

## Contact
For any inquiries or suggestions, you can contact me at rodrigopimienta28@gmail.com or https://www.linkedin.com/in/rodigopimienta/ .
