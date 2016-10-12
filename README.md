just for PHPv7


ab测试数据(I3-3110M  16年10月11日晚23:44)：
    
    Document Path:          /sharinv7/Public/index.php
    Document Length:        152 bytes
    
    Concurrency Level:      500
    Time taken for tests:   6.647 seconds
    Complete requests:      1000
    Failed requests:        0
    Total transferred:      355000 bytes
    HTML transferred:       152000 bytes
    Requests per second:    150.45 [#/sec] (mean)
    Time per request:       3323.298 [ms] (mean)
    Time per request:       6.647 [ms] (mean, across all concurrent requests)
    Transfer rate:          52.16 [Kbytes/sec] received
    
    Connection Times (ms)
                  min  mean[+/-sd] median   max
    Connect:       29  603 560.3    409    1963
    Processing:   217 2180 1410.3   1778    5387
    Waiting:      101 1694 1180.1   1544    5003
    Total:       1478 2784 1132.3   2287    5431
    
    Percentage of the requests served within a certain time (ms)
      50%   2287
      66%   3065
      75%   4153
      80%   4329
      90%   4428
      95%   4439
      98%   5336
      99%   5336
     100%   5431 (longest request)

 
开发模式与部署模式差异（I7-4600U）：
开发：
     
     Document Path:          /sharinv7/Public/index.php
     Document Length:        152 bytes
     
     Concurrency Level:      300
     Time taken for tests:   3.973 seconds
     Complete requests:      1000
     Failed requests:        0
     Total transferred:      355000 bytes
     HTML transferred:       152000 bytes
     Requests per second:    251.72 [#/sec] (mean)
     Time per request:       1191.778 [ms] (mean)
     Time per request:       3.973 [ms] (mean, across all concurrent requests)
     Transfer rate:          87.27 [Kbytes/sec] received
     
     Connection Times (ms)
                   min  mean[+/-sd] median   max
     Connect:        0   67 247.7      1    1001
     Processing:    52 1032 608.0    955    3620
     Waiting:       41  967 618.2    866    3620
     Total:         55 1099 641.8    996    3623
     
     Percentage of the requests served within a certain time (ms)
       50%    996
       66%   1165
       75%   1488
       80%   1643
       90%   1937
       95%   2512
       98%   2642
       99%   2750
      100%   3623 (longest request)
      
部署：
    
    Document Path:          /sharinv7/Public/index.php
    Document Length:        28762 bytes
    
    Concurrency Level:      300
    Time taken for tests:   5.129 seconds
    Complete requests:      1000
    Failed requests:        758
       (Connect: 0, Receive: 0, Length: 758, Exceptions: 0)
    Total transferred:      28946506 bytes
    HTML transferred:       28764506 bytes
    Requests per second:    194.99 [#/sec] (mean)
    Time per request:       1538.568 [ms] (mean)
    Time per request:       5.129 [ms] (mean, across all concurrent requests)
    Transfer rate:          5511.89 [Kbytes/sec] received
    
    Connection Times (ms)
                  min  mean[+/-sd] median   max
    Connect:        0  160 364.5      2    1009
    Processing:    24 1243 567.6   1167    3172
    Waiting:       12 1065 647.2    986    3171
    Total:         25 1403 630.6   1262    3188
    
    Percentage of the requests served within a certain time (ms)
      50%   1262
      66%   1659
      75%   1831
      80%   1972
      90%   2242
      95%   2563
      98%   2825
      99%   3175
     100%   3188 (longest request)
