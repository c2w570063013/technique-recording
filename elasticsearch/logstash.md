logstash 处理Y-m-d H:i:s 时间格式
```shell
filter {
    if[service] =~ "filpool" {
        if [message] =~ "UPDATE agent_weight" {
            mutate {
                update => {"log_type" => "update"}
            }
        }

        if [message] =~ "INSERT  INTO agent_weight" {
            mutate {
                update => {"log_type" => "insert"}
            }
        }

        grok {
            match => ["message", "(?<timestamp>\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}).*\(\).{20}(?<sql>.*;)"]
        }

        date {
            #logdate 从上面过滤后取到的字段名，yyyy-MM-dd HH:mm:ss.SSS 日期格式条件
            match => ["timestamp", "YYYY-MM-dd HH:mm:ss"]
            target => "timestamp"
            timezone => "Asia/Shanghai"
        }
    }
}
```