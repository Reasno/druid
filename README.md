## Apache Druid Coroutine Client for Hyperf

This component provides Hyperf integration for level23/druid-client.

## Installation

```bash
composer require reasno/druid
```

publish the configuration:

```bash
php bin/hyperf vendor:publish reasno/druid-client
```

Then you can inject `Level23\Druid\DruidClient` anywhere via standard Hyperf DI, and enjoy coroutine connections to druid.


## Documentation

See [level23/druid-client](https://github.com/level23/druid-client).