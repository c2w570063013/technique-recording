elk 聚合查询例句
```shell
GET logstash-miner*/_search
{
  "query": {
    "bool": {
      "filter": [
        {
          "bool": {
            "should": [ #相当于或
              {
                "match_phrase": {
                  "log_type.keyword": "error"
                }
              },
              {
                "match_phrase": {
                  "log_type.keyword": "warn"
                }
              }
            ],
            "minimum_should_match": 1
          }
        },
        {
          "range": {
            "timestamp": {
              "gte": "2021-07-06T07:59:07.510Z",
              "lte": "2021-07-07T07:59:07.510Z",
              "format": "strict_date_optional_time"
            }
          }
        }
      ]
    }
  },
  "aggs": {
    "dd": {
      "terms": {
        "field": "log_type.keyword",
        "size": 200
      },
      "aggs": {
        "aa": {
          "terms": {
            "field": "host.name.keyword",
            "size": 200
          }
        }
      }
    }
  },
  "size": 0
}
```

返回结果:
```shell
{
  "took" : 38,
  "timed_out" : false,
  "_shards" : {
    "total" : 131,
    "successful" : 131,
    "skipped" : 129,
    "failed" : 0
  },
  "hits" : {
    "total" : {
      "value" : 917,
      "relation" : "eq"
    },
    "max_score" : null,
    "hits" : [ ]
  },
  "aggregations" : {
    "dd" : {
      "doc_count_error_upper_bound" : 0,
      "sum_other_doc_count" : 0,
      "buckets" : [
        {
          "key" : "mined",
          "doc_count" : 915,
          "aa" : {
            "doc_count_error_upper_bound" : 0,
            "sum_other_doc_count" : 0,
            "buckets" : [
              {
                "key" : "f0123261",
                "doc_count" : 393
              },
              {
                "key" : "f02770",
                "doc_count" : 286
              },
              {
                "key" : "f02775",
                "doc_count" : 69
              },
            ]
          }
        },
        {
          "key" : "error",
          "doc_count" : 2,
          "aa" : {
            "doc_count_error_upper_bound" : 0,
            "sum_other_doc_count" : 0,
            "buckets" : [
              {
                "key" : "f0123261",
                "doc_count" : 2
              }
            ]
          }
        }
      ]
    }
  }
}
```
解释上面的返回结果，先聚合log_type,再从log_type中聚合机器数量host.name(count)