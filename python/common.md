python check file encoding 
```shell script
import chardet
type = chardet.detect(file_data.read())
```