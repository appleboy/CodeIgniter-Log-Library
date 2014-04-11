# CodeIgniter-Log-Library

Store all php error or exception logs into database.

# Installation

Create log table on your database. SQL structure is available on ``sql/mysql.sql``

```
--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `errno` int(2) NOT NULL,
  `errtype` varchar(32) NOT NULL,
  `errstr` text NOT NULL,
  `errfile` varchar(255) NOT NULL,
  `errline` int(4) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `ip_address` varchar(45) DEFAULT '0' NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`, `ip_address`, `user_agent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
```

You can install via codeigniter spark or step by step from following instruction.

    $ cp config/log.php your_application/config/
    $ cp libraries/Lib_log.php your_application/libraries/
    $ cp controllers/example.php your_application/controllers/

You can install via http://getsparks.org/packages/codeigniter-log/show

    $ php tools/spark install -v1.0.1 codeigniter-log

Finally excute via command line.

    $ php index.php example

# Usage

load library from spark:

```php
$this->load->spark('codeigniter-log/1.0.1');
```

or load library from codeigniter loader

```php
$this->load->library('lib_log');
```

log message from trigger_error function.

```php
trigger_error("User error via trigger.", E_USER_ERROR);
trigger_error("Warning error via trigger.", E_USER_WARNING);
trigger_error("Notice error via trigger.", E_USER_NOTICE);
```

use php exception:

```php
throw new Exception('Error: Division by zero.', E_USER_ERROR);
```

Please refer the example controller (``controllers/example.php``).

Screenshot

![mysql log](https://farm9.staticflickr.com/8077/8431391071_7970f8fc05_c.jpg)
