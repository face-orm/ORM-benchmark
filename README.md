ORM-benchmark
=============

Results :

```

|------------|---------|-----------------|----------------|
|  Library   |TypeTest |      Memory     |      Time      |
|------------|---------|-----------------|----------------|
|       Face |  simple |    283.3120 kB  |    2.90704 ms  |
|       Face |   1join |    347.8640 kB  |    4.93813 ms  |
|       Face |   2join |    357.4240 kB  |    6.41298 ms  |
|            |         |                 |                |
|  Doctrine2 |  simple |   3670.0160 kB  |   25.47789 ms  |
|            |         |                 |                |
|    Phalcon |  simple |     59.9440 kB  |    2.50912 ms  |
|    Phalcon |   1join |    116.1360 kB  |    2.82788 ms  |
|    Phalcon |   2join |    169.2720 kB  |    3.49903 ms  |
|            |         |                 |                |
|     Idiorm |  simple |    308.7440 kB  |    2.82001 ms  |
|     Idiorm |   1join |    355.8080 kB  |    2.94900 ms  |
|     Idiorm |   2join |    372.0000 kB  |    3.38101 ms  |
|            |         |                 |                |
|        PDO |  simple |     22.1680 kB  |    1.23096 ms  |
|        PDO |   1join |     52.4880 kB  |    1.52898 ms  |
|        PDO |   2join |     76.5440 kB  |    1.78099 ms  |
|------------|---------|-----------------|----------------|


```