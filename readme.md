# Questions Database App

This project is an API and a Web UI for quiz game questions.

## Features

The project features a robust system for maintaining the questions via the Web
UI. Coupled with the Web UI is the API through which the quiz games can access
the questions. Questions can be organized by categories for easier maintenance.

- Extensive interface for managing questions
- Robust [REST API](https://en.wikipedia.org/wiki/Representational_state_transfer)
- Organising questions via categories
- Review changes before publishing.

## Documentation

- [API Documentation](./docs/api.md)
- [Installation](./docs/installation.md)
- [Development & testing](./docs/development.md)

## Dependecies

This project depends on the following applications. Supported alternatives are
also listed in *italics*.

**The necessary dependencies are installed by Docker.**

- [Docker](https://www.docker.com/)
- [Composer](http://getcomposer.org/)
- [PHP](https://php.net/) >= 7.2.0
  - [BCMath](https://www.php.net/manual/en/book.bc.php) PHP Extension
  - [Ctype](https://www.php.net/manual/en/book.ctype.php) PHP Extension
  - [JSON](https://www.php.net/manual/en/book.json.php) PHP Extension
  - [Mbstring](https://www.php.net/manual/en/book.mbstring.php) PHP Extension
  - [OpenSSL](https://www.php.net/manual/en/book.openssl.php) PHP Extension
  - [PDO](https://www.php.net/manual/en/book.pdo.php) PHP Extension
  - [Tokenizer](https://www.php.net/manual/en/book.tokenizer.php) PHP Extension
  - [XML](https://www.php.net/manual/en/book.xml.php) PHP Extension
- Database
  - [SQLite](https://www.sqlite.org/index.html) (currently used)
  - *[MySQL](https://www.mysql.com/)/[MariaDB](https://mariadb.org/)*
  - *[PostgreSQL](https://www.postgresql.org/)*
  - *[SQL Server](https://www.microsoft.com/fi-fi/sql-server/sql-server-downloads)*
- Web Server
  - [Nginx](https://nginx.org/en/) (currently used)
  - *[Apache](https://httpd.apache.org/)* 

## License

This project is open-sourced software licensed under the
[MIT license](./LICENSE).
