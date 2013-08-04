ORM-benchmark
=============

Results :

```

|------------|---------|-----------------|----------------|
|  Library   |TypeTest |      Memory     |      Time      |
|------------|---------|-----------------|----------------|
|       Face |  simple |    283.4560 kB  |    3.04198 ms  |
|       Face |   1join |    347.7600 kB  |    4.98676 ms  |
|       Face |   2join |    357.3840 kB  |    6.54697 ms  |
|            |         |                 |                |
|  Doctrine2 |  simple |   3670.0160 kB  |   25.49100 ms  |
|            |         |                 |                |
|    Phalcon |  simple |     59.9440 kB  |    2.23303 ms  |
|    Phalcon |   1join |    116.1440 kB  |    2.86508 ms  |
|    Phalcon |   2join |    169.2560 kB  |    3.49903 ms  |
|            |         |                 |                |
|     Idiorm |  simple |    308.8400 kB  |    2.90179 ms  |
|     Idiorm |   1join |    355.6160 kB  |    3.18193 ms  |
|     Idiorm |   2join |    372.0080 kB  |    3.36599 ms  |
|------------|---------|-----------------|----------------|


```