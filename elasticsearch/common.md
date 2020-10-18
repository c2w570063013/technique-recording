Elasticsearch: Bulk request throws error 
```json
"error" : {
    "root_cause" : [
      {
        "type" : "illegal_argument_exception",
        "reason" : "The bulk request must be terminated by a newline [\n]"
      }
    ],
    "type" : "illegal_argument_exception",
    "reason" : "The bulk request must be terminated by a newline [\n]"
  },
  "status" : 400
```
solution: Add empty line at the end of the JSON file and save the file and then try to run the below command